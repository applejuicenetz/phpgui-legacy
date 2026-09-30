# Änderungsprotokoll

Alle wichtigen Änderungen an diesem Projekt werden in dieser Datei dokumentiert.

## 0.28.2

- Linkexport für freigegebene Dateien unter PHP 8 wiederhergestellt
- „Links exportieren“ in der Share-Ansicht exportiert wieder alle freigegebenen Dateien
- Docker-Basisimage auf PHP 8.4 festgelegt und Container-Build auf natives AMD64 und ARM64 umgestellt
- Versioniertes Container-Image auch im regulären PHPGUI-Paket veröffentlicht
- README und Dependabot-Konfiguration für das Legacy-Repository angepasst

## 0.28.1

- Design-Umschalter korrigiert

## 0.28.0

- Anpassungen für PHP 8 vorgenommen
- Speicherüberlauf bei großen Shares behoben

## 0.27.10

- Docker-Image wieder auf PHP 7 umgestellt

## 0.27.9

- PHP-Wert memory_limit im Docker-Container auf -1 gesetzt
- phpinfo-Plugin ergänzt
- PHP 8 als Basis des Docker-Images verwendet
- PHP-Erweiterung opcache für bessere Leistung installiert

## 0.27.8

- Dateien in der Dateiansicht alphabetisch sortiert

## 0.27.7

- GD-Funktionen für die Teilliste wiederhergestellt

## 0.27.6

- RelInfo-URL korrigiert

## 0.27.5

- NEWS_URL und SERVERLIST_URL konfigurierbar gemacht
- GUI-Nachrichten von GitHub bezogen

## 0.27.4

- Standardwert für error_reporting auf 0 gesetzt; über PHP_INI_ERROR_REPORTING änderbar
- Standardwert für display_errors auf Off gesetzt; über PHP_INI_DISPLAY_ERRORS änderbar

## 0.27.3

- Auswahl eines Tabs im Permalink ermöglicht

## 0.27.2

- Verwendung von Permalinks korrigiert

## 0.27.1

- Erstellung von RelInfo-Links korrigiert

## 0.27.0

- Vereinfachtes RelInfo-Symbol in den Ansichten für Downloads, Uploads, Shares und Suche wieder ergänzt
- Permalink in der oberen Leiste ergänzt
- HTTP-Dateien mit file_get_contents statt fsockopen geladen
- Code und Gestaltung von /index.php für bessere Lesbarkeit überarbeitet
- minigui entfernt

## 0.26.0

- Umgebungsvariablen für Docker dokumentiert
- phpaj-Option savebw entfernt
- phpaj-Option autoclean für Downloads entfernt
- Nicht mehr benötigte phpaj-Optionen aus den Einstellungen entfernt
- Konfiguration der Fortschrittsbalken über Umgebungsvariablen ermöglicht
- Automatische Anmeldung im oberen Frame ermöglicht

## 0.25.5

- Verarbeitung mehrerer Links ermöglicht

## 0.25.4

- Linkexport für AJL und BB-Code korrigiert

## 0.25.3

- Für alle Core-Anfragen von fsockopen auf das schnellere curl umgestellt

## 0.25.2

- Pop-ups beim Linkexport entfernt

## 0.25.1

- minigui für PHP 7.x korrigiert

## 0.25.0

- Projekt in die Versionsverwaltung importiert
- Code mit PHP 7.x kompatibel gemacht
- Docker-Unterstützung ergänzt
- Veraltete Implementierung von appledocs entfernt
