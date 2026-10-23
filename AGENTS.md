# phpGUI Legacy: Release-Prozess

Diese Anleitung gilt für das Repository `phpgui-legacy`. Vor einem Release den Git-Status prüfen und fremde, nicht zum Release gehörende Änderungen unangetastet lassen.

## Release vorbereiten

1. Eine noch nicht verwendete Versionsnummer ausschließlich aus der Reihe `0.28.x` wählen. Niemals `0.29.0` oder eine höhere Versionslinie wählen. Die vorhandenen Git-Tags haben kein `v`-Präfix, beispielsweise `0.28.2`; dieser Tag existiert bereits.
2. `PHP_GUI_VERSION` in `main/subs.php` mit `v`-Präfix setzen und in `CHANGELOG.md` einen Abschnitt für dieselbe Nummer ohne `v` ergänzen.
3. Betroffene PHP-Dateien mit `php -l` prüfen und das Docker-Image lokal bauen. Änderungen an der Linkverarbeitung zusätzlich über HTTPS mit einem `web+ajfsp:`-Datei- und Serverlink bei angemeldeter und nicht angemeldeter GUI prüfen. Dafür die Stage `dev` bauen (Port 443, selbstsigniertes Zertifikat) und den Code per Volume einbinden; nur auf Kerneln ab 3.17, weil `mod_ssl` `getrandom()` braucht:

   ```bash
   docker build --target dev -t phpgui-legacy:dev .
   docker run -d -p 8080:80 -p 8443:443 -v "$PWD":/var/www/html --name phpgui-legacy phpgui-legacy:dev
   ```

   Das veröffentlichte Image (Stage `prod`, letzte Stage im `Dockerfile`) enthält bewusst kein SSL, damit es auf alten Kerneln wie Synology DS2415+ (3.10) startet. Ein `.env` im Arbeitsverzeichnis überschreibt dabei die Umgebungsvariablen des Containers.
4. Die Änderungen über den üblichen Review-Prozess nach `main` bringen. Ein Push auf `main` baut und veröffentlicht bereits den beweglichen Image-Tag `legacy`; das ist noch kein versioniertes GitHub-Release.

## Release veröffentlichen

1. Einen Git-Tag ohne `v` am freizugebenden Commit erstellen und den GitHub-Release für diesen Tag veröffentlichen. `.github/workflows/container.yml` reagiert auf `release: released`, Pushes nach `main` und manuelle Starts.
2. Der Workflow baut `linux/amd64` und `linux/arm64` getrennt, veröffentlicht die Digests auf GHCR und erstellt danach Multi-Plattform-Tags. Bei einem Release wird der Versionstag in `ghcr.io/applejuicenetz/phpgui` veröffentlicht, bei Nicht-Release-Builds der bewegliche Tag `legacy`. Nach `phpgui-legacy` wird nichts mehr gepusht. Wenn Docker-Hub-Zugangsdaten vorhanden sind, werden die entsprechenden Docker-Hub-Tags ebenfalls veröffentlicht.
3. Beide Build-Jobs und den Merge-Job sowie die veröffentlichten Image-Tags prüfen. Einen bereits veröffentlichten Tag nicht stillschweigend auf einen anderen Commit verschieben; für nachträgliche Änderungen eine neue Version wählen.

Für GHCR verwendet der Workflow `GHCR_USER` aus Repository-Variablen oder Secrets und `GHCR_TOKEN`, mit Fallback auf den GitHub-Akteur und `github.token`. Für Docker Hub sind `DOCKER_HUB_USER` und `DOCKER_HUB_TOKEN` optional; ohne sie entfällt die Docker-Hub-Kopie.
