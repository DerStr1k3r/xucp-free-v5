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
$user->xucp_header_logged(SUPPORT_HEADER_LIST);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

$support = ($_GET["support"] ?? ($_POST["support"] ?? "view"));
$support = trim(htmlspecialchars($support));

if ($support == "remoticket") {
    if(isset($_POST['sup_rem'])) {
        $select_stmt = $db->prepare("DELETE FROM xucp_support");
        $select_stmt->execute();

        if($select_stmt->rowCount() > 0){
            echo "
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h4 class='card-title'>" . SUPPORT_HEADER_LIST . "</h4>
                        </div>
                        <div class='card-body'>
                            " . SUPPORTDELETEINFO . "
                        </div>
                    </div>
                </div>
            </div>";
        }
    }                           
}

echo "
<div class='row align-items-center'>
    <div class='col-md-6'>
        <div class='mb-3'>
        </div>
    </div>
    <div class='col-md-6'>
        <div class='d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3'>
            <div>
                <form method='post' action='{$_SERVER['PHP_SELF']}?support=remoticket' enctype='multipart/form-data'>
                    <div class='d-flex flex-wrap gap-3 align-items-center'>
                        <button type='submit' name='sup_rem' class='btn btn-light'>" . SUPPORTDELETE2 . "</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>                        
<div class='row'>
    <div class='col-xl-12'>
        <div class='card xucp-card'>
            <div class='card-body'>
                <div class='table-responsive'>
                    <table class='table'>
                        <thead class='text-primary'>
                            <th>" . SUPPORTUSERID . "</th>
                            <th>" . SUPPORTUSERNAME . "</th>                     
                            <th>" . SUPPORTSUBJECT . "</th>                    
                            <th>" . SUPPORTDATE . "</th>
                            <th>" . SUPPORTOPTIONS . "</th>                                                                     
                        </thead>
                        <tbody>";

$select_stmt = $db->prepare("SELECT * FROM xucp_support WHERE id LIKE ?");
$select_stmt->execute(["%$query%"]);

while($support_row = $select_stmt->fetch()) {
    echo "                    
    <tr>
        <td>" . htmlspecialchars($support_row['id']) . "</td>
        <td>" . htmlspecialchars($support_row['username']) . "</td>                       
        <td>" . htmlspecialchars($support_row['bug']) . "</td>
        <td>" . htmlspecialchars($support_row['posted']) . "</td>
        <td>
            <a href='/vendor/backend/staff/support/index-view?id=" . htmlspecialchars($support_row['id']) . "' class='btn btn-primary w-100 waves-effect waves-light'>
                <i class='dripicons-checkmark'></i>&nbsp;" . SUPPORTOPTIONS_VIEW . "
            </a>
        </td>                                                                       
    </tr>";
}
echo "                                      
</tbody>
</table>
</div>         
</div>
</div>
</div>
</div>";

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();