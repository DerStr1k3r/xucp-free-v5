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
class xUCP_BBCode_Parser
{
    private array $bbcodes;
    
    public function __construct() {
        $this->bbcodes = [
            '/\[b\](.*?)\[\/b\]/s' => '<strong>$1</strong>',
            '/\[i\](.*?)\[\/i\]/s' => '<em>$1</em>',
            '/\[u\](.*?)\[\/u\]/s' => '<u>$1</u>',
            '/\[s\](.*?)\[\/s\]/s' => '<del>$1</del>',
            '/\[url\](.*?)\[\/url\]/s' => '<a href="$1">$1</a>',
            '/\[url=(.*?)\](.*?)\[\/url\]/s' => '<a href="$1">$2</a>',
            '/\[img\](.*?)\[\/img\]/s' => '<img src="$1" alt="" />',
            '/\[img=(.*?)\](.*?)\[\/img\]/s' => '<img src="$1" alt="$2" />',
            '/\[color=(.*?)\](.*?)\[\/color\]/s' => '<span style="color:$1;">$2</span>',
            '/\[size=(.*?)\](.*?)\[\/size\]/s' => '<span style="font-size:$1;">$2</span>',
            '/\[quote\](.*?)\[\/quote\]/s' => '<blockquote>$1</blockquote>',
            '/\[quote=(.*?)\](.*?)\[\/quote\]/s' => '<blockquote><footer>$1 said:</footer><p>$2</p></blockquote>',
            '/\[code\](.*?)\[\/code\]/s' => '<pre><code>$1</code></pre>',
            '/\[list\](.*?)\[\/list\]/s' => '<ul>$1</ul>',
            '/\[list=1\](.*?)\[\/list\]/s' => '<ol>$1</ol>',
            '/\[\*\](.*?)(?=\[\*|\[\/list\])/s' => '<li>$1</li>',
            '/\[left\](.*?)\[\/left\]/s' => '<div style="text-align:left;">$1</div>',
            '/\[center\](.*?)\[\/center\]/s' => '<div style="text-align:center;">$1</div>',
            '/\[right\](.*?)\[\/right\]/s' => '<div style="text-align:right;">$1</div>',
            '/\[table\](.*?)\[\/table\]/s' => '<table>$1</table>',
            '/\[tr\](.*?)\[\/tr\]/s' => '<tr>$1</tr>',
            '/\[td\](.*?)\[\/td\]/s' => '<td>$1</td>',
            '/\[youtube\](.*?)\[\/youtube\]/s' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            '/\[br\]/' => '<br>',
        ];
    }
    
    public function parse(string $text): string {
        foreach ($this->bbcodes as $bbcode => $html) {
            $text = preg_replace($bbcode, $html, $text);
        }
        return $text;
    }
}