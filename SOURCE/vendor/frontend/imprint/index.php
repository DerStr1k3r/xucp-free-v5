<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.1
// *
// * Copyright (c) 2024 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

$user = new xUCP_Themes($db);
$user->xucp_header_none_logged(IMPRINT_HEADER);
$user->xucp_content_none_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_imprint WHERE id = 1");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    echo"
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						<path fill-rule='evenodd' clip-rule='evenodd' d='M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.635 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M11.9946 16V12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M11.9896 8.2041H11.9996' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path>                                
					</svg>
                    ".IMPRINT_HEADER."
                  </h4>
                  <hr class='hr-horizontal'>                         
               </div>   
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>
            <div class='accordion col-lg-12' id='accordionExample'>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingOne'>
                        <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                            ".IMPRINT_NAME."
                        </button>
                    </h4>
                    <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                            <strong>".htmlentities($row['name'], ENT_QUOTES, 'UTF-8')."</strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingTwo'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                            ".IMPRINT_ADDRESS."
                        </button>
                    </h4>
                    <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                            <strong>".htmlentities($row['address'], ENT_QUOTES, 'UTF-8')."</strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingThree'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
                            ".SITE_EMAIL_NOTE."
                        </button>
                    </h4>
                    <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                            <strong>".SITE_EMAIL."</strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingFour'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseFour' aria-expanded='false' aria-controls='collapseFour'>
                            ".IMPRINT_PHONE."
                        </button>
                    </h4>
                    <div id='collapseFour' class='accordion-collapse collapse' aria-labelledby='headingFour' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                        <strong>";
                        $parser = new xUCP_BBCode_Parser();    
    
                        $htmlText = $parser->parse($row['phone_number']);
                        
                        echo $htmlText;
    echo "
                                </strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingFour'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseFive' aria-expanded='false' aria-controls='collapseFive'>
                            ".IMPRINT_DATA_PROTECTION."
                        </button>
                    </h4>
                    <div id='collapseFive' class='accordion-collapse collapse' aria-labelledby='headingFour' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                        <strong>";
                        $parser = new xUCP_BBCode_Parser();    
    
                        $htmlText = $parser->parse($row['data_protection']);
                        
                        echo $htmlText;
    echo "
                                </strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingFour'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseSix' aria-expanded='false' aria-controls='collapseSix'>
                            ".IMPRINT_LIABILITY_FOR_CONTENT."
                        </button>
                    </h4>
                    <div id='collapseSix' class='accordion-collapse collapse' aria-labelledby='headingFour' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                        <strong>";
                        $parser = new xUCP_BBCode_Parser();    
    
                        $htmlText = $parser->parse($row['liability_for_content']);
                        
                        echo $htmlText;
    echo "
                                </strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingFour'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseSeven' aria-expanded='false' aria-controls='collapseSeven'>
                            ".IMPRINT_LIABILITY_FOR_LINKS."
                        </button>
                    </h4>
                    <div id='collapseSeven' class='accordion-collapse collapse' aria-labelledby='headingFour' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                        <strong>";
                        $parser = new xUCP_BBCode_Parser();    
    
                        $htmlText = $parser->parse($row['liability_for_links']);
                        
                        echo $htmlText;
    echo "
                                </strong>
                        </div>
                    </div>
                </div>
                <div class='accordion-item'>
                    <h4 class='accordion-header' id='headingFour'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseEight' aria-expanded='false' aria-controls='collapseEight'>
                            ".IMPRINT_COPYRIGHT."
                        </button>
                    </h4>
                    <div id='collapseEight' class='accordion-collapse collapse' aria-labelledby='headingFour' data-bs-parent='#accordionExample'>
                        <div class='accordion-body'>
                        <strong>";
                        $parser = new xUCP_BBCode_Parser();    
    
                        $htmlText = $parser->parse($row['copyright']);
                        
                        echo $htmlText;
    echo "
                                </strong>
                        </div>
                    </div>
                </div>                				
            </div>
                    </p>
               </div>
            </div>
         </div>
      </div>";
}

$user->xucp_footer_none_logged();
