FROM php:7.3-apache

ENV DEBIAN_FRONTEND=noninteractive

# Update Repo/Install Dep
RUN apt-get update && apt-get install -y \
    git \
    curl \
    npm \
    supervisor \
    zip \
    unzip \
    redis-server \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libreadline-dev \
    libedit-dev \
    libc-client-dev \
    libkrb5-dev \
    libxslt1-dev \
    libmhash-dev \
    libcurl4-openssl-dev \ 
    libonig-dev \
    libzip4 \
    libzip-dev

# Enable PHP Ext...
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ 
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install mysqli pdo pdo_mysql imap gd opcache bcmath ftp mbstring pcntl sockets xsl curl zip 

# PHP Configuration
RUN touch /usr/local/etc/php/php.ini
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini
RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini
RUN echo "file_uploads = On" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = 200M" >> /usr/local/etc/php/php.ini
RUN echo "upload_max_filesize = 200M" >> /usr/local/etc/php/php.ini
RUN echo "memory_limit = 300M" >> /usr/local/etc/php/php.ini
RUN echo "max_execution_time = 1000" >> /usr/local/etc/php/php.ini
RUN echo "max_input_time = 1000" >> /usr/local/etc/php/php.ini
RUN echo "session.gc_maxlifetime = 1200" >> /usr/local/etc/php/php.ini
RUN echo "date.timezone = Etc/UTC\n" >> /usr/local/etc/php/php.ini
RUN echo "[opcache]" >> /usr/local/etc/php/php.ini
RUN echo "opcache.enable = 1" >> /usr/local/etc/php/php.ini
RUN echo "opcache.revalidate_freq = 0" >> /usr/local/etc/php/php.ini
RUN echo "opcache.enable = 1" >> /usr/local/etc/php/php.ini
RUN echo "opcache.enable = 1" >> /usr/local/etc/php/php.ini
RUN echo "opcache.validate_timestamps = 1" >> /usr/local/etc/php/php.ini
RUN echo "opcache.max_accelerated_files = 6000" >> /usr/local/etc/php/php.ini
RUN echo "opcache.interned_strings_buffer= 16" >> /usr/local/etc/php/php.ini

# Forward Request and Error Logs to Docker Log Collector
RUN ln -sf /dev/stdout /var/log/apache2/access.log \
 	&& ln -sf /dev/stderr /var/log/apache2/error.log

# Apache Configuration
COPY ./conf/apache_vhost.conf /etc/apache2/sites-available/
RUN a2enmod rewrite headers && service apache2 restart
RUN a2dissite 000-default.conf && a2ensite apache_vhost.conf

# Copy source code
WORKDIR /app
COPY . /app

# Cleanup
RUN apt-get clean && rm -r /var/lib/apt/lists/*

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]