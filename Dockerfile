# Basis webdevops/php-apache (Alpine, PHP 8.3, amd64+arm64). Apache laeuft auch auf Kernel < 3.17
# (z.B. Synology DS2415+, 3.10); die offiziellen php:*-apache Images (Debian >= bullseye) brechen dort
# mit "AH00141: Could not initialize random number generator" ab.
# prod (letzte Stage = Default-Target im Workflow): nur HTTP, mod_ssl braucht getrandom() und ist entfernt.
# dev: HTTPS auf Port 443 mit dem selbstsignierten Zertifikat des Basis-Images; nur auf modernen Kerneln.
ARG PHP_TAG=8.3-alpine
FROM docker.io/webdevops/php-apache:${PHP_TAG} AS base

ENV CORE_HOST="" \
    CORE_PORT=9851 \
    GUI_LANGUAGE="deutsch"  \
    GUI_STYLE="tango"  \
    GUI_REFRESH_STATUS=10 \
    GUI_REFRESH_DOWNLOADS=30 \
    GUI_REFRESH_UPLOADS=30 \
    GUI_REFRESH_SEARCH=30 \
    GUI_SHOW_NEWS=1 \
    GUI_SHOW_SHARE=1 \
    WEB_DOCUMENT_ROOT=/var/www/html \
    PHP_MEMORY_LIMIT=-1 \
    LOG_STDOUT=/dev/stdout \
    LOG_STDERR=/dev/stderr

RUN echo "variables_order=EGPCS" > /usr/local/etc/php/conf.d/zz-phpaj.ini

FROM base AS dev

EXPOSE 80 443

FROM base AS prod

# vhost.ssl.conf wird von vhost.conf eingebunden: leeren statt loeschen, sonst bricht Apache mit Syntax error ab.
RUN rm -f /etc/apache2/conf.d/ssl.conf && : > /opt/docker/etc/httpd/vhost.ssl.conf

COPY . /var/www/html/

EXPOSE 80

HEALTHCHECK --interval=60s --start-period=5s CMD curl -I --fail http://localhost:80 || exit 1
