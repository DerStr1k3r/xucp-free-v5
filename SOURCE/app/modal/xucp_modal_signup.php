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
// * Direct Call Blocker
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /vendor/frontend/404/index', true, 0 ) );
}
// ************************************************************************************//
// * Modal: Signup
// ************************************************************************************//
echo "
		<div class='modal fade' id='registerModal' tabindex='-1' aria-labelledby='registerModalLabel' aria-hidden='true'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h5 class='modal-title' id='registerModalLabel'>
						    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                            </svg>
					        ".REGISTER."
					    </h5>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<div class='form-body'>
							<form class='row g-3' novalidate action='/app/features/user/xucp_signup' method='post' enctype='multipart/form-data' autocomplete='off'>
                                <input type='hidden' name='csrf_token' value='".xUCP_CSRF_Secure::generateToken()."'>
                                <p>".NOTE."</p>
                                <div class='form-floating mb-3'>
                                    <input type='text' name='xucp_username' class='form-control' id='floatingInput' placeholder='".USERNAME."'>
                                    <label for='floatingInput'>".USERNAME." *</label>
                                </div>
                                <div class='form-floating mb-2'>
                                    <input type='email' name='xucp_email' class='form-control' id='Password' placeholder='".EMAIL."'>
                                    <label for='".EMAIL."'>".EMAIL." *</label>
                                </div>
                                <div class='form-floating mb-2'>
                                    <input type='password' name='xucp_password' class='form-control' id='Password' placeholder='".PASSWORD."'>
                                    <label for='".PASSWORD."'>".PASSWORD." *</label>
                                </div>
                                <div class='text-center'>
                                    <button type='submit' name='xucp_signup' class='btn btn-primary'>".REGISTER."</button>
                                </div>
							</form>
						</div>
					</div>
						<div class='modal-footer'>
							<button type='button' class='btn btn-primary mt-3' data-bs-dismiss='modal'>Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>";