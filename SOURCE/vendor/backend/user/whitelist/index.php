<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.0
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
$user->xucp_header_logged(MYWHITELIST_HEADER);
$user->xucp_content_logged();

$myWhitelist = new xUCP_MyWhitelist($db);
$myWhitelist->processRequest();

$select_stmt = $db->prepare("SELECT * FROM xucp_config WHERE `id` = 1");
$select_stmt->execute();
$wl_status = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    echo "<div class='row'>
              <div class='col-xl-12'>
                  <div class='card xucp-card'>
                      <div class='card-header'>
                          <h4 class='card-title'>" . MYWHITELIST_HEADER . "</h4>
                          <p class='card-title-desc'>" . MYWHITELIST_STATUS_5 . "<br>" . MYWHITELIST_STATUS_6 . "</p>
                      </div>
                      <div class='card-body'>";

    echo "<form class='forms-sample' name='form' method='post' action='" . $_SERVER['PHP_SELF'] . "'>
              <input type='hidden' name='new' value='1' />
                  <div class='form-group'>
                      <label class='col-sm-12 col-form-label'>" . MYWHITELIST_USERNAME . "</label>
                      <div class='col-sm-12'>";
    
    $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE `id` = :id");
    $select_stmt->bindParam(':id', $_SESSION['xucp_free']['secure_first']);
    $select_stmt->execute();
    $wl_username = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($select_stmt->rowCount() > 0) {
        echo "<input type='text' class='form-control' name='xucp_ucpname' value='" . htmlentities($wl_username['username'], ENT_QUOTES, 'UTF-8') . "'>";
    }
    echo "</div>
          </div>
          <div class='form-group'>
              <label class='col-sm-12 col-form-label'>" . MYWHITELIST_CHARNAME . "</label>
              <div class='col-sm-12'>
                  <input type='text' class='form-control' name='xucp_charname' required>
              </div>
          </div>
          <div class='form-group'>
              <label class='col-sm-12 col-form-label'>" . MYWHITELIST_STORY . "</label>
              <div class='col-sm-12'>
                  <input type='text' class='form-control' name='xucp_charstory' required>
              </div>
          </div>";

    // Loop through the questions and generate inputs dynamically
    for ($i = 1; $i <= 12; $i++) {
        $questionKey = 'frage' . $i;
        echo "<div class='form-group'>
                  <label class='col-sm-12 col-form-label'>" . htmlentities($wl_status[$questionKey], ENT_QUOTES, 'UTF-8') . "</label>
                  <div class='col-sm-12'>
                      <textarea id='frage" . $i . "' name='xucp_frage" . $i . "' class='form-control' rows='3' cols='100' required></textarea>
                  </div>
              </div>";
    }

    echo "<input type='submit' name='xucp_myaddwl' value='" . FRAGE_SEND . "' class='btn btn-dark mr-2' />
          </form>
          </div>
      </div>
  </div>
</div>";
}

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();