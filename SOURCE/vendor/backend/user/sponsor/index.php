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
include_once(dirname(__FILE__) . "/../../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(SPONSOR_HEADER);
$user->xucp_content_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_sponsors");
$select_stmt->execute();
$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                        <path fill-rule='evenodd' clip-rule='evenodd' d='M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                        <path d='M14.3889 20.8572C13.0247 22.3719 10.8967 22.3899 9.51953 20.8572' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                    </svg>
                    ".SPONSOR_HEADER."
                  </h4>
                  <hr class='hr-horizontal'>                         
               </div>   
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>
                        <div class='card-body'>
                            <tr>                                  
                                <td>
                                    <h6 class='title'>
                                        ".SPONSOR_URL."
                                    </h6>
                                    <div class='input-group'>
                                        ".htmlentities($row['sponsor_url'], ENT_QUOTES, 'UTF-8')."
                                    </div>    
                                </td>
                            </tr>
                            <tr>                                  
                                <td>
                                    <h6 class='title'>
                                        ".SPONSOR_IMAGE."
                                    </h6>
                                    <div class='input-group'>
                                        <img src='".htmlentities($row['sponsor_image'], ENT_QUOTES, 'UTF-8')."' style='height='120px'>
                                    </div>    
                                </td>                                
                            </tr>
                            <tr>                                  
                                <td>
                                    <h6 class='title'>
                                        ".SPONSOR_TEXT."
                                    </h6>
                                    <div class='input-group'>
                                        <p>";
                                        $parser = new xUCP_BBCode_Parser();    
                                        $htmlText = $parser->parse($row['sponsor_text']);
                                        echo $htmlText;
echo "                                                    
                                        </p>
                                    </div>    
                                </td>                                
                            </tr>
                        </div>                    
                    </p>
               </div>
            </div>
         </div>
      </div>";
} else {
    echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                        <path fill-rule='evenodd' clip-rule='evenodd' d='M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                        <path d='M14.3889 20.8572C13.0247 22.3719 10.8967 22.3899 9.51953 20.8572' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                    </svg>
                    ".SPONSOR_HEADER."
                  </h4>
                  <hr class='hr-horizontal'>                         
               </div>   
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>".SPONSOR_NOT_FOUND."</p>
               </div>
            </div>
         </div>
      </div>";
}

$user->xucp_footer_logged();