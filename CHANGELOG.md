# Änderungsprotokoll

Alle wichtigen Änderungen an diesem Projekt werden in dieser Datei dokumentiert.

## 0.28.2 (2026-09-30)

- `web+ajfsp`-Protokollhandler für HTTPS ergänzt; Links werden nach der Anmeldung auch in der Legacy-GUI verarbeitet
- Linkexport für freigegebene Dateien unter PHP 8 wiederhergestellt
- „Links exportieren“ in der Share-Ansicht exportiert wieder alle freigegebenen Dateien
- Gewählte Sprache beim Anmelden und auf den Folgeseiten beibehalten
- Docker-Basisimage auf PHP 8.4 festgelegt und Container-Build auf natives AMD64 und ARM64 umgestellt
- Versioniertes Container-Image auch im regulären PHPGUI-Paket veröffentlicht
- README und Dependabot-Konfiguration für das Legacy-Repository angepasst

## 0.28.1 (2023-12-07)

- Design-Umschalter korrigiert

## 0.28.0 (2023-08-21)

- Anpassungen für PHP 8 vorgenommen
- Speicherüberlauf bei großen Shares behoben

## 0.27.10 (2023-08-21)

- Docker-Image wieder auf PHP 7 umgestellt

## 0.27.9 (2023-07-18)

- PHP-Wert memory_limit im Docker-Container auf -1 gesetzt
- phpinfo-Plugin ergänzt
- PHP 8 als Basis des Docker-Images verwendet
- PHP-Erweiterung opcache für bessere Leistung installiert

## 0.27.8 (2021-12-21)

- Dateien in der Dateiansicht alphabetisch sortiert

## 0.27.7 (2021-09-17)

- GD-Funktionen für die Teilliste wiederhergestellt

## 0.27.6 (2021-01-04)

- RelInfo-URL korrigiert

## 0.27.5 (2020-11-16)

- NEWS_URL und SERVERLIST_URL konfigurierbar gemacht
- GUI-Nachrichten von GitHub bezogen

## 0.27.4 (2020-10-01)

- Standardwert für error_reporting auf 0 gesetzt; über PHP_INI_ERROR_REPORTING änderbar
- Standardwert für display_errors auf Off gesetzt; über PHP_INI_DISPLAY_ERRORS änderbar

## 0.27.3 (2020-10-01)

- Auswahl eines Tabs im Permalink ermöglicht

## 0.27.2 (2020-09-23)

- Verwendung von Permalinks korrigiert

## 0.27.1 (2020-09-12)

- Erstellung von RelInfo-Links korrigiert

## 0.27.0 (2020-09-11)

- Vereinfachtes RelInfo-Symbol in den Ansichten für Downloads, Uploads, Shares und Suche wieder ergänzt
- Permalink in der oberen Leiste ergänzt
- HTTP-Dateien mit file_get_contents statt fsockopen geladen
- Code und Gestaltung von /index.php für bessere Lesbarkeit überarbeitet
- minigui entfernt

## 0.26.0 (2020-02-26)

- Umgebungsvariablen für Docker dokumentiert
- phpaj-Option savebw entfernt
- phpaj-Option autoclean für Downloads entfernt
- Nicht mehr benötigte phpaj-Optionen aus den Einstellungen entfernt
- Konfiguration der Fortschrittsbalken über Umgebungsvariablen ermöglicht
- Automatische Anmeldung im oberen Frame ermöglicht

## 0.25.5 (2020-01-27)

- Verarbeitung mehrerer Links ermöglicht

## 0.25.4 (2020-01-24)

- Linkexport für AJL und BB-Code korrigiert

## 0.25.3 (2019-12-16)

- Für alle Core-Anfragen von fsockopen auf das schnellere curl umgestellt

## 0.25.2 (2019-12-09)

- Pop-ups beim Linkexport entfernt

## 0.25.1 (2019-12-06)

- minigui für PHP 7.x korrigiert

## 0.25.0 (2019-07-30)

- Projekt in die Versionsverwaltung importiert
- Code mit PHP 7.x kompatibel gemacht
- Docker-Unterstützung ergänzt
- Veraltete Implementierung von appledocs entfernt
