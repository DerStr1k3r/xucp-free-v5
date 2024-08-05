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
$user->xucp_header_logged(STAFF_RULES_ACP);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

$select_stmt = $db->prepare("SELECT title, title_de, content, content_de FROM `xucp_rules` WHERE id = 1");
$select_stmt->execute();
$RULES_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='card xucp-card'>
                                    <div class='card-header'>
                                        <h4 class='card-title'>".STAFF_RULES_ACP."</h4>
										<p class='card-title-desc'>".RULES_INFO."</p>
                                    </div>
                                    <div class='card-body p-4'>
										<form class='form-horizontal' method='post' action='/app/features/staff/xucp_rules.php' enctype='multipart/form-data'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div>
                                                    <div class='mb-3'>
                                                        <label for='example-text-input' class='form-label'>".RULES_TITLE_EN."&nbsp;<small class='text-muted'>".RULES_TITLE_EN_TEXT."</small></label>
														<input type='text' name='xucp_title' size='50' maxlength='100' class='form-control' value='".$RULES_set["title"]."' required>
                                                    </div>
                                                    <div class='mb-3'>
                                                        <label for='example-text-input' class='form-label'>".RULES_TITLE_DE."&nbsp;<small class='text-muted'>".RULES_TITLE_DE_TEXT."</small></label>
														<input type='text' name='xucp_title_de' size='50' maxlength='100' class='form-control' value='".$RULES_set["title_de"]."' required>
                                                    </div>                                                   
                                                </div>
                                            </div>

                                            <div class='col-lg-6'>
                                                <div class='mt-3 mt-lg-0'>
                                                    <div class='mb-3'>
                                                        <label for='example-text-input' class='form-label'>".RULES_CONTENT_EN."&nbsp;<small class='text-muted'>".RULES_CONTENT_EN_TEXT."</small></label>";
                                                        $bbcodeEditor = new xUCP_BBCode_Editor();
                                                        echo $bbcodeEditor->xucp_text_bbcode("xucp_content", $RULES_set['content']);
                                                        echo"
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-lg-6'>
                                                <div class='mt-3 mt-lg-0'>
                                                    <div class='mb-3'>
                                                        <label for='example-text-input' class='form-label'>".RULES_CONTENT_DE."&nbsp;<small class='text-muted'>".RULES_CONTENT_DE_TEXT."</small></label>";
                                                        $bbcodeEditor = new xUCP_BBCode_Editor();
                                                        echo $bbcodeEditor->xucp_text_bbcode("xucp_content_de", $RULES_set['content_de']);
                                                        echo"
                                                    </div>
                                                </div>
                                            </div><hr>                                            
                                            <div class='col-lg-12'>
                                                <div class='mt-3 mt-lg-0'>
                                                    <div class='mb-3'>
														<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
															<i class='dripicons-checkmark'></i>&nbsp;".RULES_SAVE."
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>											
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
                        </div>";
}
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();