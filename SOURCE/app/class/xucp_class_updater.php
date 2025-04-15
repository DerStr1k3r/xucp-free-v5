<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.2
// *
// * Copyright (c) 2024 - 2025 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
class xUCP_Updater {
    private string $versionFile;
    private string $referenceVersionFile;
    private string $referenceVersion;

    public function __construct(string $versionFile, string $referenceVersionFile) {
        $this->versionFile = $versionFile;
        $this->referenceVersionFile = $referenceVersionFile;
        $this->referenceVersion = $this->readVersionFromFile($referenceVersionFile);
    }

    public function isNewVersionAvailable(): bool {
        $currentVersion = $this->getCurrentVersion();

        if ($currentVersion === false) {
            throw new Exception("Fehler beim Lesen der Versionsnummer aus der Datei.");
        }

        return version_compare($currentVersion, $this->referenceVersion, '>');
    }

    public function getReferenceVersion(): string {
        return $this->referenceVersion;
    }

    public function getCurrentVersion(): ?string {
        return $this->readVersionFromFile($this->versionFile);
    }

    public function getNewVersion(): ?string {
        if ($this->isNewVersionAvailable()) {
            return $this->referenceVersion;
        }
        return null;
    }

    private function readVersionFromFile(string $versionFile): ?string {
        // Create a context to bypass SSL verification
        $contextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];
        $context = stream_context_create($contextOptions);

        // Use the context when calling file_get_contents
        $version = file_get_contents($versionFile, false, $context);

        if ($version === false) {
            return null;
        }

        return trim($version);
    }

    public function getHostUrl(): string {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        return "$protocol://$host";
    }
}