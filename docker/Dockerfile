# ベースイメージ
FROM php:8.1-cli

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libzip-dev \
    zip \
    nodejs \
    npm

# PHP拡張モジュールのインストール
RUN docker-php-ext-install pdo_mysql zip

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /workspace

# パーミッション設定
RUN useradd -ms /bin/bash remoteUser
USER remoteUser
