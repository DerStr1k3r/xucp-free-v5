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

class xUCP_BBCode_Editor {
    public function xucp_text_bbcode($text, string $content = ""): string
    {
        $button = "/public/images/editor/";
        
        $output = "
            <div class='col-lg-12'>
                <script type='text/javascript' src='/public/js/editor.js'></script>
                <script type='text/javascript'>edToolbar('" . $text . "','" . $button . "','true');</script>
                <textarea name='" . $text . "' id='" . $text . "' class='form-control' rows='16' cols='80'>" . $content . "</textarea>
            </div>";
        
        return $output;
    }
}