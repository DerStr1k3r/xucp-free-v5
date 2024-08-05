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
class xUCP_Discord {
    private $webhookUrl;
    private $username;
    private $avatarUrl;
    private $author;
    private $footer;
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setAvatarUrl($avatarUrl) {
        $this->avatarUrl = $avatarUrl;
    }
    
    public function setAuthor($author) {
        $this->author = $author;
    }
    
    public function setFooter($footer) {
        $this->footer = $footer;
    }
    
    public function __construct($webhookUrl, $username = null, $avatarUrl = null, $author = null, $footer = null) {
        $this->webhookUrl = $webhookUrl;
        $this->username = $username;
        $this->avatarUrl = $avatarUrl;
        $this->author = $author;
        $this->footer = $footer;
    }
       
    public function send($content) {
        // Erstellen des Payloads für das Embed
        $payload = [
            'content' => null,
            'embeds' => [
                [
                    'title' => null,
                    'description' => xUCP_BBCodeConverter::convert($content), // Hier wird der konvertierte Text als Beschreibung des Embeds verwendet
                    'url' => null,
                    'timestamp' => date('c'),
                    'color' => hexdec('0099ff'), // Beispiel: Farbe des Embeds (blau)
                    'footer' => [
                        'text' => $this->footer
                    ],
                    'author' => [
                        'name' => $this->author,
                        'icon_url' => null
                    ]
                ]
            ]
        ];
        
        // Falls der Avatar-URL angegeben wurde, füge sie zum Embed hinzu
        if ($this->avatarUrl !== null) {
            $payload['embeds'][0]['author']['icon_url'] = $this->avatarUrl;
        }
        
        // Falls der Benutzername angegeben wurde, füge ihn zum Payload hinzu
        if ($this->username !== null) {
            $payload['username'] = $this->username;
        }
        
        // Verwandeln des Payloads in JSON
        $jsonPayload = json_encode($payload);
        
        // Konfiguration der curl-Anfrage
        $ch = curl_init($this->webhookUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
        
        // Ausführen der curl-Anfrage
        $response = curl_exec($ch);
        
        // Schließen der curl-Verbindung
        curl_close($ch);
        
        // Rückgabe der Antwort von Discord
        return $response;
    }
}