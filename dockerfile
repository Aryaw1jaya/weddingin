# Gunakan image dasar PHP dengan Apache
FROM php:7.4.14-apache

# Install ekstensi yang diperlukan
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy semua file aplikasi ke dalam direktori root Apache
COPY . /var/www/html/

# Set izin yang diperlukan
RUN chown -R www-data:www-data /var/www/html/

# Aktifkan mod_rewrite untuk Apache
RUN a2enmod rewrite

# Configurasi apache untuk codeigniter
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
</Directory>\n' >> /etc/apache2/apache2.conf

# Expose port 80 untuk Apache
EXPOSE 80
