FROM php:8.3.0-fpm

#  1-Install dependancies
RUN apt-get update && apt-get install -y \
        libpng-dev \ 
        libonig-dev \ 
        libxml2-dev \ 
        zip \ 
        unzip \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        unzip \
        && docker-php-ext-install \
        intl \
        opcache \
        pdo \
        pdo_pgsql \
        pdo_mysql \
        zip

#  2- Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3- Set working directory
WORKDIR /var/www/shop_wine

# 4- Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 5- Copy existing appliaction directory contents
COPY . /var/www/shop_wine

# 6- copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/shop_wine/

# 7- Change current user to www
USER www-data

EXPOSE 9000

ENTRYPOINT [ "php-fpm" ]





