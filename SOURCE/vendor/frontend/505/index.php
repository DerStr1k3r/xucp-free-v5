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
$user->xucp_header_none_logged("505");
$user->xucp_content_none_logged();

echo "
		<div class='error-404 d-flex align-items-center justify-content-center'>
			<div class='container'>
				<div class='card mt-5'>
					<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center'>
						<div class='col-12 col-lg-12 mx-auto'>
							<div class='card-body p-4'>
								<h1 class='display-1'><span class='text-white'>5</span><span class='text-white'>0</span><span class='text-white'>5</span></h1>
								<p>Internal site error</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";			
$user->xucp_footer_none_logged();