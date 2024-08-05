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
class xUCP_BBCodeConverter {
    private $bbcode;
    
    public function __construct($bbcode) {
        $this->bbcode = $bbcode;
    }
    
    public static function convert($bbcode) {
        $converted = $bbcode;
        
        // Known BBCodes
        $bbcodes = [
            '/\[b\](.*?)\[\/b\]/is' => '**$1**',
            '/\[i\](.*?)\[\/i\]/is' => '*$1*',
            '/\[u\](.*?)\[\/u\]/is' => '__$1__',
            '/\[s\](.*?)\[\/s\]/is' => '~~$1~~',
            '/\[url\](.*?)\[\/url\]/is' => '$1',
            '/\[url\=(.*?)\](.*?)\[\/url\]/is' => '[$2]($1)',
            '/\[img\](.*?)\[\/img\]/is' => '$1',
            '/\[code\](.*?)\[\/code\]/is' => '```$1```',
            '/\[quote\](.*?)\[\/quote\]/is' => '> $1',
            '/\[color\=(.*?)\](.*?)\[\/color\]/is' => '$2',
            '/\[size\=(.*?)\](.*?)\[\/size\]/is' => '$2',
            '/\[font\=(.*?)\](.*?)\[\/font\]/is' => '$2',
            '/\[list\](.*?)\[\/list\]/is' => '$1',
            '/\[\*\]/' => '- ',
            '/\[hr\]/is' => '---',
            '/\[br\]/is' => PHP_EOL.PHP_EOL
        ];
        
        foreach ($bbcodes as $pattern => $replacement) {
            $converted = preg_replace($pattern, $replacement, $converted);
        }
        
        return $converted;
    }
}