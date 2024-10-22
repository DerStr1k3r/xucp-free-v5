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
class xUCP_Themes {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function xucp_header_none_logged(string $SITE_SUB_TITLE = ""): void {
    header("Content-Type: text/html; charset=utf-8");
    header("X-XSS-Protection: 1; mode=block");
    header("X-Content-Type-Options: nosniff");
    header("Strict-Transport-Security: max-age=31536000");
    header("Referrer-Policy: origin-when-cross-origin");
    header("Expect-CT: max-age=7776000, enforce");
    header("Feature-Policy: vibrate 'self'; user-media *; sync-xhr 'self'");        
    echo "
    <!-- ####################################################### -->
    <!-- #   Powered by xUCP Free V5.1                         # -->
    <!-- #   Copyright (c) 2024 DerStr1k3r.                    # -->
    <!-- #   All rights reserved.                              # -->
    <!-- ####################################################### -->
    <!doctype html>
    <html lang='de'>
      <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>".$_SESSION['xucp_free']['site_settings_site_name']." | ".$SITE_SUB_TITLE."</title>
        <link rel='shortcut icon' href='/public/images/logo.png' />
        <link rel='stylesheet' href='/public/css/libs.min.css'>
        <link rel='stylesheet' href='/public/css/xucp-pro-v5.css?v=5.0.0'>
      </head>
      <body class=''>
        <div id='loading'>
          <div class='loader simple-loader'>
              <div class='loader-body'></div>
          </div>
        </div>
        <main class='main-content'>
          <div class='position-relative'>
            <nav class='nav navbar navbar-expand-lg navbar-light iq-navbar border-bottom'>
              <div class='container-fluid navbar-inner'>
                <a href='".$_SERVER['PHP_SELF']."' class='navbar-brand'>
                </a>
                <div class='sidebar-toggle' data-toggle='sidebar' data-active='true'>
                        <i class='icon'>
                         <svg width='20px' height='20px' viewBox='0 0 24 24'>
                            <path fill='currentColor' d='M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z' />
                        </svg>
                        </i>
                </div>
                      <h4 class='title'>
                        <svg class='logo-title m-0 float-start' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='240px' height='42px' viewBox='0 0 248 42' enable-background='new 0 0 240 42' xml:space='preserve'>  <image id='image0' width='240' height='42' x='0' y='0'
                          href='data:image/png;base64,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' />
                    </svg>
                      </h4>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                      <span class='navbar-toggler-icon'>
                          <span class='navbar-toggler-bar bar1 mt-2'></span>
                          <span class='navbar-toggler-bar bar2'></span>
                          <span class='navbar-toggler-bar bar3'></span>
                        </span>
                    </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                  <ul class='navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='/index'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						              <path d='M15.7161 16.2234H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						              <path d='M15.7161 12.0369H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						              <path d='M11.2521 7.86011H8.49707' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						              <path fill-rule='evenodd' clip-rule='evenodd' d='M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
					              </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".HOME_NONE_LOGGED."</h6>
                        </div>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='/vendor/frontend/rules/index'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						                <path d='M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
					                  <path d='M14.2882 15.3584H8.88818' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						                <path d='M12.2432 11.606H8.88721' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>  
                        </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".RULES."</h6>
                        </div>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='/vendor/frontend/stream/index'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>Live Stream Status</h6>
                        </div>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='/vendor/frontend/portfolio/index'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M16.8397 20.1642V6.54639' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
								            <path d='M20.9173 16.0681L16.8395 20.1648L12.7617 16.0681' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
								            <path d='M6.91102 3.83276V17.4505' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
								            <path d='M2.8335 7.92894L6.91127 3.83228L10.9891 7.92894' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>Portfolio</h6>
                        </div>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='https://discord.gg/xg5mnYUWch'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.353 2.5C18.054 2.911 20.978 5.831 21.393 9.532' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
								            <path d='M14.353 6.04297C16.124 6.38697 17.508 7.77197 17.853 9.54297' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
								            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.0315 12.4724C15.0205 16.4604 15.9254 11.8467 18.4653 14.3848C20.9138 16.8328 22.3222 17.3232 19.2188 20.4247C18.8302 20.737 16.3613 24.4943 7.68447 15.8197C-0.993406 7.144 2.76157 4.67244 3.07394 4.28395C6.18377 1.17385 6.66682 2.58938 9.11539 5.03733C11.6541 7.5765 7.04254 8.48441 11.0315 12.4724Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>Discord</h6>
                        </div>
                      </a>
                    </li>
                        <li class='nav-item dropdown'>
                          <a class='nav-link py-0 d-flex align-items-center' href='#' data-bs-toggle='modal' data-bs-target='#loginModal'>
                            <i class='icon'>
                                <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                    <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                </svg>
                            </i>                      
                            <div class='caption ms-3 '>
                                <h6 class='mb-0 caption-title'>".LOGIN."</h6>
                            </div>
                          </a>
                        </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='/vendor/frontend/imprint/index'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.635 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						                <path d='M11.9946 16V12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						                <path d='M11.9896 8.2041H11.9996' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>                      
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".IMPRINT_HEADER."</h6>
                        </div>
                      </a>
                    </li>                                                                                                                    
                  </ul>
                </div>
              </div>
            </nav>        <!--Nav End-->
          </div>";
    }
    
    public function xucp_header_logged(string $SITE_SUB_TITLE = ""): void {
    header("Content-Type: text/html; charset=utf-8");
    header("X-XSS-Protection: 1; mode=block");
    header("X-Content-Type-Options: nosniff");
    header("Strict-Transport-Security: max-age=31536000");
    header("Referrer-Policy: origin-when-cross-origin");
    header("Expect-CT: max-age=7776000, enforce");
    header("Feature-Policy: vibrate 'self'; user-media *; sync-xhr 'self'");        
    echo "        
<!-- ####################################################### -->
<!-- #   Powered by xUCP Free V5.1                         # -->
<!-- #   Copyright (c) 2024 DerStr1k3r.                    # -->
<!-- #   All rights reserved.                              # -->
<!-- ####################################################### -->
<!doctype html>
<html lang='".$_SESSION['xucp_free']['site_settings_lang']."'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>".$_SESSION['xucp_free']['site_settings_site_name']." | ".$SITE_SUB_TITLE."</title>
    <link rel='shortcut icon' href='/public/images/logo.png' />
    <link rel='stylesheet' href='/public/css/libs.min.css'>
    <link rel='stylesheet' href='/public/css/icons.css'>
    <link rel='stylesheet' href='/public/css/xucp-pro-v5.css?v=5.0.0'>
  </head>
  <body class=''>
    <div id='loading'>
      <div class='loader simple-loader'>
          <div class='loader-body'></div>
      </div>
    </div>
    <aside class='sidebar sidebar-default navs-rounded '>
        <div class='sidebar-header d-flex align-items-center justify-content-start'>
            <a href='/vendor/backend/user/dashboard/index' class='navbar-brand dis-none align-items-center justify-content-center'>
                   <svg class='logo-title m-0' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='240px' height='42px' viewBox='0 0 248 42' enable-background='new 0 0 240 42' xml:space='preserve'>  <image id='image0' width='240' height='42' x='0' y='0'
                      href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPgAAAAqCAYAAACeJ5YvAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                  AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAq
                  tElEQVR42u2dd9wcRf343zO7e+0pedIrSYiBAE8CAaSFUAUiVUAMoUhTepOvoIBfBEUQFEWkBAFB
                  ihAg1EhHiBSphpDwEHoIhPT6lOu78/tjdm737rm75+4hWH5fP3nN6y7P7e7MzsynlxFKKXoDohUB
                  JIAmoMFvUaAfMBlYA7wO5IEOoMtvnaqNdOg5FhD3WxSwgZj/GQUE4PmfFuD4zfb/lveb+XvcH1Mc
                  VBRwQazzr8kCSf95KtREhddU/j1pIOWPP+1/JlUbXpk5afDnxbSY3yK1TKvfZ87Mlf8uCf/dZJV7
                  Pf++ZGi+O1QbnXWsaTTUnxl7g993NTD9Zszc+H2nRSuOv44x/zmR0FpF/TWVoVYvmDUEcP15yKLX
                  O+c3s4YZIKPa8EQr0n/HhtB7mvHU03dvwPXv9fzm+i0b+kz7n9nSfVYLiFb9afdygKAXyGzeuD9B
                  ABOBnwDLgB8AX/i/mRfKiVY9aNFKxL83QYDk5rm2/7IW0BfYCBgBDEMTkQb0hkgD69EEZSWwCo2M
                  CoQhDI2gIkAGxJqBfb2mI/cXI3J5N5lOk7Fk943Vp0lF3/7AWvnMK3IJAZExhMFFb6B0yW1mI4db
                  AogmYjQM7KucbE6U3RSWpRg9TCU+Xy5Ti5aw2n9v22/O9uPVsElbuUNSGXJeaLltG2FLrJfmWsve
                  ek8sDd1jAZZoRdaxQSwCIloY+4jBqiUWQbZ3CdeSATGMOEpkc0ItXcX60DOyob4jof0RJUBq8900
                  g9yipwFWAIPkhshFCRA8HZoPG7BFK2m/v5h/rRlfgtoIcbjf3kDe/yxF8Iw/ZrOGWSAtWsmoNnK9
                  6ahXCO5Tv6g/Gaa5aMQ7GL1QQ4G9gNsIFjLi35cJcTuDFGEurvzvo4BtgB2A0UBzlTErNGKvBD4C
                  2oCFQLvuV7iCfExhx6UlEscd7B03rKn9a8Kx1zmW6obgjqUaOlLW8jN/3XjxzKfFQgLkNhJDTLTi
                  qTay/pyY9zDzYRA8euT+apOLT0ye1Bjz+uZckSk3+KjjNXakrOWH/rDhV6E/G4Szzzs2u8uUHVLH
                  e0q4KtggADJieY1Pv9l0yyE/sO8L3RNu9SC4DN0X6d9HNc/8deqkjQblx+VcmSaEhFIqpyttrfnh
                  b+M3PP6i+BS9QcP9GmnMrG+Yi0cAe+hAmo7e3x2zxRh3xNCB9JcSmXfxZA2oLiVWMi261qxTnV1p
                  kX5lnr3o7sfEIjSSGInNphjJLQLJzwqtVQKIfWNHNXxwP5XoSpGTFeQJS2JlciK/4BPRns7gOXZt
                  kodlgevCwi/oIiBKBrlz/liy/jyGCbUUrQiz1+qB3nLw8IIZkUsBOwLbha47CHgReA+NuDmKxbNG
                  AooeJxDDNwe+iRb1+9c4JqMyjPLbbsCCUP8uQkZR7qDlq6z26fdaD597hH1qYzTTEm2QWKVL5EGj
                  kxt22WnylBfeTFy2Yo3w8BGbgPJ6orVAxUu5dwSIWJLExScmTxrWktxaVNoxSqGAV9uan3jnI9b4
                  82SkDwGIWMRLSJWPStF953s5l0TUi4XmIXxRTVzRJ7jdrm9qUPaQfrmvNceyo0vHr5SipcEaPnRg
                  PF6mb0Ex4TbfI0Bkn0lq6HnHZr7ZOjq3U2M8P0wK5fRWXZRCoIRQR39Tdv3iZPnZq22R2Wf/KvLs
                  yrWik2LubQgYaDUiTNCc4YNVn+t+nDptSEtmQt6z0pX6E0IvWT5PUik8IWqWPIRSqExeduZdmVnb
                  rlYsXOp88tBz9tsznpSLCAiSjcYRQ1AFIEQr1IvkdSO4aMUm4MRm8QRajN6LYh1mMLAP8CGaAJj7
                  jCgUD33PA32A/YBvAyN7tdrF7zYBGAe8AjyvlFwuRL6P8vJ9brrffm/jEc0zD9919TGRqMSOdX+A
                  kJJh/dLb3v8refRu34/fRKDjeSXfBcEmDrfok9PTRw7rm9paSkvvjDKgPI833kvMPOScyEyKdUbp
                  zxvZnMgIKSs+I5MTRoTrFZaoNpTR28KQzgovl5cpISXdCJRSpLNW5/rOwqYL9x3m3AVbRP8+qum2
                  n2e+NXnLzKERmWv2Z1r/k71RwfU4UEo40m0c1JLf4qDJuS322CZ90F9ejt974s8jzxAgjekgrLcX
                  JrQhpuyGmDvAlm7CsVWix34dVSvzKTvmoX0FraMzfHN70hecEH/9DzPth264z3mXwMYUVl0UmqG4
                  qg231m56M6MGScOcOILmmNuVuX4vYDN/gOa+Ur1bohH6B8CZfHnkLh3vbsD3gc2VspMIywHsC67m
                  pXc+a3g1k/XwKgixUgi22TT1resudHejmEuHEToshRT+9utzspN22rxrmhCiPGIKgee6LF4dfWva
                  +bG7CYyAGf/7fzKEGUAMiO+yLUNfu73rkj0mdh4Xsd1mYVkIy6Ia4aoJhECYJiVCCJri+RFH7NXx
                  wzkzUuePG80AuksShqQXiFJXSuTzrkiL8POqNZ/o9aqF3tu2iH1tcNeuV5zeceXsP2ZOHtRPtVCM
                  I2FjbbSeqakLwX3ubRA6bBkeAexLeQPFEOAAf5BGdzdcPOFP8CbAT4H9+XKGv2owAjgO2BpEgeOc
                  97vovSvX24u8ShguBAJlTd2z83uHfMMbSTGSG10ySgmSn/htb9zxB6TOBCpyJpXPk8o7q/53esON
                  K9aIdgLETlKsZ/8nQti2EttxKwbPuKz90sEtqa2kZSG+DELXAAaRxg7t2v3J6zp+Nm40/eiuWv57
                  gBAIy0JKItuO7Tj077d1XXLwHu5oujOQKBDxjZc1Qb0c3CB22CJqATsBW1W5b0+0uGwQ3OgYEhgD
                  nA1sWcc4ssBatOW8i9qNSM1AK4EhI/f+QrHmN3c3/TGbF8lKOqCQkriTG3TlmV1nRyMFlSKM2OGF
                  iIwdScuFx3WdFrVzfavp3YC679nELb4RL4M2Ehr3yH8yhI2vkaED6XPnzzp+3BzPjpb2V0W/y4Nl
                  WQxoTG/20G+6zm1qKNh8IqHPfxsQQiAtiyEt6S2v/1HnRd/YwRtGyd4y3333co9QM4KHuLdBziga
                  sYYAe/dwe1+00SzsA3XRRrZj0a61nmAV8FfgeuBy4Jf+5+XAb4AZaGNaNWR3gTlo4pBGc8rUnbNk
                  20vzG2cqz6MSkkspGdo3M+Hx6zJHEWyQMEcoWNFv/1nymIHNmc2lVXkNlFK83NYw44xfOrPRyG38
                  tCn/8z8ZjJstCjj3XZk6dkhLekK1+QhNTP2tB5C2zcgBqe0evjp9FMWuun8rBDcgpKQ5kRt13fnp
                  MyhWhcP7rKfYBP3uNXWoLaxhV1eEwN2wO9qQ1RPsRoDIRo+QaOSvBh3AncB5wK+Ae9GI/nfgVeAF
                  4FFgOnARcAXwToVnveRf30kQDNIJpA45JzJj4YrYK6qaqC4lXx/XdfClZ7jbUezfLfhS77wsu/9W
                  Y5IHVjMYefk8n62MvXrYefF7CZDbNOML7dZ9LWv1bwKGkEcuPtXddsKY1JSekFt5Hp7ropSqq3lK
                  oVyXiusWmsCtxyb3P/dYd0uKA27qAqUUyvO+fOthrFJKRvRLbnfbpfkpFIvoxgBXkyhUq7xkUax3
                  GlfRGLTeXAs0oH3kbWjkstBc+RFgCwKjRxj+Adzo32PGYfzQ4TmS/rssAT5DI/J3AMNtQXPGh9GB
                  N8Zvb/RcG0gcdWHDjY//3tuoOZ4bYdvdEVQIgSW86IkHdpz++vzmpbP+Jhf5z5FA9OyjvPEHTur8
                  PpWMauiNnMxFVlxwfeKWji468aOVKEby0s6V6/WohnwlBMB1iyzOtULEn1Nn2t6ZQyypoogKdgil
                  wPNY1Rl7v+3T6GvLVomVjq2cngiaUihPCdWnUTUMbPEGjRma2bo5ntvIGNy6TY6UOLaXOOaAzCFX
                  3Z54x59z47qtbS48cms77E/znsxEbJWIOAUbUk3zoxQIFJEIjQ5uk+e6oiLh899jvx06p+2+fZ+3
                  Zr8uPqfYjWaLVpyeAmB6RHCfe4d1qhh6M9loF9hGtU4Q2k++DZoDW2jkeAkd0rprybVPAr9HR8TF
                  0JzNRCeFEdysZjiQZjVwC7AcOAkdgPM3NMHIoEVzl0DlsAF7/ocic9PDDfef/K32M+MxZduWwC6Z
                  fyEljXF36FX/kzpt1t8a/td/hhy/Cf3POaLjVEu4cSHLT6vmOHg3PdJw7SPPic/orncbRDcumoJP
                  2bHrCqHcYGBbotSvXjwfAqvM2Cwgcvo0d7MhfTObV4wDVgrPVbln5zTfdsLFkSfWdRQCQOoBAYjW
                  sZG+N1yYmbrNJslDhVJlCawARgzIjD9tWmzTG2bId/z5L6I8SlUgpEqRyVkdP7q28aqZT8ulEzbx
                  GocOIOapnhmyAU+hbAsZjShrm829wYftld9/9MDkpGpEKRFzh5w1LTd59uuR+ykOfokCru82q0j8
                  a+Hg5mFGZzFizThgjzoXI4q2qM8B1vmT2wU8gUZ+w21fAX4HrPD/loKC789QTPOyxkdowknTBDr+
                  X/zPXdGSgiEMXQR6TFjssS79g/X2RoMbH52yXcehsZikMVFm7aRkWN/0to/8PnrYt86y7wPE7T9P
                  ntS/OT9WWhWkPl9ffKmt6e6LrrPfIIhvDyN5OvQuRa25QfVV5TaCv5nXtIu1obkpbT2CT8jDQSoC
                  YKOhxOIxmqjgysrlReeSFSJZsl8sQO6+rTvOsVWjEGXu9UXs5+c133Xo/zgPEngQavbxhsZqtX0k
                  crudELvpuZtxt9ss+Z1yAUHCsnBwm/fZyZ1wwwy5IDRWABwbaVkiUkkCUwhvyQqZdD06574vO+a+
                  33up6dHZ1sJLpjtzHvqtOGyf7VPf0wMsM2YhmLhpdhJEHiKIvIsTRMGZcNyyUFUH9xc9LPsbBE+g
                  /duVuLcJvysHk4BdCII4JPAW8Jz/+8fApWhR2nB5m8Af2Iw2zpnPUtdHhADZAZ4GLkEb4MzzYkAL
                  OrGi2f/eglYjrDN+6TzbtqhhTmeyPGE0PtDdJ3Yeec7R+Qk3X5zba9yI9J7V9EzP81i2Ljr/wDMi
                  9+EnPdAdyY1xrdtKS1l9M3WlyBAgsyr5Xg8URcE1xJVtSVVRV83lSS1bVehbEYoOGzPCG+tPWLf7
                  lFKsao8uOPESZxYlSSpou0itrcO/rwvIHnVhbMaazsiHlXRyIQSjhrhjCEWwmd+aGpQddVRDufuU
                  UrieTC1eUSDCpu/etiSQPuR/Yve/9l5iZrUovpbG/Mhp+6qRBDEkhjkVEahy0JORLRzIYhAdYDza
                  uFYJHgVmV+nzIHSsOmhE7AQeA94GbkfHj49F+643AgaiQ1Yb/fsb/RcdiI5RHwYM968d5F87wH++
                  SQrpQm8kY0swaobR3x1QfYFENoe6+MboI6vb7bXVNootVfz845LnHbZH10nVAjWUUnSk7MVn/zpx
                  teuRJBDHi5A8pE91W+2exEDb6rbQG0Qn9zyhKoqtaBE9GinaR4Xoq6aE27/soH1pZv4n0VdXrCnY
                  IXIEyF0Popjrs0B26Uo63vog8mI1w1xLQ2741zZSTQRIUhMohZtOF+ZC1TnOcgieBLKX3hSZ1Zm2
                  l5Xba0IILKli+03ObzFpIsMpRmwbndRTca0riugh3TucVGKjudzeaPdYOfgCuAuNnLtXmMCt0Fz8
                  QQJD13zgQrTb7DT0xjeW+rX+Zw5NPJ7379kPLfKbDByJRpakP+7X0Ia1laGN56AJ1LZo7m2MWhaI
                  j/3Jl2+8w5pbH43PuOrs/ClKKSEqRKI1xNzBwv9eflMo8nmVumVW4/THXpSLKbaam42d6U0iwb8p
                  WOgkkkTEJlpuVhSAtNTCL1iKJvAmMcSkndYjpltoyS6D3qPeOx9ZC/fY2krjKcv1RIoQsYtYoslV
                  MuvWnYAJSimpirOLjbpXLwiCTMns86+L5V+siszfdHhuSLn5kih75FA1YtJE9fnf5wqT3RhustKc
                  VdPBwyK58b3l0QEr1XTvJ9Bi9nq0G2vnCtcdiDaufUYQvRUBNqY78RgR+r41WpyegebUI6gM49AW
                  +svQ+nwcbVk/gvJW+1XAfWgbQeLG++13Dt0zfu9O45PTKkVeVY3I8l0qL7c13f/T66w3Cbh1+NO4
                  xv5PgVK4qXQ3C7DJ1qsHaYxqZtRC9+YHrAXLV/e5IJfHzeWLpY94DGfJCjo+/UKsRRMUg2g9Q/m1
                  NuJ6PWCMu8YmpJJpUtVukNpzVjSaWjoqi+ChIgwmBtZkizUAUwhyv0thMVrntdCc8HHg65SPn90E
                  bfy6iyCl0eSAA9wDvIzmsn0JiMsBwKH+byv9a59Hp6XG0AkroBNdTvP73w34EzrY5nj/97lot1pf
                  v3+Taz4NbYVfA+S+fW5sxpx78q2D+2YnyDqTITzP47OVsdf3Pz1yD8WuMKNvp9Hcu2Y9WdX4tw0J
                  lSx1PVnwTCaOLHMfAmFX9gwo1VZbqK5fUMIk/rhAbtESVl97t1hbYXrCRTXMOhQSS3r5ro29mFZj
                  DReAcGxlV+vbj7ytO3ekEgcPB7SYIP082sW1c5XnPQUsIki4fw3tBvtGhev3839f6L9sWP6Zh071
                  NMkoGbQhbjRaxB5CQOmXoRHWECOBJjD9gBPQXFwA2/vXP4s25Bl93kPr7Bejffv7Ac8Aizu66Pzl
                  nxJ/+NUZ+cuijten1own5bokM86SUy5LXEtg6Sw1rqV7m8j/XyhAuBqKkYTCaaHlwFigM9Qe5lwO
                  BNpQ2xsopIWOGqoaB7S4IyureXir1rF64WLWUaenpNsk+Nw7HPsa8a8biDaOVUqj+wjtu7b9iTNI
                  9iBa9C0Ho9HIZMQVp+T5/dHGuEZ/HJv5/1d+H/3869JosX0omoML4Gtojg+aG4OWBkAb89ahEc/E
                  s38KfOD/3ic0psytD8oP7n666XoF1JKzrDwPV4nMbY813vjSHLGcALnDInn6/yO9+18JYeJpIhNr
                  Nc71Rn82YJC7N62RIFPMOfd49+tD+ubGl5MQFeAqmfnbm3bbvU+KjwhqBRjC5tXrBy/VvQ1H3Iny
                  6aAGHkGLvPiTbdxRHwPv0j2QxcDeaLH+HxSX7TkNneIZQxvZMmgEb0Bz8g/QIjdosX2yf20ajbRD
                  0IUf1qA5tqk1ht9PhCBrK4EmECa/dynahlCILDvrCuuFjYc3DtttYudxPWZCScljLzfcfMHv5Gt0
                  D0M1yP1/Tu/+KsAv/WXm0nDlWjm4KdtUW19KR9MSIPeX0Y4E4Fx0cn6bw/dKnlKxMKBSdKadpXfM
                  kp+gETscGBWOxiwLRQjuc+8w5zbIbQo3VJqMt9Gx4YJCPTQi/udGaMNZJRiM9qnP9wdrqFHYxz68
                  pK9bCMrwgJYuBpZ5dg4dDdeG5t7G55n2+zEx9aa2mxGXjdQCITFo6UpWCb+cR0W3mFLk8yT/+pq1
                  gGLd0ITYmki8/8IGAtVGTrQWgj4KgTbVbvE/69KdhUDuso07sL1TNCNg1VqddtxTjEIYPA+VzuBt
                  NJTYqYd7O+8+sfNIx/IaRJVQ3g8/d+asXldwrxoiZlpdoarhYg7mu0Trrl+v8pyn0XqwR1BPylDH
                  fek5nHUKOupsPYFF8zrgfTTHbkGLMyvQuvlq///m2of9MZiabYOAY/z7UoRKLPnXD0SLZwk0Ueqk
                  uAiAMYAUsqJ+fII7cepeydPNSlfbBbatEhcc33Xq039vvHjxcmEsw26oeaIV9V/9e4OCcYOGa69B
                  eSNbtUCssiCkpDmeH3rjhcnLbVs5OVdmMxk6KkSZVgTPQynwmhLeIEe6TboYSGXk9pRMzXjKeZGA
                  QRh3Yh5toK36HgUELynmYIJaBFrU3ZfKFPE1dFCL0Ys9AsTZhsoGtjAMRrvN7g5N/Pvo+HGDdB6B
                  c98slFnExWhLeqM/jrQ/7qnoIg9z0Uj8KtpAN5Wg5lUebSPY2h9vxn9Wu//O0W/sqIadObXrNCm8
                  eCVKW7QZhGBwS3b8A1dnTtnhyNhv/LkMI3i4/M6XMfL8FygUvAynURoELydChxG8LhFbSpx4JN8f
                  wJEuCacQTNW7cfdgsPU8j9cXND5080z5PsWloPPUwL2hmIOH/d1GRAetO0+ocL8HPIDWvaP+IIzY
                  24RG2j7UBnuhEdqU4O2HRtgcgXXdvJiJRDPIYVxp5oUb0Bz9QHQBx53RNoKHgE39dzq2zBhctFFw
                  nj9uC4hc/cPUSc2J3Cgpa8/3EFKy+YiuvW+71G47/iL7cYqliHA1zVQtz1M9WHv9csYbPKPMj6Cr
                  W9fsZRZa3RBiTKZCr5E+K2FPGMGLEaSG0fa6blyd4LkuazucD8/+VfRRihORDILna2EOtj9JJojd
                  6N0xfwJM6eNK8AY6KMQhiEAyPvJWNFesFYaijWa3o91jHxMQDVO1xXBxU1r5cXTu90doqaGdwKL+
                  BXAVur7bGjSxWI3OKX/PH5/xgfYlOKhhHoHf33vkd5mpGw9J71wL5w6DqcO236Su7x66V1Pbg8/K
                  heaZBBss73PxUmt6t6qoti1spVRFedAvzLqhQble9WdLXYQknKSiAFxdO6PamKRt9aomYCmEi0uE
                  kbwWEb2o9p2nqofl/rPAc13yym6/8o6G6xZ8wmqKD3Aw3piaPDB2SUiqaSYQf2+05bocpNEcsYsg
                  VM6cwNGERtaWOt/N+J/vQ3NQo3cYv7Hyn230kHlo8dtsFEMETMjjU/7fzWKbsNc/h+4xp1uYohYm
                  JNc95TvuFntu03VMtfzuagY3ISUJJ9//yjOTZ73yduMlS1cWwjLDOnmpPh4OPyyEI/ZpLF8YQ7NJ
                  oRYukasplhDMp1VreZ/w0M3n8EEq4TgVXaOkc6LTTzYxwxEAm47yGmOO11xJpPAU2fZOwlloYURU
                  dYw5bC8xSG6Kk1QT0c18F7i4ZQkhhfrnsOgygwKN3OmstfaGBxuvmn6v9R7FUY9m32drraxqnO1G
                  9zYlkUH7kfetcu+LaP3bQiOTqYNtarRVcosZyhmjuxiVQLvGPiGIP88TGFAM9TLWcGMtNVwx5U+C
                  ITjmnaKh5xhqaKQWg3Dh1FNv0kQ14JRvJ48WAktUiTPP5UWnZRGxZPnyP8KyGNI3M2Hmb5xjdz4m
                  egMhxA63kD5eNoghkyUplOomgwshUCjRp1GZ8tWmmferB7m7SQ7RqJARW0Uryf/5HJnOZLfNJhrj
                  yrKksivdpzyRW7lWJCu8bz3WbfOuhcCRs450Jx5zQG6fTI5M3i32WDTGVFPbQnvBMT9xZlFc30Bs
                  PEI1OJbXKOuxmm0gMOXCVrZH37381tj0Wx603qfYvWqi7uqquBuucW70b7Mx9qZy+eL1aKu3KcKQ
                  QVuhQevOU0L/LwXjUjuO8gu5HVo//oP/Ig0UF4PPow1mxt9pkLJQWSV0PWjD2UFow5lJUkkSEAGT
                  gFLgPvEY9qWnpacOaM71q1gRVSlyruy48o7ELw6YnJs8cdPMgZUIgZSSrTZOHnDzJdYHJ15iP00J
                  chMkXJi83m6bvjOpOqkylonj3E3Aepnienm92anhgpiydYw70LFUQ9l3UwqlhOvr24W/AmrBQqsj
                  nbXWN8byw0pvE4BteY2bbcwgAmnFcOHeRIYZQmYB1pSdcluPG945pVwSkPI8GuPxftGI82wmW9i7
                  ADTEcaRUsuphdb08nKEcCKVQ/vg60/ay2XMTD55wkf1UMq1TSQm4d1H+Qj2G2XABxbBhbSyVOTBo
                  RHmHgKsa8VahEbSaS+0pdEbYZCoXW5yK1okfIEByg7xGFzFIbdI+jVgWrnc9EV3RZXM04XkL7WqL
                  EVglTRaS2WjyjkszB44fnZoYiVRGKOV5/G1u071X3GrPffNde9mfLnEntCSyo0W5nHAhQHny4F26
                  vv/igU2f3DFLfkAxYheOQqK7iK0Ab9U6a1WlTSeA8RtnJm+zhfPYnHfFUgJiVUS4agBTSKNwPtw+
                  O2V3R3lWOVeOUorOjLUumS4q1mABrFxLLu+JbNmiiEKgXJfxY93NwH6+ZN3Me9c75oIFfcwIb1Ph
                  lyIu13cy56zPZAvirqk3QDaH53nCq2Rty7kilUxbKwFsSyUitopTU9nHorEKAVKB25W2Vq9eJz97
                  ++PIW7+7y3p9zrtiJcUHX4SR3OQt1OVaNRw8bGCLUp17r0WHpBqjWo6gwsQAtB5dSSx8D8298+j8
                  7wkVro0AJ6P92TPQVnqT7G5E7PC8Gt3ZIEgMTUBODr3HVmii9TgakQ2REP53Acjrf5Lfbc9tuw6M
                  OqKSexKlFJ+tjL9y8Nn2A0D22VfFkj8/lbj99G/nL65kCBNSEnPyLRefmDz10dmNP13XUQh+KToK
                  CW3TCAfIuID3wlv2+9/cUaRsqeKlXElISZ9EbuT0n2SPnvTd6HTXK6g0BlnqgYJN5o7L8/uO2yiz
                  p1CVM+k+XWp9Ehqv2XzZTJbs6vVy2eAWsVW5u4WUTBiT2ueso5wXfv9n+Q4Boe6NkcsQ/9g1P87t
                  utHAzPYVjehK8dkyuYjiAKQeKxsppVix1nn/W+c0XJHL424ySjUNHUjcdWs3cOZdVDyK5djI9i5y
                  z78uVixdWYimNC4wQ3jSJS3Vm+hHQ/nCh/5NoHoZ5CfRkWHmsD8j0oNGoIkV7vOA+9EZYDG073xr
                  NEEoB1F0Ztfm6Eqq89AxxIrio3QNtzOJI6PQKsL+dI+8Owgd4rocre+Hj3FVxxykRkzdo/OYiIMQ
                  FU6/U55He9JZdMpl8RtCC+H8+Grrlc1Hxe7YY5vkMaJCZRcpJYNbMhNmXOl8+5unRe+iu5huNpxb
                  0rLX3yM/OOcI+6MhfbMTKuWmt47s2nfefbn+V9we/9OdsyxzYGK9ICxJ5OFrMoftvlXyCDxFOdXA
                  tz8kH5ltv10yVsz3+R8777SOYko5Q6QQgojlJS48rvPclqaGa39+o/UWgWpR95gB+7fn5icfPaXr
                  dJQq685SnkfeE+nX5tvvlRlzdfC0O2HRElLJNO0ffSZW92Kc4fEa6cxIEWbdw8a0gg7e29Bmw8Eb
                  CCqn7k2QxFEKy9Ac0OiKxnIu0KmWU6r09QY6c8z2B59Bu8TGon3TlWArdF73PLRL7mO0u8twujja
                  zTUEfXjCDpQPW8V/zhR0znoXQWisGjmEyM9O6jwz5uRbpLDKCl5KKbI5Oq+4LXbNi3PEMgIDiAtY
                  B/0gfs87M72xowamJlUs3yQlk8d3Hn39hfKL0y93/kp3Ud0YC410VKj++co70dmHTM5MKDc2gz6j
                  BmW2v/bc/PgLT4i8u3KtWJLLqYwQtRnaPA83FiE+Zri7ZXM8O1LrsLL8XLgunyxNvHLXLLGQYJMa
                  gukC+en3WnP238le0hTLDSuHcEIIGiPZYecc7l500K6xV+d/KOd/+Lm9JJWV+YitehyzQqhkmvzG
                  Q/P9d982P2ns8PTOlvCiotKYPY+1HdFPLr9ZzCdI2ii+sEqtdUsqy5JK+LPdQf02jrDqYRDcrLNB
                  coMbxibT66ODIdC3TB72luhKK5XgCTQHtNGGrvBhCLtTOSDGiOQdFFvRF6FjxX+KFscrQQwdLrs9
                  OgtsFVpVMIcnDEQTpVrqXO+M1sW/IEBw98+XJb83sDG9magQzGL07ufe6nP3tTOcNorFJ+N3lRfd
                  mLj1pgvy4+Lk+pfj5IZ0f+cbqeNfftv+9O7HxAd0F9VN+mP4nOv8L25yXtp1K2dKv8bsptK2u29E
                  P27SVl5iRL/k10cO6J3HR3keVAnq0WVEZe6B52JPE6hM4bOtXSD3j3dZ1fZp5KUdN8tNrfQsYVk4
                  UiXGDe/ac7MRcg8XmfF90TUhj1IoW6ooeJY+M6yy3UQIwey58acIgkXqyuZTxapKbwo9lEIhh51i
                  Im9sGrkvG+losqpMdsx+BCmVpbAY7aM2riuTrAE6h3ofKi/KS2iXGgQGhLx//5voU0qW1zjmFjTX
                  3w5diXU8OtS11iL2bf7YzVG2zjU/yu8zfuPUPlgVTgD1kfvjZYkXDvthoQJoUV63WZSHnhWf3fVE
                  fLqnRL4SJ9D+8dyg84/pMnXbi04kJQg0KkQtAbn3P2XNIy82zDRGqkpgjsAp+O/rbCIUuVJ2LpRi
                  weeJZy6/Rb4dGmOO7sie+8XN0ceSWWd5LeMVAmEJL2ZLL2FLL15LcywvIYWypH/oYOVhK5ati847
                  /iL7GUL+5Br3TCXwqL8WW7hYpPmeLPm9S7WR2RBhzMYYA7pG2aQq1z6KLq9kEdQxM5bLXagsZqeB
                  WWjOa7i3CUQxUsCraC6+4Mu+UBXIoQNzHi/UFAHr6P29cQft3HGEZVXOGlCex+oO54MDzopfQ7CB
                  S1NAC77Kc66KvPTKu433VTttQwjBmKGZyU9PT3+X4iCjMKIbLlPwf551hfXCawsa7qv12J4NDZ7n
                  sao9+u60H0dvoziE0iBN2FCUnf2GWHrrrPiNrkeuRxdTrad6lrSeTiZVnkc6I9f95q74H0NjqymW
                  u5Ypof4qsGWLS6o2ulRbfW6wnsAgdz80964UsfQ+gQ/ZJJTECU43qWaUexHNpY21OotGBEO5zEHs
                  c9FHD5n65RsSlgJ/BJ6RMhPDSysgu/kYmn8wrfPYRNRLyCpGtbRrt19zX9NNi5cXTgAtrc7S7fPw
                  H0fv/2xV/I2KnMvflDtt0TXtynPcHemO3MYzEe4nDWT3Ojl261sfNzxiqoT+s0B5Hms6Ix+cdkXi
                  qoVfiHUExKcUaYqI4PnXOK88+WafW4yh6p8JSik8j9w9f22+Yfp91gKKg0U2VDZfbzh5h2qjQ7WR
                  3FDcuhwY98LuaONUJXgY7aoyG84EFTSgiy1USgft8O81J1aEK2eaOtjmuwV8jtbJf4bWk+stgl8K
                  K9AE4/fAXCG8BuWlJTK+AnBvuDB/+NB+2eGxuCzPBPzN+NTrjXdcfYecT/dDCsq1LJBd10HHedck
                  pnelrWUVSy9LCQL53SmdJ+wwwRtM+XPGS88u6wKyu5wQn/7CvMa7UHjVDk3cEOD554YtXRObc9iP
                  Gn/2xMvW5wQBGGEJplLdufTh5zmPPPJKn+s8T7nmDLKvFPwzy/J5lbn1iZYrz7rCeoHuxHmDIZVq
                  05VV6mlf7QRokOhig3tTWYedhy5wGDbhG248hur10f+KjlyLEGyAMBdPljRBUHvtUvTJoc8QlFyq
                  BXJoQ+A96IMI70fr9zbK8xRNawF1y8/Zd9yw9dsnEgJLdq+djVJ4nse8hfG/HHW+baL2ioolUsxd
                  w+JqCsg89oJYfMdTjTcphFvt1NLmRH7kTf+bOpmgBl447dGme7hiF5DZ74zoXZff0XLBivXOe0Dh
                  ED61AThl+KC8nGd1vNjWfOf4qQ2XvNEml9M9uipD9/kIE8MkkD7qfOcvv/5z00WdmejnhfF+BYhu
                  CGp7Orrokluaf/KDK60XCfZb2G5S96M3+GC/YjB1xz5HG69MpRMT7JBCn+xpEMwkfJgY8CS6YGKW
                  wKIo0Jt0ETr1Eop1yTR+sLwfuRVOnTTx4xG0v/wpdGDMKHRs/Gi/mVROCIpMrERnlX3kj2kdxaJu
                  XmErIH/pmWqXA3ZYPzXqKBxLlEUG1/NY3RF774jzE38iQNxum9cvGWR+NwkixrYhz/ut8/dtt2h4
                  cLux7d+pmLSiFBsP6trl73fIMycdE/89QdptJNRX+EYzYPfyW+Sc2x5u+uj87+W/vse22d2G9HfH
                  NsRUf+W5Fm4dApAZVyFQR+bWdNqL2hZGXr3h/sjzs2aLxRQT524loH2ulBWtweEHJb14P78p8saN
                  MyPvXXtBZp9dtsrt2yeeHeW5LtVqy9cKSimkEHRkootfnOs8fupl0SdWryuENZcrV11UHdiSIFCy
                  LHFUCimUXc3++O8INpob3E4Qh24QXKFdUesIDh0wSRpRtNW9A7iSwI8evnclQaZZmHsXqlCoNjKi
                  tSgsM0+gi5ognE60fj7P/785vsgEseT8a1J+f+YExkjodxkan7OuQyx7fm7DH1aslass2T17yLaQ
                  0SiRR56z2hYtZT3FxCkcfJDz38PUBQvHVZtPa9qPovfceVmfbN9mNSDvdg9Y8DyIR1Xc80R+3Gj6
                  vP9pkRoULikFxf5TF/CWrhL5s690/grOC/tO9oZuu3l+8OD+9BkxRAywLWX3dDKpUni2hRNxcNJZ
                  sqtWs3rBQpb9+fHIJ0tX0UGxf9YEYJQid0GfVW2ky5y2UXABrlhD/vDzog+MGx15/viDY1vsuKU3
                  YWCf/JCY4zbHojRRnOtfacza6i5VxPPIpzJy3erOyOf/aGP+Fbc6byxaKtrpnmIZHnMYiwWA4yCl
                  UJYqE5ijY0z/NZlmXwYEW6hdCZAwQRAVlsc/5YNAb06hEbAF7X82/nCTg2vuNVldhjB0EVS87CzV
                  P/zUwATFmW3hxH3jq4cgdtjEpxukhuDssVzo/6Z8lMl2M88xZ6NVnpvgWebdjd2gS7V1L9QgWgsi
                  doP/PqZ6pnmfan0KSxKJRhDJNO2Ud60Y8b3U4h4+ddK4PQ2x6Q0YomvCT8OGs1JVpGLpZ9FaZEsI
                  uwDDhT0LRGz4IJUYNlDFAHo6ecTzUI6NiEWVlc4Id/FykV66SpjgpXCQUFFEGAGSm8QWU+W0aexI
                  Bpw61d0yFlFOJifyJjbH86AhpqKLlopVl99izSFQKQvWcNVWlPr6LwfRqj//H288lURhcc09AAAA
                  JXRFWHRkYXRlOmNyZWF0ZQAyMDI0LTAyLTIyVDE3OjE2OjM4KzAxOjAwXiUg7wAAACV0RVh0ZGF0
                  ZTptb2RpZnkAMjAyNC0wMi0yMlQxNzoxNjozOCswMTowMC94mFMAAAAZdEVYdFNvZnR3YXJlAEFk
                  b2JlIEltYWdlUmVhZHlxyWU8AAAAAElFTkSuQmCC' />
                  </svg>
            </a>
            <div class='sidebar-toggle' data-toggle='sidebar' data-active='true'>
                    <i class='icon'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M4.25 12.2744L19.25 12.2744' stroke='currentColor' stroke-width='1.5'></path>
                            <path d='M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976' stroke='currentColor' stroke-width='1.5'></path>
                        </svg>
                    </i>
            </div>
        </div>
        <div class='sidebar-body p-0 data-scrollbar'>
            <div class='collapse navbar-collapse pe-3' id='sidebar'>
                    <ul class='navbar-nav iq-main-menu'>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/dashboard/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".DASHBOARD."</span>
                            </a>
                        </li>
					<li><hr class='hr-horizontal'></li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/rules/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
									<path fill-rule='evenodd' clip-rule='evenodd' d='M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M14.2882 15.3584H8.88818' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M12.2432 11.606H8.88721' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
								</svg>
                                    </i>
                                    <span class='item-name'>".RULES."</span>
                            </a>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/sponsor/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						            <path d='M14.3889 20.8572C13.0247 22.3719 10.8967 22.3899 9.51953 20.8572' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".SPONSOR_HEADER."</span>
                            </a>
                        </li>
					<li><hr class='hr-horizontal'></li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/blog/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
						            <path d='M14.3889 20.8572C13.0247 22.3719 10.8967 22.3899 9.51953 20.8572' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".BLOG_HEADER."</span>
                            </a>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='ts3server://".$_SESSION['xucp_free']['site_settings_teamspeak']."'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M12.0004 22.0001V18.8391' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path fill-rule='evenodd' clip-rule='evenodd' d='M12.0003 14.8481V14.8481C9.75618 14.8481 7.93848 13.0218 7.93848 10.7682V6.08095C7.93848 3.82732 9.75618 2 12.0003 2C14.2433 2 16.0611 3.82732 16.0611 6.08095V10.7682C16.0611 13.0218 14.2433 14.8481 12.0003 14.8481Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M20 10.8005C20 15.2394 16.418 18.8382 12 18.8382C7.58093 18.8382 4 15.2394 4 10.8005' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M14.0693 6.75579H16.0589' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M13.0703 10.0934H16.0604' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".TEAMSPEAK."</span>
                            </a>
                        </li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/teamlist/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
									<path d='M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                            <path d='M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                            <path d='M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                            <path d='M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
								</svg>
                                    </i>
                                    <span class='item-name'>".TLIST_HEADER."</span>
                            </a>
                        </li>
                        <li><hr class='hr-horizontal'></li>
                        <li class='nav-item'>
                            <a class='nav-link' data-bs-toggle='collapse' href='#sidebar-auth' role='button' aria-expanded='false' aria-controls='sidebar-user'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9849 15.3462C8.11731 15.3462 4.81445 15.931 4.81445 18.2729C4.81445 20.6148 8.09636 21.2205 11.9849 21.2205C15.8525 21.2205 19.1545 20.6348 19.1545 18.2938C19.1545 15.9529 15.8735 15.3462 11.9849 15.3462Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path fill-rule='evenodd' clip-rule='evenodd' d='M11.9849 12.0059C14.523 12.0059 16.5801 9.94779 16.5801 7.40969C16.5801 4.8716 14.523 2.81445 11.9849 2.81445C9.44679 2.81445 7.3887 4.8716 7.3887 7.40969C7.38013 9.93922 9.42394 11.9973 11.9525 12.0059H11.9849Z' stroke='currentColor' stroke-width='1.42857' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".USER_ACCOUNT."</span>
                                    <i class='right-icon'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7' />
                                        </svg>
                                    </i>
                            </a>
                            <ul class='sub-nav collapse' id='sidebar-auth' data-bs-parent='#sidebar'>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/profile/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> L </i>
                                            <span class='item-name'>".USER_PROFILE_CHANGE."</span>
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/chars/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> R </i>
                                            <span class='item-name'>".MY_CHARACTERS."</span>
                                        </a>
                                    </li>
                            </ul>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' data-bs-toggle='collapse' href='#sidebar-support' role='button' aria-expanded='false' aria-controls='sidebar-support'>
                                    <i class='icon'>
                                         <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".USER_SUPPORT."</span>
                                    <i class='right-icon'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='18' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7' />
                                        </svg>
                                    </i>
                            </a>
                            <ul class='sub-nav collapse' id='sidebar-support' data-bs-parent='#sidebar'>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/client/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> L </i>
                                            <span class='item-name'>".GSERVER_INFO_HEAD."</span>
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/keyboard/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> R </i>
                                            <span class='item-name'>".KEY_HEADER_2."</span>
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/uptime/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> C </i>
                                            <span class='item-name'>".UPTIME_SYSTEM_HEADER."</span>
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/support/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> C </i>
                                            <span class='item-name'>".USER_TICKET_CREATE."</span>
                                        </a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='/vendor/backend/user/usertools/index'>
                                            <i class='icon'>
                                                <svg width='10' viewBox='0 0 12 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <rect x='0.5' y='1' width='11' height='11' stroke='currentcolor'/>
                                                </svg>
                                            </i>
                                            <i class='sidenav-mini-icon'> L </i>
                                            <span class='item-name'>".USER_TOOLS."</span>
                                        </a>
                                    </li>                                                                        
                            </ul>
                        </li>";
        if(intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_SUPPORTER) {
            echo "
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/staff/team_control/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<circle cx='12.1747' cy='11.8891' r='2.63616' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></circle>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".TEAM_CONTROL_HEADER."</span>
                            </a>
                        </li>";
        }
        echo "
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/backend/user/imprint/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
									<path fill-rule='evenodd' clip-rule='evenodd' d='M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.635 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M11.9946 16V12' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
									<path d='M11.9896 8.2041H11.9996' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path>
								</svg>
                                    </i>
                                    <span class='item-name'>".IMPRINT_HEADER."</span>
                            </a>
                        </li>
                    </ul>
			</div>
            <div id='sidebar-footer' class='position-relative sidebar-footer'>
            </div>
        </div>
    </aside>
    <main class='main-content'>
      <div class='position-relative'>
        <nav class='nav navbar navbar-expand-lg navbar-light iq-navbar border-bottom'>
          <div class='container-fluid navbar-inner'>
            <a href='".$_SERVER['PHP_SELF']."' class='navbar-brand'>
            </a>
            <div class='sidebar-toggle' data-toggle='sidebar' data-active='true'>
                    <i class='icon'>
                     <svg width='20px' height='20px' viewBox='0 0 24 24'>
                        <path fill='currentColor' d='M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z' />
                    </svg>
                    </i>
            </div>
                  <h4 class='title'>
                    ".$SITE_SUB_TITLE."
                  </h4>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'>
                      <span class='navbar-toggler-bar bar1 mt-2'></span>
                      <span class='navbar-toggler-bar bar2'></span>
                      <span class='navbar-toggler-bar bar3'></span>
                    </span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                  <ul class='navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='#' data-bs-toggle='modal' data-bs-target='#logoutModal'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".SITE_LOGOUT."</h6>
                        </div>
                      </a>
                    </li>
                  </ul>
            </div>
          </div>
        </nav>        <!--Nav End-->
      </div>";
    }
    
    public function xucp_header_install(string $SITE_SUB_TITLE = ""): void {
        header("Content-Type: text/html; charset=utf-8");
        header("X-XSS-Protection: 1; mode=block");
        header("X-Content-Type-Options: nosniff");
        header("Strict-Transport-Security: max-age=31536000");
        header("Referrer-Policy: origin-when-cross-origin");
        header("Expect-CT: max-age=7776000, enforce");
        header("Feature-Policy: vibrate 'self'; user-media *; sync-xhr 'self'");        
        echo "
<!-- ####################################################### -->
<!-- #   Powered by xUCP Free V5.1                         # -->
<!-- #   Copyright (c) 2024 DerStr1k3r.                    # -->
<!-- #   All rights reserved.                              # -->
<!-- ####################################################### -->
<!doctype html>
<html lang='de'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>".$_SESSION['xucp_free']['site_settings_site_name']." | ".$SITE_SUB_TITLE."</title>
    <link rel='shortcut icon' href='/public/images/logo.png' />
    <link rel='stylesheet' href='/public/css/libs.min.css'>
    <link rel='stylesheet' href='/public/css/xucp-pro-v5.css?v=5.0.0'>
  </head>
  <body class=''>
    <div id='loading'>
      <div class='loader simple-loader'>
          <div class='loader-body'></div>
      </div>
    </div>
    <main class='main-content'>
      <div class='position-relative'>
        <nav class='nav navbar navbar-expand-lg navbar-light iq-navbar border-bottom'>
          <div class='container-fluid navbar-inner'>
            <a href='".$_SERVER['PHP_SELF']."' class='navbar-brand'>
            </a>
            <div class='sidebar-toggle' data-toggle='sidebar' data-active='true'>
                    <i class='icon'>
                     <svg width='20px' height='20px' viewBox='0 0 24 24'>
                        <path fill='currentColor' d='M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z' />
                    </svg>
                    </i>
            </div>
                  <h4 class='title'>
                    <svg class='logo-title m-0 float-start' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='240px' height='42px' viewBox='0 0 248 42' enable-background='new 0 0 240 42' xml:space='preserve'>  <image id='image0' width='240' height='42' x='0' y='0'
                      href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPgAAAAqCAYAAACeJ5YvAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                  AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAq
                  tElEQVR42u2dd9wcRf343zO7e+0pedIrSYiBAE8CAaSFUAUiVUAMoUhTepOvoIBfBEUQFEWkBAFB
                  ihAg1EhHiBSphpDwEHoIhPT6lOu78/tjdm737rm75+4hWH5fP3nN6y7P7e7MzsynlxFKKXoDohUB
                  JIAmoMFvUaAfMBlYA7wO5IEOoMtvnaqNdOg5FhD3WxSwgZj/GQUE4PmfFuD4zfb/lveb+XvcH1Mc
                  VBRwQazzr8kCSf95KtREhddU/j1pIOWPP+1/JlUbXpk5afDnxbSY3yK1TKvfZ87Mlf8uCf/dZJV7
                  Pf++ZGi+O1QbnXWsaTTUnxl7g993NTD9Zszc+H2nRSuOv44x/zmR0FpF/TWVoVYvmDUEcP15yKLX
                  O+c3s4YZIKPa8EQr0n/HhtB7mvHU03dvwPXv9fzm+i0b+kz7n9nSfVYLiFb9afdygKAXyGzeuD9B
                  ABOBnwDLgB8AX/i/mRfKiVY9aNFKxL83QYDk5rm2/7IW0BfYCBgBDEMTkQb0hkgD69EEZSWwCo2M
                  CoQhDI2gIkAGxJqBfb2mI/cXI3J5N5lOk7Fk943Vp0lF3/7AWvnMK3IJAZExhMFFb6B0yW1mI4db
                  AogmYjQM7KucbE6U3RSWpRg9TCU+Xy5Ti5aw2n9v22/O9uPVsElbuUNSGXJeaLltG2FLrJfmWsve
                  ek8sDd1jAZZoRdaxQSwCIloY+4jBqiUWQbZ3CdeSATGMOEpkc0ItXcX60DOyob4jof0RJUBq8900
                  g9yipwFWAIPkhshFCRA8HZoPG7BFK2m/v5h/rRlfgtoIcbjf3kDe/yxF8Iw/ZrOGWSAtWsmoNnK9
                  6ahXCO5Tv6g/Gaa5aMQ7GL1QQ4G9gNsIFjLi35cJcTuDFGEurvzvo4BtgB2A0UBzlTErNGKvBD4C
                  2oCFQLvuV7iCfExhx6UlEscd7B03rKn9a8Kx1zmW6obgjqUaOlLW8jN/3XjxzKfFQgLkNhJDTLTi
                  qTay/pyY9zDzYRA8euT+apOLT0ye1Bjz+uZckSk3+KjjNXakrOWH/rDhV6E/G4Szzzs2u8uUHVLH
                  e0q4KtggADJieY1Pv9l0yyE/sO8L3RNu9SC4DN0X6d9HNc/8deqkjQblx+VcmSaEhFIqpyttrfnh
                  b+M3PP6i+BS9QcP9GmnMrG+Yi0cAe+hAmo7e3x2zxRh3xNCB9JcSmXfxZA2oLiVWMi261qxTnV1p
                  kX5lnr3o7sfEIjSSGInNphjJLQLJzwqtVQKIfWNHNXxwP5XoSpGTFeQJS2JlciK/4BPRns7gOXZt
                  kodlgevCwi/oIiBKBrlz/liy/jyGCbUUrQiz1+qB3nLw8IIZkUsBOwLbha47CHgReA+NuDmKxbNG
                  AooeJxDDNwe+iRb1+9c4JqMyjPLbbsCCUP8uQkZR7qDlq6z26fdaD597hH1qYzTTEm2QWKVL5EGj
                  kxt22WnylBfeTFy2Yo3w8BGbgPJ6orVAxUu5dwSIWJLExScmTxrWktxaVNoxSqGAV9uan3jnI9b4
                  82SkDwGIWMRLSJWPStF953s5l0TUi4XmIXxRTVzRJ7jdrm9qUPaQfrmvNceyo0vHr5SipcEaPnRg
                  PF6mb0Ex4TbfI0Bkn0lq6HnHZr7ZOjq3U2M8P0wK5fRWXZRCoIRQR39Tdv3iZPnZq22R2Wf/KvLs
                  yrWik2LubQgYaDUiTNCc4YNVn+t+nDptSEtmQt6z0pX6E0IvWT5PUik8IWqWPIRSqExeduZdmVnb
                  rlYsXOp88tBz9tsznpSLCAiSjcYRQ1AFIEQr1IvkdSO4aMUm4MRm8QRajN6LYh1mMLAP8CGaAJj7
                  jCgUD33PA32A/YBvAyN7tdrF7zYBGAe8AjyvlFwuRL6P8vJ9brrffm/jEc0zD9919TGRqMSOdX+A
                  kJJh/dLb3v8refRu34/fRKDjeSXfBcEmDrfok9PTRw7rm9paSkvvjDKgPI833kvMPOScyEyKdUbp
                  zxvZnMgIKSs+I5MTRoTrFZaoNpTR28KQzgovl5cpISXdCJRSpLNW5/rOwqYL9x3m3AVbRP8+qum2
                  n2e+NXnLzKERmWv2Z1r/k71RwfU4UEo40m0c1JLf4qDJuS322CZ90F9ejt974s8jzxAgjekgrLcX
                  JrQhpuyGmDvAlm7CsVWix34dVSvzKTvmoX0FraMzfHN70hecEH/9DzPth264z3mXwMYUVl0UmqG4
                  qg231m56M6MGScOcOILmmNuVuX4vYDN/gOa+Ur1bohH6B8CZfHnkLh3vbsD3gc2VspMIywHsC67m
                  pXc+a3g1k/XwKgixUgi22TT1resudHejmEuHEToshRT+9utzspN22rxrmhCiPGIKgee6LF4dfWva
                  +bG7CYyAGf/7fzKEGUAMiO+yLUNfu73rkj0mdh4Xsd1mYVkIy6Ia4aoJhECYJiVCCJri+RFH7NXx
                  wzkzUuePG80AuksShqQXiFJXSuTzrkiL8POqNZ/o9aqF3tu2iH1tcNeuV5zeceXsP2ZOHtRPtVCM
                  I2FjbbSeqakLwX3ubRA6bBkeAexLeQPFEOAAf5BGdzdcPOFP8CbAT4H9+XKGv2owAjgO2BpEgeOc
                  97vovSvX24u8ShguBAJlTd2z83uHfMMbSTGSG10ySgmSn/htb9zxB6TOBCpyJpXPk8o7q/53esON
                  K9aIdgLETlKsZ/8nQti2EttxKwbPuKz90sEtqa2kZSG+DELXAAaRxg7t2v3J6zp+Nm40/eiuWv57
                  gBAIy0JKItuO7Tj077d1XXLwHu5oujOQKBDxjZc1Qb0c3CB22CJqATsBW1W5b0+0uGwQ3OgYEhgD
                  nA1sWcc4ssBatOW8i9qNSM1AK4EhI/f+QrHmN3c3/TGbF8lKOqCQkriTG3TlmV1nRyMFlSKM2OGF
                  iIwdScuFx3WdFrVzfavp3YC679nELb4RL4M2Ehr3yH8yhI2vkaED6XPnzzp+3BzPjpb2V0W/y4Nl
                  WQxoTG/20G+6zm1qKNh8IqHPfxsQQiAtiyEt6S2v/1HnRd/YwRtGyd4y3333co9QM4KHuLdBziga
                  sYYAe/dwe1+00SzsA3XRRrZj0a61nmAV8FfgeuBy4Jf+5+XAb4AZaGNaNWR3gTlo4pBGc8rUnbNk
                  20vzG2cqz6MSkkspGdo3M+Hx6zJHEWyQMEcoWNFv/1nymIHNmc2lVXkNlFK83NYw44xfOrPRyG38
                  tCn/8z8ZjJstCjj3XZk6dkhLekK1+QhNTP2tB5C2zcgBqe0evjp9FMWuun8rBDcgpKQ5kRt13fnp
                  MyhWhcP7rKfYBP3uNXWoLaxhV1eEwN2wO9qQ1RPsRoDIRo+QaOSvBh3AncB5wK+Ae9GI/nfgVeAF
                  4FFgOnARcAXwToVnveRf30kQDNIJpA45JzJj4YrYK6qaqC4lXx/XdfClZ7jbUezfLfhS77wsu/9W
                  Y5IHVjMYefk8n62MvXrYefF7CZDbNOML7dZ9LWv1bwKGkEcuPtXddsKY1JSekFt5Hp7ropSqq3lK
                  oVyXiusWmsCtxyb3P/dYd0uKA27qAqUUyvO+fOthrFJKRvRLbnfbpfkpFIvoxgBXkyhUq7xkUax3
                  GlfRGLTeXAs0oH3kbWjkstBc+RFgCwKjRxj+Adzo32PGYfzQ4TmS/rssAT5DI/J3AMNtQXPGh9GB
                  N8Zvb/RcG0gcdWHDjY//3tuoOZ4bYdvdEVQIgSW86IkHdpz++vzmpbP+Jhf5z5FA9OyjvPEHTur8
                  PpWMauiNnMxFVlxwfeKWji468aOVKEby0s6V6/WohnwlBMB1iyzOtULEn1Nn2t6ZQyypoogKdgil
                  wPNY1Rl7v+3T6GvLVomVjq2cngiaUihPCdWnUTUMbPEGjRma2bo5ntvIGNy6TY6UOLaXOOaAzCFX
                  3Z54x59z47qtbS48cms77E/znsxEbJWIOAUbUk3zoxQIFJEIjQ5uk+e6oiLh899jvx06p+2+fZ+3
                  Zr8uPqfYjWaLVpyeAmB6RHCfe4d1qhh6M9loF9hGtU4Q2k++DZoDW2jkeAkd0rprybVPAr9HR8TF
                  0JzNRCeFEdysZjiQZjVwC7AcOAkdgPM3NMHIoEVzl0DlsAF7/ocic9PDDfef/K32M+MxZduWwC6Z
                  fyEljXF36FX/kzpt1t8a/td/hhy/Cf3POaLjVEu4cSHLT6vmOHg3PdJw7SPPic/orncbRDcumoJP
                  2bHrCqHcYGBbotSvXjwfAqvM2Cwgcvo0d7MhfTObV4wDVgrPVbln5zTfdsLFkSfWdRQCQOoBAYjW
                  sZG+N1yYmbrNJslDhVJlCawARgzIjD9tWmzTG2bId/z5L6I8SlUgpEqRyVkdP7q28aqZT8ulEzbx
                  GocOIOapnhmyAU+hbAsZjShrm829wYftld9/9MDkpGpEKRFzh5w1LTd59uuR+ykOfokCru82q0j8
                  a+Hg5mFGZzFizThgjzoXI4q2qM8B1vmT2wU8gUZ+w21fAX4HrPD/loKC789QTPOyxkdowknTBDr+
                  X/zPXdGSgiEMXQR6TFjssS79g/X2RoMbH52yXcehsZikMVFm7aRkWN/0to/8PnrYt86y7wPE7T9P
                  ntS/OT9WWhWkPl9ffKmt6e6LrrPfIIhvDyN5OvQuRa25QfVV5TaCv5nXtIu1obkpbT2CT8jDQSoC
                  YKOhxOIxmqjgysrlReeSFSJZsl8sQO6+rTvOsVWjEGXu9UXs5+c133Xo/zgPEngQavbxhsZqtX0k
                  crudELvpuZtxt9ss+Z1yAUHCsnBwm/fZyZ1wwwy5IDRWABwbaVkiUkkCUwhvyQqZdD06574vO+a+
                  33up6dHZ1sJLpjtzHvqtOGyf7VPf0wMsM2YhmLhpdhJEHiKIvIsTRMGZcNyyUFUH9xc9LPsbBE+g
                  /duVuLcJvysHk4BdCII4JPAW8Jz/+8fApWhR2nB5m8Af2Iw2zpnPUtdHhADZAZ4GLkEb4MzzYkAL
                  OrGi2f/eglYjrDN+6TzbtqhhTmeyPGE0PtDdJ3Yeec7R+Qk3X5zba9yI9J7V9EzP81i2Ljr/wDMi
                  9+EnPdAdyY1xrdtKS1l9M3WlyBAgsyr5Xg8URcE1xJVtSVVRV83lSS1bVehbEYoOGzPCG+tPWLf7
                  lFKsao8uOPESZxYlSSpou0itrcO/rwvIHnVhbMaazsiHlXRyIQSjhrhjCEWwmd+aGpQddVRDufuU
                  UrieTC1eUSDCpu/etiSQPuR/Yve/9l5iZrUovpbG/Mhp+6qRBDEkhjkVEahy0JORLRzIYhAdYDza
                  uFYJHgVmV+nzIHSsOmhE7AQeA94GbkfHj49F+643AgaiQ1Yb/fsb/RcdiI5RHwYM968d5F87wH++
                  SQrpQm8kY0swaobR3x1QfYFENoe6+MboI6vb7bXVNootVfz845LnHbZH10nVAjWUUnSk7MVn/zpx
                  teuRJBDHi5A8pE91W+2exEDb6rbQG0Qn9zyhKoqtaBE9GinaR4Xoq6aE27/soH1pZv4n0VdXrCnY
                  IXIEyF0Popjrs0B26Uo63vog8mI1w1xLQ2741zZSTQRIUhMohZtOF+ZC1TnOcgieBLKX3hSZ1Zm2
                  l5Xba0IILKli+03ObzFpIsMpRmwbndRTca0riugh3TucVGKjudzeaPdYOfgCuAuNnLtXmMCt0Fz8
                  QQJD13zgQrTb7DT0xjeW+rX+Zw5NPJ7379kPLfKbDByJRpakP+7X0Ia1laGN56AJ1LZo7m2MWhaI
                  j/3Jl2+8w5pbH43PuOrs/ClKKSEqRKI1xNzBwv9eflMo8nmVumVW4/THXpSLKbaam42d6U0iwb8p
                  WOgkkkTEJlpuVhSAtNTCL1iKJvAmMcSkndYjpltoyS6D3qPeOx9ZC/fY2krjKcv1RIoQsYtYoslV
                  MuvWnYAJSimpirOLjbpXLwiCTMns86+L5V+siszfdHhuSLn5kih75FA1YtJE9fnf5wqT3RhustKc
                  VdPBwyK58b3l0QEr1XTvJ9Bi9nq0G2vnCtcdiDaufUYQvRUBNqY78RgR+r41WpyegebUI6gM49AW
                  +svQ+nwcbVk/gvJW+1XAfWgbQeLG++13Dt0zfu9O45PTKkVeVY3I8l0qL7c13f/T66w3Cbh1+NO4
                  xv5PgVK4qXQ3C7DJ1qsHaYxqZtRC9+YHrAXLV/e5IJfHzeWLpY94DGfJCjo+/UKsRRMUg2g9Q/m1
                  NuJ6PWCMu8YmpJJpUtVukNpzVjSaWjoqi+ChIgwmBtZkizUAUwhyv0thMVrntdCc8HHg65SPn90E
                  bfy6iyCl0eSAA9wDvIzmsn0JiMsBwKH+byv9a59Hp6XG0AkroBNdTvP73w34EzrY5nj/97lot1pf
                  v3+Taz4NbYVfA+S+fW5sxpx78q2D+2YnyDqTITzP47OVsdf3Pz1yD8WuMKNvp9Hcu2Y9WdX4tw0J
                  lSx1PVnwTCaOLHMfAmFX9gwo1VZbqK5fUMIk/rhAbtESVl97t1hbYXrCRTXMOhQSS3r5ro29mFZj
                  DReAcGxlV+vbj7ytO3ekEgcPB7SYIP082sW1c5XnPQUsIki4fw3tBvtGhev3839f6L9sWP6Zh071
                  NMkoGbQhbjRaxB5CQOmXoRHWECOBJjD9gBPQXFwA2/vXP4s25Bl93kPr7Bejffv7Ac8Aizu66Pzl
                  nxJ/+NUZ+cuijten1own5bokM86SUy5LXEtg6Sw1rqV7m8j/XyhAuBqKkYTCaaHlwFigM9Qe5lwO
                  BNpQ2xsopIWOGqoaB7S4IyureXir1rF64WLWUaenpNsk+Nw7HPsa8a8biDaOVUqj+wjtu7b9iTNI
                  9iBa9C0Ho9HIZMQVp+T5/dHGuEZ/HJv5/1d+H/3869JosX0omoML4Gtojg+aG4OWBkAb89ahEc/E
                  s38KfOD/3ic0psytD8oP7n666XoF1JKzrDwPV4nMbY813vjSHLGcALnDInn6/yO9+18JYeJpIhNr
                  Nc71Rn82YJC7N62RIFPMOfd49+tD+ubGl5MQFeAqmfnbm3bbvU+KjwhqBRjC5tXrBy/VvQ1H3Iny
                  6aAGHkGLvPiTbdxRHwPv0j2QxcDeaLH+HxSX7TkNneIZQxvZMmgEb0Bz8g/QIjdosX2yf20ajbRD
                  0IUf1qA5tqk1ht9PhCBrK4EmECa/dynahlCILDvrCuuFjYc3DtttYudxPWZCScljLzfcfMHv5Gt0
                  D0M1yP1/Tu/+KsAv/WXm0nDlWjm4KdtUW19KR9MSIPeX0Y4E4Fx0cn6bw/dKnlKxMKBSdKadpXfM
                  kp+gETscGBWOxiwLRQjuc+8w5zbIbQo3VJqMt9Gx4YJCPTQi/udGaMNZJRiM9qnP9wdrqFHYxz68
                  pK9bCMrwgJYuBpZ5dg4dDdeG5t7G55n2+zEx9aa2mxGXjdQCITFo6UpWCb+cR0W3mFLk8yT/+pq1
                  gGLd0ITYmki8/8IGAtVGTrQWgj4KgTbVbvE/69KdhUDuso07sL1TNCNg1VqddtxTjEIYPA+VzuBt
                  NJTYqYd7O+8+sfNIx/IaRJVQ3g8/d+asXldwrxoiZlpdoarhYg7mu0Trrl+v8pyn0XqwR1BPylDH
                  fek5nHUKOupsPYFF8zrgfTTHbkGLMyvQuvlq///m2of9MZiabYOAY/z7UoRKLPnXD0SLZwk0Ueqk
                  uAiAMYAUsqJ+fII7cepeydPNSlfbBbatEhcc33Xq039vvHjxcmEsw26oeaIV9V/9e4OCcYOGa69B
                  eSNbtUCssiCkpDmeH3rjhcnLbVs5OVdmMxk6KkSZVgTPQynwmhLeIEe6TboYSGXk9pRMzXjKeZGA
                  QRh3Yh5toK36HgUELynmYIJaBFrU3ZfKFPE1dFCL0Ys9AsTZhsoGtjAMRrvN7g5N/Pvo+HGDdB6B
                  c98slFnExWhLeqM/jrQ/7qnoIg9z0Uj8KtpAN5Wg5lUebSPY2h9vxn9Wu//O0W/sqIadObXrNCm8
                  eCVKW7QZhGBwS3b8A1dnTtnhyNhv/LkMI3i4/M6XMfL8FygUvAynURoELydChxG8LhFbSpx4JN8f
                  wJEuCacQTNW7cfdgsPU8j9cXND5080z5PsWloPPUwL2hmIOH/d1GRAetO0+ocL8HPIDWvaP+IIzY
                  24RG2j7UBnuhEdqU4O2HRtgcgXXdvJiJRDPIYVxp5oUb0Bz9QHQBx53RNoKHgE39dzq2zBhctFFw
                  nj9uC4hc/cPUSc2J3Cgpa8/3EFKy+YiuvW+71G47/iL7cYqliHA1zVQtz1M9WHv9csYbPKPMj6Cr
                  W9fsZRZa3RBiTKZCr5E+K2FPGMGLEaSG0fa6blyd4LkuazucD8/+VfRRihORDILna2EOtj9JJojd
                  6N0xfwJM6eNK8AY6KMQhiEAyPvJWNFesFYaijWa3o91jHxMQDVO1xXBxU1r5cXTu90doqaGdwKL+
                  BXAVur7bGjSxWI3OKX/PH5/xgfYlOKhhHoHf33vkd5mpGw9J71wL5w6DqcO236Su7x66V1Pbg8/K
                  heaZBBss73PxUmt6t6qoti1spVRFedAvzLqhQble9WdLXYQknKSiAFxdO6PamKRt9aomYCmEi0uE
                  kbwWEb2o9p2nqofl/rPAc13yym6/8o6G6xZ8wmqKD3Aw3piaPDB2SUiqaSYQf2+05bocpNEcsYsg
                  VM6cwNGERtaWOt/N+J/vQ3NQo3cYv7Hyn230kHlo8dtsFEMETMjjU/7fzWKbsNc/h+4xp1uYohYm
                  JNc95TvuFntu03VMtfzuagY3ISUJJ9//yjOTZ73yduMlS1cWwjLDOnmpPh4OPyyEI/ZpLF8YQ7NJ
                  oRYukasplhDMp1VreZ/w0M3n8EEq4TgVXaOkc6LTTzYxwxEAm47yGmOO11xJpPAU2fZOwlloYURU
                  dYw5bC8xSG6Kk1QT0c18F7i4ZQkhhfrnsOgygwKN3OmstfaGBxuvmn6v9R7FUY9m32drraxqnO1G
                  9zYlkUH7kfetcu+LaP3bQiOTqYNtarRVcosZyhmjuxiVQLvGPiGIP88TGFAM9TLWcGMtNVwx5U+C
                  ITjmnaKh5xhqaKQWg3Dh1FNv0kQ14JRvJ48WAktUiTPP5UWnZRGxZPnyP8KyGNI3M2Hmb5xjdz4m
                  egMhxA63kD5eNoghkyUplOomgwshUCjRp1GZ8tWmmferB7m7SQ7RqJARW0Uryf/5HJnOZLfNJhrj
                  yrKksivdpzyRW7lWJCu8bz3WbfOuhcCRs450Jx5zQG6fTI5M3i32WDTGVFPbQnvBMT9xZlFc30Bs
                  PEI1OJbXKOuxmm0gMOXCVrZH37381tj0Wx603qfYvWqi7uqquBuucW70b7Mx9qZy+eL1aKu3KcKQ
                  QVuhQevOU0L/LwXjUjuO8gu5HVo//oP/Ig0UF4PPow1mxt9pkLJQWSV0PWjD2UFow5lJUkkSEAGT
                  gFLgPvEY9qWnpacOaM71q1gRVSlyruy48o7ELw6YnJs8cdPMgZUIgZSSrTZOHnDzJdYHJ15iP00J
                  chMkXJi83m6bvjOpOqkylonj3E3Aepnienm92anhgpiydYw70LFUQ9l3UwqlhOvr24W/AmrBQqsj
                  nbXWN8byw0pvE4BteY2bbcwgAmnFcOHeRIYZQmYB1pSdcluPG945pVwSkPI8GuPxftGI82wmW9i7
                  ADTEcaRUsuphdb08nKEcCKVQ/vg60/ay2XMTD55wkf1UMq1TSQm4d1H+Qj2G2XABxbBhbSyVOTBo
                  RHmHgKsa8VahEbSaS+0pdEbYZCoXW5yK1okfIEByg7xGFzFIbdI+jVgWrnc9EV3RZXM04XkL7WqL
                  EVglTRaS2WjyjkszB44fnZoYiVRGKOV5/G1u071X3GrPffNde9mfLnEntCSyo0W5nHAhQHny4F26
                  vv/igU2f3DFLfkAxYheOQqK7iK0Ab9U6a1WlTSeA8RtnJm+zhfPYnHfFUgJiVUS4agBTSKNwPtw+
                  O2V3R3lWOVeOUorOjLUumS4q1mABrFxLLu+JbNmiiEKgXJfxY93NwH6+ZN3Me9c75oIFfcwIb1Ph
                  lyIu13cy56zPZAvirqk3QDaH53nCq2Rty7kilUxbKwFsSyUitopTU9nHorEKAVKB25W2Vq9eJz97
                  ++PIW7+7y3p9zrtiJcUHX4SR3OQt1OVaNRw8bGCLUp17r0WHpBqjWo6gwsQAtB5dSSx8D8298+j8
                  7wkVro0AJ6P92TPQVnqT7G5E7PC8Gt3ZIEgMTUBODr3HVmii9TgakQ2REP53Acjrf5Lfbc9tuw6M
                  OqKSexKlFJ+tjL9y8Nn2A0D22VfFkj8/lbj99G/nL65kCBNSEnPyLRefmDz10dmNP13XUQh+KToK
                  CW3TCAfIuID3wlv2+9/cUaRsqeKlXElISZ9EbuT0n2SPnvTd6HTXK6g0BlnqgYJN5o7L8/uO2yiz
                  p1CVM+k+XWp9Ehqv2XzZTJbs6vVy2eAWsVW5u4WUTBiT2ueso5wXfv9n+Q4Boe6NkcsQ/9g1P87t
                  utHAzPYVjehK8dkyuYjiAKQeKxsppVix1nn/W+c0XJHL424ySjUNHUjcdWs3cOZdVDyK5djI9i5y
                  z78uVixdWYimNC4wQ3jSJS3Vm+hHQ/nCh/5NoHoZ5CfRkWHmsD8j0oNGoIkV7vOA+9EZYDG073xr
                  NEEoB1F0Ztfm6Eqq89AxxIrio3QNtzOJI6PQKsL+dI+8Owgd4rocre+Hj3FVxxykRkzdo/OYiIMQ
                  FU6/U55He9JZdMpl8RtCC+H8+Grrlc1Hxe7YY5vkMaJCZRcpJYNbMhNmXOl8+5unRe+iu5huNpxb
                  0rLX3yM/OOcI+6MhfbMTKuWmt47s2nfefbn+V9we/9OdsyxzYGK9ICxJ5OFrMoftvlXyCDxFOdXA
                  tz8kH5ltv10yVsz3+R8777SOYko5Q6QQgojlJS48rvPclqaGa39+o/UWgWpR95gB+7fn5icfPaXr
                  dJQq685SnkfeE+nX5tvvlRlzdfC0O2HRElLJNO0ffSZW92Kc4fEa6cxIEWbdw8a0gg7e29Bmw8Eb
                  CCqn7k2QxFEKy9Ac0OiKxnIu0KmWU6r09QY6c8z2B59Bu8TGon3TlWArdF73PLRL7mO0u8twujja
                  zTUEfXjCDpQPW8V/zhR0znoXQWisGjmEyM9O6jwz5uRbpLDKCl5KKbI5Oq+4LXbNi3PEMgIDiAtY
                  B/0gfs87M72xowamJlUs3yQlk8d3Hn39hfKL0y93/kp3Ud0YC410VKj++co70dmHTM5MKDc2gz6j
                  BmW2v/bc/PgLT4i8u3KtWJLLqYwQtRnaPA83FiE+Zri7ZXM8O1LrsLL8XLgunyxNvHLXLLGQYJMa
                  gukC+en3WnP238le0hTLDSuHcEIIGiPZYecc7l500K6xV+d/KOd/+Lm9JJWV+YitehyzQqhkmvzG
                  Q/P9d982P2ns8PTOlvCiotKYPY+1HdFPLr9ZzCdI2ii+sEqtdUsqy5JK+LPdQf02jrDqYRDcrLNB
                  coMbxibT66ODIdC3TB72luhKK5XgCTQHtNGGrvBhCLtTOSDGiOQdFFvRF6FjxX+KFscrQQwdLrs9
                  OgtsFVpVMIcnDEQTpVrqXO+M1sW/IEBw98+XJb83sDG9magQzGL07ufe6nP3tTOcNorFJ+N3lRfd
                  mLj1pgvy4+Lk+pfj5IZ0f+cbqeNfftv+9O7HxAd0F9VN+mP4nOv8L25yXtp1K2dKv8bsptK2u29E
                  P27SVl5iRL/k10cO6J3HR3keVAnq0WVEZe6B52JPE6hM4bOtXSD3j3dZ1fZp5KUdN8tNrfQsYVk4
                  UiXGDe/ac7MRcg8XmfF90TUhj1IoW6ooeJY+M6yy3UQIwey58acIgkXqyuZTxapKbwo9lEIhh51i
                  Im9sGrkvG+losqpMdsx+BCmVpbAY7aM2riuTrAE6h3ofKi/KS2iXGgQGhLx//5voU0qW1zjmFjTX
                  3w5diXU8OtS11iL2bf7YzVG2zjU/yu8zfuPUPlgVTgD1kfvjZYkXDvthoQJoUV63WZSHnhWf3fVE
                  fLqnRL4SJ9D+8dyg84/pMnXbi04kJQg0KkQtAbn3P2XNIy82zDRGqkpgjsAp+O/rbCIUuVJ2LpRi
                  weeJZy6/Rb4dGmOO7sie+8XN0ceSWWd5LeMVAmEJL2ZLL2FLL15LcywvIYWypH/oYOVhK5ati847
                  /iL7GUL+5Br3TCXwqL8WW7hYpPmeLPm9S7WR2RBhzMYYA7pG2aQq1z6KLq9kEdQxM5bLXagsZqeB
                  WWjOa7i3CUQxUsCraC6+4Mu+UBXIoQNzHi/UFAHr6P29cQft3HGEZVXOGlCex+oO54MDzopfQ7CB
                  S1NAC77Kc66KvPTKu433VTttQwjBmKGZyU9PT3+X4iCjMKIbLlPwf551hfXCawsa7qv12J4NDZ7n
                  sao9+u60H0dvoziE0iBN2FCUnf2GWHrrrPiNrkeuRxdTrad6lrSeTiZVnkc6I9f95q74H0NjqymW
                  u5Ypof4qsGWLS6o2ulRbfW6wnsAgdz80964UsfQ+gQ/ZJJTECU43qWaUexHNpY21OotGBEO5zEHs
                  c9FHD5n65RsSlgJ/BJ6RMhPDSysgu/kYmn8wrfPYRNRLyCpGtbRrt19zX9NNi5cXTgAtrc7S7fPw
                  H0fv/2xV/I2KnMvflDtt0TXtynPcHemO3MYzEe4nDWT3Ojl261sfNzxiqoT+s0B5Hms6Ix+cdkXi
                  qoVfiHUExKcUaYqI4PnXOK88+WafW4yh6p8JSik8j9w9f22+Yfp91gKKg0U2VDZfbzh5h2qjQ7WR
                  3FDcuhwY98LuaONUJXgY7aoyG84EFTSgiy1USgft8O81J1aEK2eaOtjmuwV8jtbJf4bWk+stgl8K
                  K9AE4/fAXCG8BuWlJTK+AnBvuDB/+NB+2eGxuCzPBPzN+NTrjXdcfYecT/dDCsq1LJBd10HHedck
                  pnelrWUVSy9LCQL53SmdJ+wwwRtM+XPGS88u6wKyu5wQn/7CvMa7UHjVDk3cEOD554YtXRObc9iP
                  Gn/2xMvW5wQBGGEJplLdufTh5zmPPPJKn+s8T7nmDLKvFPwzy/J5lbn1iZYrz7rCeoHuxHmDIZVq
                  05VV6mlf7QRokOhig3tTWYedhy5wGDbhG248hur10f+KjlyLEGyAMBdPljRBUHvtUvTJoc8QlFyq
                  BXJoQ+A96IMI70fr9zbK8xRNawF1y8/Zd9yw9dsnEgJLdq+djVJ4nse8hfG/HHW+baL2ioolUsxd
                  w+JqCsg89oJYfMdTjTcphFvt1NLmRH7kTf+bOpmgBl447dGme7hiF5DZ74zoXZff0XLBivXOe0Dh
                  ED61AThl+KC8nGd1vNjWfOf4qQ2XvNEml9M9uipD9/kIE8MkkD7qfOcvv/5z00WdmejnhfF+BYhu
                  CGp7Orrokluaf/KDK60XCfZb2G5S96M3+GC/YjB1xz5HG69MpRMT7JBCn+xpEMwkfJgY8CS6YGKW
                  wKIo0Jt0ETr1Eop1yTR+sLwfuRVOnTTx4xG0v/wpdGDMKHRs/Gi/mVROCIpMrERnlX3kj2kdxaJu
                  XmErIH/pmWqXA3ZYPzXqKBxLlEUG1/NY3RF774jzE38iQNxum9cvGWR+NwkixrYhz/ut8/dtt2h4
                  cLux7d+pmLSiFBsP6trl73fIMycdE/89QdptJNRX+EYzYPfyW+Sc2x5u+uj87+W/vse22d2G9HfH
                  NsRUf+W5Fm4dApAZVyFQR+bWdNqL2hZGXr3h/sjzs2aLxRQT524loH2ulBWtweEHJb14P78p8saN
                  MyPvXXtBZp9dtsrt2yeeHeW5LtVqy9cKSimkEHRkootfnOs8fupl0SdWryuENZcrV11UHdiSIFCy
                  LHFUCimUXc3++O8INpob3E4Qh24QXKFdUesIDh0wSRpRtNW9A7iSwI8evnclQaZZmHsXqlCoNjKi
                  tSgsM0+gi5ognE60fj7P/785vsgEseT8a1J+f+YExkjodxkan7OuQyx7fm7DH1aslass2T17yLaQ
                  0SiRR56z2hYtZT3FxCkcfJDz38PUBQvHVZtPa9qPovfceVmfbN9mNSDvdg9Y8DyIR1Xc80R+3Gj6
                  vP9pkRoULikFxf5TF/CWrhL5s690/grOC/tO9oZuu3l+8OD+9BkxRAywLWX3dDKpUni2hRNxcNJZ
                  sqtWs3rBQpb9+fHIJ0tX0UGxf9YEYJQid0GfVW2ky5y2UXABrlhD/vDzog+MGx15/viDY1vsuKU3
                  YWCf/JCY4zbHojRRnOtfacza6i5VxPPIpzJy3erOyOf/aGP+Fbc6byxaKtrpnmIZHnMYiwWA4yCl
                  UJYqE5ijY0z/NZlmXwYEW6hdCZAwQRAVlsc/5YNAb06hEbAF7X82/nCTg2vuNVldhjB0EVS87CzV
                  P/zUwATFmW3hxH3jq4cgdtjEpxukhuDssVzo/6Z8lMl2M88xZ6NVnpvgWebdjd2gS7V1L9QgWgsi
                  doP/PqZ6pnmfan0KSxKJRhDJNO2Ud60Y8b3U4h4+ddK4PQ2x6Q0YomvCT8OGs1JVpGLpZ9FaZEsI
                  uwDDhT0LRGz4IJUYNlDFAHo6ecTzUI6NiEWVlc4Id/FykV66SpjgpXCQUFFEGAGSm8QWU+W0aexI
                  Bpw61d0yFlFOJifyJjbH86AhpqKLlopVl99izSFQKQvWcNVWlPr6LwfRqj//H288lURhcc09AAAA
                  JXRFWHRkYXRlOmNyZWF0ZQAyMDI0LTAyLTIyVDE3OjE2OjM4KzAxOjAwXiUg7wAAACV0RVh0ZGF0
                  ZTptb2RpZnkAMjAyNC0wMi0yMlQxNzoxNjozOCswMTowMC94mFMAAAAZdEVYdFNvZnR3YXJlAEFk
                  b2JlIEltYWdlUmVhZHlxyWU8AAAAAElFTkSuQmCC' />
                </svg>
                  </h4>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'>
                      <span class='navbar-toggler-bar bar1 mt-2'></span>
                      <span class='navbar-toggler-bar bar2'></span>
                      <span class='navbar-toggler-bar bar3'></span>
                    </span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                  <ul class='navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='#'>
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".$SITE_SUB_TITLE."</h6>
                        </div>
                      </a>
                    </li>
                </ul>
            </div>
          </div>
        </nav>        <!--Nav End-->
      </div>";
    }
    
    public function xucp_content_install(): void {
        echo "
      <div class='container-fluid content-inner pb-0'>";
    }
    
    public function xucp_content_logged(): void {
        echo "
      <div class='container-fluid content-inner pb-0'>";
    }
    
    public function xucp_content_none_logged(): void {
        echo "
      <div class='container-fluid content-inner pb-0'>";
    }
    
    public function xucp_footer_install(): void {
        echo "
      </div>
      <footer class='footer'>
          <div class='footer-body'>
              <div class='left-panel'>
                  xUCP Pro v5.1.1429
              </div>
              <div class='right-panel'>
                  © <script>document.write(new Date().getFullYear())</script> DerStr1k3r.com. All rights reserved.
              </div>
          </div>
      </footer>
	</main>
            
    <script src='/public/js/libs.min.js'></script>
    <script src='/public/js/charts/widgetcharts.js'></script>
    <script src='/public/js/fslightbox.js'></script>
    <script src='/public/js/app.js'></script>
    <script src='/public/js/charts/apexcharts.js'></script>
    <script src='/public/js/prism.mini.js'></script>
  </body>
</html>";
    }
    
    public function xucp_footer_logged(): void {
        // ************************************************************************************//
        // Modal System
        // ************************************************************************************//
        include(dirname(__FILE__) . "/../../app/modal/xucp_modal_logout.php");
        echo "
      </div>
      <footer class='footer'>
          <div class='footer-body'>
              <div class='left-panel'>
                  xUCP Pro v5.1.1429
              </div>
              <div class='right-panel'>
                  © <script>document.write(new Date().getFullYear())</script> DerStr1k3r.com. All rights reserved.
              </div>
          </div>
      </footer>
	</main>
            
    <script src='/public/js/libs.min.js'></script>
    <script src='/public/js/charts/widgetcharts.js'></script>
    <script src='/public/js/fslightbox.js'></script>
    <script src='/public/js/app.js'></script>
    <script src='/public/js/charts/apexcharts.js'></script>
    <script src='/public/js/prism.mini.js'></script>
  </body>
</html>";
    }
    
    public function xucp_footer_none_logged(): void {
        // ************************************************************************************//
        // Modal System
        // ************************************************************************************//
        include(dirname(__FILE__) . "/../../app/modal/xucp_modal_signin.php");
        echo "
      </div>
      <footer class='footer'>
          <div class='footer-body'>
              <div class='left-panel'>
                xUCP Pro v5.1.1429
              </div>
              <div class='right-panel'>
                  © <script>document.write(new Date().getFullYear())</script> DerStr1k3r.com. All rights reserved.
              </div>
          </div>
      </footer>
	</main>
            
    <script src='/public/js/libs.min.js'></script>
    <script src='/public/js/charts/widgetcharts.js'></script>
    <script src='/public/js/fslightbox.js'></script>
    <script src='/public/js/app.js'></script>
    <script src='/public/js/charts/apexcharts.js'></script>
    <script src='/public/js/prism.mini.js'></script>
  </body>
</html>";
    }   
}