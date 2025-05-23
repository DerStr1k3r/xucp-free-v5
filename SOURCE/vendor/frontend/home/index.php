<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.2
// * 
// * Copyright (c) 2024 - 2025 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

$user = new xUCP_Themes($db);
$user->xucp_header_none_logged(HOME_NONE_LOGGED);
$user->xucp_content_none_logged();


$select_stmt = $db->prepare("SELECT * FROM xucp_news");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $title_field = "title";
    $content_field = "content";
    if(isset($_SESSION['xucp_free']['secure_lang']) && $_SESSION['xucp_free']['secure_lang'] == 'de'){
        $title_field = "title_de";
        $content_field = "content_de";
    }
    $id = $row['id'];
    $title = $row[$title_field];
    $content = $row[$content_field];
    $short_content = substr($content, 0, 600);

    echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						<path d='M15.7161 16.2234H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M15.7161 12.0369H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M11.2521 7.86011H8.49707' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path fill-rule='evenodd' clip-rule='evenodd' d='M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
					</svg>
                    ".NEWS." ".$title."
                  </h4>
                  <hr class='hr-horizontal'>                         
               </div>   
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>";
                    $parser = new xUCP_BBCode_Parser();    

                    $htmlText = $parser->parse($short_content);
                    
                    echo $htmlText;
echo "                    
                    </p>
               </div>
            </div>
         </div>
      </div>";
}

echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>               
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						<path d='M4 2.00004C4 1.44776 4.44771 1.00004 5 1.00004L13.5721 1C13.8454 1 14.1068 1.11184 14.2955 1.30953L19.7234 6.99588C19.9009 7.18191 20 7.42919 20 7.68636V22C20 22.5523 19.5523 23 19 23H5C4.44772 23 4 22.5523 4 22V2.00004Z' stroke='currentColor'></path>                                    
						<path d='M4 2C4 1.44772 4.44772 1 5 1H13C13.5523 1 14 1.44772 14 2V6.28566C14 6.83794 14.4477 7.28566 15 7.28566H19C19.5523 7.28566 20 7.73338 20 8.28566V22C20 22.5522 19.5523 23 19 23H5C4.44772 23 4 22.5522 4 22V2Z' stroke='currentColor'></path>                                    
					    <mask id='path-3-inside-1' fill='white'>                                    
						<path fill-rule='evenodd' clip-rule='evenodd' d='M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z'></path>                                    </mask>                                    <path d='M7 14.5945L6.22306 13.9649L5.7129 14.5945L6.22306 15.2241L7 14.5945ZM8.99429 12.1334L9.77124 12.7629L9.77124 12.7629L8.99429 12.1334ZM9.50189 12.0859L8.85116 12.8452L8.85116 12.8452L9.50189 12.0859ZM9.54804 12.6079L10.325 13.2375L10.325 13.2375L9.54804 12.6079ZM7.93828 14.5945L7.16134 13.9649L6.65118 14.5945L7.16134 15.2241L7.93828 14.5945ZM9.54804 16.581L10.325 15.9515L10.325 15.9515L9.54804 16.581ZM9.50189 17.103L8.85116 16.3437L8.85116 16.3437L9.50189 17.103ZM8.99429 17.0556L8.21735 17.6852L8.21735 17.6852L8.99429 17.0556ZM10.1526 11.3266C9.5684 10.8259 8.69615 10.9129 8.21735 11.5038L9.77124 12.7629C9.54729 13.0393 9.12956 13.0838 8.85116 12.8452L10.1526 11.3266ZM10.325 13.2375C10.7905 12.663 10.7202 11.813 10.1526 11.3266L8.85116 12.8452C8.5894 12.6209 8.56045 12.2383 8.77109 11.9784L10.325 13.2375ZM8.71522 15.2241L10.325 13.2375L8.77109 11.9784L7.16134 13.9649L8.71522 15.2241ZM10.325 15.9515L8.71522 13.9649L7.16134 15.2241L8.77109 17.2106L10.325 15.9515ZM10.1526 17.8624C10.7202 17.3759 10.7905 16.5259 10.325 15.9515L8.77109 17.2106C8.56045 16.9507 8.5894 16.5681 8.85116 16.3437L10.1526 17.8624ZM8.21735 17.6852C8.69615 18.276 9.5684 18.363 10.1526 17.8624L8.85116 16.3437C9.12956 16.1052 9.5473 16.1497 9.77124 16.426L8.21735 17.6852ZM8.21735 11.5038L6.22306 13.9649L7.77694 15.2241L9.77124 12.7629L8.21735 11.5038ZM6.22306 15.2241L8.21735 17.6852L9.77124 16.426L7.77694 13.9649L6.22306 15.2241Z' fill='currentColor' mask='url(#path-3-inside-1)'></path>                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M13.771 11.1638C13.9576 11.2542 14.0356 11.4769 13.9451 11.6611L10.9973 17.6664C10.9069 17.8506 10.6823 17.9267 10.4957 17.8363C10.3091 17.7458 10.2311 17.5232 10.3215 17.3389L13.2693 11.3336C13.3598 11.1494 13.5844 11.0733 13.771 11.1638Z' fill='currentColor'></path>                                    <mask id='path-6-inside-2' fill='white'>                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M17 14.5945L15.0057 17.0556C14.8783 17.2128 14.651 17.2341 14.4981 17.103C14.3452 16.972 14.3245 16.7383 14.452 16.581L16.0617 14.5945L14.452 12.6079C14.3245 12.4507 14.3452 12.217 14.4981 12.0859C14.651 11.9549 14.8783 11.9761 15.0057 12.1334L17 14.5945Z'></path>                                    </mask>                                    <path d='M17 14.5945L17.7769 15.2241L18.2871 14.5945L17.7769 13.9649L17 14.5945ZM15.0057 17.0556L14.2288 16.426L14.2288 16.426L15.0057 17.0556ZM14.4981 17.103L15.1488 16.3437L15.1488 16.3437L14.4981 17.103ZM14.452 16.581L13.675 15.9515L13.675 15.9515L14.452 16.581ZM16.0617 14.5945L16.8387 15.2241L17.3488 14.5945L16.8387 13.9649L16.0617 14.5945ZM14.452 12.6079L13.675 13.2375L13.675 13.2375L14.452 12.6079ZM14.4981 12.0859L15.1488 12.8452L15.1488 12.8452L14.4981 12.0859ZM15.0057 12.1334L15.7826 11.5038L15.7826 11.5038L15.0057 12.1334ZM13.8474 17.8624C14.4316 18.363 15.3039 18.276 15.7826 17.6852L14.2288 16.426C14.4527 16.1497 14.8704 16.1052 15.1488 16.3437L13.8474 17.8624ZM13.675 15.9515C13.2095 16.5259 13.2798 17.3759 13.8474 17.8624L15.1488 16.3437C15.4106 16.5681 15.4396 16.9507 15.2289 17.2106L13.675 15.9515ZM15.2848 13.9649L13.675 15.9515L15.2289 17.2106L16.8387 15.2241L15.2848 13.9649ZM13.675 13.2375L15.2848 15.2241L16.8387 13.9649L15.2289 11.9784L13.675 13.2375ZM13.8474 11.3266C13.2798 11.813 13.2095 12.663 13.675 13.2375L15.2289 11.9784C15.4396 12.2383 15.4106 12.6209 15.1488 12.8452L13.8474 11.3266ZM15.7826 11.5038C15.3039 10.9129 14.4316 10.8259 13.8474 11.3266L15.1488 12.8452C14.8704 13.0838 14.4527 13.0393 14.2288 12.7629L15.7826 11.5038ZM15.7826 17.6852L17.7769 15.2241L16.2231 13.9649L14.2288 16.426L15.7826 17.6852ZM17.7769 13.9649L15.7826 11.5038L14.2288 12.7629L16.2231 15.2241L17.7769 13.9649Z' fill='currentColor' mask='url(#path-6-inside-2)'></path>                                
					</svg>
                    ".OUR_FEATURES."
                  </h4>
                  <hr class='hr-horizontal'>            
               </div>   
            </div>
            <div class='card-body'>
            <div class='row'>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Faction System</span>
                        <div class='pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A faction system where you can edit all factions.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>                    
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Vehicle System</span>
                        <div class='progress-detail pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A vehicle system where you can edit all vehicles.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
            </div>
            <div class='row'>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Sponsor System</span>
                        <div class='pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A sponsor system where you can manage your sponsors.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>                    
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Support System</span>
                        <div class='progress-detail pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A full support system for your players and team members.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
            </div>
            <div class='row'>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>                    
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Character System</span>
                        <div class='progress-detail pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A character system where you have an overview of your characters.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
               <div class='col-lg-6'>
                  <div class='card xucp-card'>
                     <div class='card-body'>                    
						<svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
							<path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
						</svg> 
                        <span class='fs-5 me-2'>Blog System</span>
                        <div class='progress-detail pt-3'>
                           <h4 class='counter' style='visibility: visible;'>A full blog system where you can create blog posts and publish them.</h4>
                        </div>
                     </div>            
                  </div>
               </div>
            </div>                                    
         </div>
      </div>";
$user->xucp_footer_none_logged();
