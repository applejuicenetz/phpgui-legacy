# appleJuice phpGUI (Legacy)

![Release](https://img.shields.io/github/v/release/applejuicenetz/phpgui-legacy)
![Downloads](https://img.shields.io/github/downloads/applejuicenetz/phpgui-legacy/total)
![Lizenz](https://img.shields.io/github/license/applejuicenetz/phpgui-legacy)

![Container-Build](https://github.com/applejuicenetz/phpgui-legacy/actions/workflows/container.yml/badge.svg)
![Docker-Hub-Pulls](https://img.shields.io/docker/pulls/applejuicenetz/phpgui)

Die klassische appleJuice Client-GUI, geschrieben in PHP. 
Die Entwicklung vor dem Layout-Update mit [0.29.0](https://github.com/applejuicenetz/phpgui);

## Abhängigkeiten

Es wird mindestens PHP `8.3` benötigt! Das Docker-Image basiert auf PHP `8.3`.


## Konfiguration (nur bei selbst hosting ohne Docker)

Die Datei `.env.dist` kopieren, zu `.env` umbenennen und mit einem Texteditor die gewünschte Konfiguration vornehmen.


## Auto-Login per URL

Zwischen dem `Core Beenden` und `Logout` Button befindet sich eine `Permalink` Button.
Dieser kann als Lesezeichen gesetzt werden und logt dich automatisch in den gerade eingeloggten Core ein.

Zusätzlich kann manuell der URL-Parameter `&tab=NAME_DES_TAB` hinzugefügt werden, um bspw. direkt in den `downloads` oder `uploads` Tab zu springen.

### Umgebungsvariablen

| Variable                | Wert                 | Beschreibung                                           |
|-------------------------|----------------------|--------------------------------------------------------|
| `CORE_HOST`             | `http://192.168.2.1` | IP/Host, auf dem der Core läuft, mit Schema            |
| `CORE_PORT`             | `9851`               | XML-Port des Cores                                     |
| `GUI_LANGUAGE`          | `deutsch`            | `deutsch` oder `englisch`                              |
| `GUI_STYLE`             | `tango`              | Name des Styles (siehe Ordner `style`)                 |
| `GUI_REFRESH_STATUS`    | `10`                 | `Statusleiste` alle n Sekunden aktualisieren           |
| `GUI_REFRESH_DOWNLOADS` | `30`                 | Ansicht `downloads` alle n Sekunden aktualisieren      |
| `GUI_REFRESH_UPLOADS`   | `30`                 | Ansicht `uploads` alle n Sekunden aktualisieren        |
| `GUI_REFRESH_SEARCH`    | `30`                 | Ansicht `search` alle n Sekunden aktualisieren         |
| `GUI_SHOW_NEWS`         | `1`                  | News auf der `Statusseite` anzeigen                    |
| `GUI_SHOW_SHARE`        | `1`                  | Share-Statistik auf der `Statusseite` anzeigen         |
| `TOP_SHOW_PERMALINK`    | `1`                  | `Perma Link` in der oberen Navigationsleiste anzeigen  |
| `NEWS_URL`              | `http://XY`          | URL, von der die News geladen werden                   |
| `SERVERLIST_URL`        | `http://ABC`         | URL, unter der neue Server gefunden werden             |
| `REL_INFO`              | `http://MN/ajfps/%s` | leer setzen, um die Spalte mit Release-Infos zu entfernen |


## Docker

### Exposed Ports

- `80` - HTTP Port

### docker run

Der feste Release-Stand ist unter `ghcr.io/applejuicenetz/phpgui:0.28.2` verfügbar. Der aktuelle Stand von `main` wird als `ghcr.io/applejuicenetz/phpgui:legacy` veröffentlicht.

Container starten:

```bash
docker run -d \
        -p 8080:80 \
        --name phpgui \
        ghcr.io/applejuicenetz/phpgui:legacy
```

optional: `CORE_HOST` und/oder `CORE_PORT` per Umgebungsvariable setzen

z. B.

```bash
docker run -d \
        -p 8080:80 \
        -e "CORE_HOST=http://192.168.1.2" \
        -e "CORE_PORT=9851" \
        --name phpgui \
        ghcr.io/applejuicenetz/phpgui:legacy
```

### docker-compose.yml

```yaml
services:
  php-gui:
    image: ghcr.io/applejuicenetz/phpgui:legacy
    restart: always
    container_name: phpgui
    network_mode: bridge
    ports:
      - "8080:80/tcp"
    environment:
      TZ: Europe/Berlin
      CORE_HOST: http://192.168.1.2
      CORE_PORT: 9851
      GUI_STYLE: tango
```
