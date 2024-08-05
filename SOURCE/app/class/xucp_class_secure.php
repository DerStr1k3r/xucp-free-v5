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
class xUCP_Secure {
   private $db;

   public function __construct($db) {
       $this->db = $db;
   }
   
    // Generiert ein neues CSRF-Token und speichert es in der Session
    public static function staff_check(): void {
        if(!isset($_SESSION['xucp_free']['secure_staff']) > UC_CLASS_SUPPORTER) {
            $user = new xUCP_Themes($db);
            $user->xucp_header_none_logged(SECURE_SYSTEM);
            $user->xucp_content_none_logged();
            echo "
        <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
						<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M13.864 13.8249L10.106 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M10.106 13.8249L13.864 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
					</svg>
                    ".SECURE_SYSTEM."
                  </h4>
                  <hr class='hr-horizontal'>
               </div>
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>".MSG_2."</p>
               </div>
            </div>
         </div>
      </div>";
            $user->xucp_footer_none_logged();
            die();
        }
    }
    
    public static function supleader_check(): void {
        if(!isset($_SESSION['xucp_free']['secure_staff']) > UC_CLASS_SUPPORTER) {
            $user = new xUCP_Themes($db);
            $user->xucp_header_none_logged(SECURE_SYSTEM);
            $user->xucp_content_none_logged();
            echo "
        <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
						<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M13.864 13.8249L10.106 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M10.106 13.8249L13.864 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
					</svg>
                    ".SECURE_SYSTEM."
                  </h4>
                  <hr class='hr-horizontal'>
               </div>
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>".MSG_2."</p>
               </div>
            </div>
         </div>
      </div>";
            $user->xucp_footer_none_logged();
            die();
        }
    }
    
    public static function staff_check_rank(): void {
        if(!isset($_SESSION['xucp_free']['secure_staff']) > UC_CLASS_PROJECT_MANAGEMENT) {
            $user = new xUCP_Themes($db);
            $user->xucp_header_none_logged(SECURE_SYSTEM);
            $user->xucp_content_none_logged();
            echo "
        <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
						<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M13.864 13.8249L10.106 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						<path d='M10.106 13.8249L13.864 10.0669' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
					</svg>
                    ".SECURE_SYSTEM."
                  </h4>
                  <hr class='hr-horizontal'>
               </div>
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>".MSG_26."</p>
               </div>
            </div>
         </div>
      </div>";
            $user->xucp_footer_none_logged();
            die();
        }
    }
}