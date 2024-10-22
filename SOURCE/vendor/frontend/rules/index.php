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
$user->xucp_header_none_logged(RULES);
$user->xucp_content_none_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_rules");
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
	$short_content = substr($content, 0, 100000);
	echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						<path fill-rule='evenodd' clip-rule='evenodd' d='M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
					    <path d='M14.2882 15.3584H8.88818' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M12.2432 11.606H8.88721' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
					</svg>
                    ".$title."
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
$user->xucp_footer_none_logged();