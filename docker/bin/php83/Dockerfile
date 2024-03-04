FROM php:8.3-apache

RUN a2enmod rewrite

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
dialog \
libsqlite3-dev \
libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
zlib1g-dev \
libzip-dev \
libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
build-essential \
git \
curl \
libonig-dev && \ 
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
libcurl4-openssl-dev \
zip \
openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Install redis
#RUN pecl install redis-5.1.1 && \
#    docker-php-ext-enable redis

# Install imagick
# RUN apt-get update && \
#     apt-get -y --no-install-recommends install --fix-missing libmagickwand-dev && \
#     rm -rf /var/lib/apt/lists/* && \
#     pecl install imagick && \
#     docker-php-ext-enable imagick

# Other PHP7 Extensions
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get install libxml2-dev && \
    docker-php-ext-install pdo_mysql pdo_sqlite mysqli curl zip -j$(nproc) intl mbstring gettext soap exif


# Install Freetype 
RUN apt-get -y update && \
    apt-get --no-install-recommends install -y libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Enable apache modules
RUN a2enmod rewrite headers

# Cleanup
RUN rm -rf /usr/src/*