FROM php:7.0-apache

#Setup Environment and OS tools
RUN apt-get update -qq && \
    apt-get install -y -qq git curl wget && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Update Configs
COPY config/php.ini ${PHP_INI_DIR}/php.ini
COPY config/vhost.conf /etc/apache2/sites-available/000-default.conf

#COPY Code Files to Apache Webroot inside container (DockerCompose file creates a realtime link to update when changes are made)
COPY lib/ /var/www/html/lib
COPY src/ /var/www/html/src
COPY composer.* /var/www/html/

#Install Dependencies
RUN if [ "$COMPOSER_INSTALL" = "true" ]; then composer install $COMPOSER_INSTALL_ARGS; fi
#RUN cd /var/www/html && \
#    composer install --no-interaction

CMD ["apache2-foreground", "-DRemoteIP"]