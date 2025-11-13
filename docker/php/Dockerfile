
FROM php:8.2-fpm

# 必要なシステムパッケージとPHP拡張をインストール
RUN apt update && apt install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Laravel開発に一般的に必要なPHP拡張をインストール
RUN docker-php-ext-install pdo_mysql zip opcache gd mbstring exif pcntl bcmath intl

# PHP設定ファイルをコピー
COPY php.ini /usr/local/etc/php/

# ComposerのインストールとグローバルPATHへの移動
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer self-update

# アプリケーションの作業ディレクトリを設定
WORKDIR /var/www