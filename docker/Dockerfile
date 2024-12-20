FROM php:8.1-fpm

# PHP拡張インストール例
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && rm -rf /var/lib/apt/lists/*

# Node.jsのセットアップ
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@11.0.0

# Composerインストール
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Nginx設定などは適宜行う
# ここでlaravel-chat公開ディレクトリをNginxのrootに設定するなどの設定ファイルが必要。
# 例: COPY ./nginx.conf /etc/nginx/conf.d/default.conf

CMD service nginx start && php-fpm
