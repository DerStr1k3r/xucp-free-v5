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
<html lang='".$_SESSION['xucp_free']['site_settings_lang']."'>
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
    <aside class='sidebar sidebar-default navs-rounded '>
        <div class='sidebar-header d-flex align-items-center justify-content-start'>
            <a href='/index' class='navbar-brand dis-none align-items-center justify-content-center'>
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
                            <a class='nav-link' aria-current='page' href='/index'>
                                    <i class='icon'>
                                        <svg width='22' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                        </svg>
                                    </i>
                                    <span class='item-name'>".HOME_NONE_LOGGED."</span>
                            </a>
                        </li>
					<li><hr class='hr-horizontal'></li>
                        <li class='nav-item '>
                            <a class='nav-link' aria-current='page' href='/vendor/frontend/rules/index'>
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
                            <a class='nav-link' aria-current='page' href='/vendor/frontend/sponsor/index'>
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
                            <a class='nav-link' aria-current='page' href='/vendor/frontend/imprint/index'>
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
                    <div class='card mx-4 xucp-card'>
                        <div class='card-body'>
                            <div class='sidebarbottom-content'>
                                    <div class='image'>
								<svg class='img-fluid' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='240px' height='42px' viewBox='0 0 248 42' enable-background='new 0 0 240 42' xml:space='preserve'>  <image id='image0' width='240' height='42' x='0' y='0'
									    href='data:image/png;base64,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' />
								</svg>
                                    </div>
                                    <p class='mb-0'>Be more secure with Pro Feature</p>
                                    <a href='https://discord.gg/fJArWgXSMh' class='btn btn-primary mt-3'>Upgrade Now</a>
                            </div>
                        </div>
                    </div>
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
                      <a class='nav-link py-0 d-flex align-items-center' href='#' data-bs-toggle='modal' data-bs-target='#loginModal'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".LOGIN."</h6>
                        </div>
                      </a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link py-0 d-flex align-items-center' href='#' data-bs-toggle='modal' data-bs-target='#loginModal'>
                        <svg width='22' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            <path d='M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                        </svg>
                        <div class='caption ms-3 '>
                            <h6 class='mb-0 caption-title'>".REGISTER."</h6>
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
                    <div class='card mx-4 xucp-card'>
                        <div class='card-body'>
                            <div class='sidebarbottom-content'>
                                    <div class='image'>
								<svg class='img-fluid' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='240px' height='42px' viewBox='0 0 248 42' enable-background='new 0 0 240 42' xml:space='preserve'>  <image id='image0' width='240' height='42' x='0' y='0'
									    href='data:image/png;base64,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' />
								</svg>
                                    </div>
                                    <p class='mb-0'>Be more secure with Pro Feature</p>
                                    <a href='https://discord.derstr1k3r.com' class='btn btn-primary mt-3'>Upgrade Now</a>
                            </div>
                        </div>
                    </div>
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
    <title>".$SITE_SUB_TITLE."</title>
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
                  xUCP Free v5.1.1431
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
                  xUCP Free v5.1.1431
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
                  xUCP Free v5.1.1431
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