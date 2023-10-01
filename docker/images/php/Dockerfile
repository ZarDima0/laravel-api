FROM node:12 AS node
FROM php:8.1-rc-fpm

# INSTALL Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
    && apt-get install -y \
    supervisor \
    iputils-ping \
    cron \
    zlib1g-dev \
    libzip-dev \
    procps \
    cron \
    supervisor \
    iputils-ping \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libc-client-dev libkrb5-dev \
    libmagickwand-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install \
    zip \
    pdo \
    pdo_mysql \
    mysqli \
    calendar \
    bcmath \
    exif \
    opcache \
    sockets \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update \
    && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN docker-php-ext-configure pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# INSTALL IMAGICK
RUN pecl install imagick \
    && docker-php-ext-enable imagick


# SETTINGS supervisor
RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/log/php-fpm
COPY supervisor/* /etc/supervisor/conf.d/


RUN printf '* * * * * www-data cd /var/www/html && /usr/local/bin/php artisan schedule:run >> /var/www/html/storage/logs/cron.log 2>&1\n#' >> /etc/cron.d/hello-cron
RUN crontab /etc/cron.d/hello-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Add script
ADD script.sh /usr/local/bin/script.sh
RUN chmod 0755 /usr/local/bin/script.sh

WORKDIR /var/www/html

# Install nodejs
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

CMD /bin/sh -c "/usr/local/bin/script.sh"
