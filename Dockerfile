FROM webdevops/php-nginx-dev:8.0

WORKDIR /app

RUN sed -i '/xdebug.profiler_output_dir/d' /usr/local/etc/php/conf.d/98-webdevops.ini
RUN sed -i '/xdebug.remote_connect_back/d' /usr/local/etc/php/conf.d/98-webdevops.ini
RUN sed -i '/xdebug.remote_enable/d' /usr/local/etc/php/conf.d/98-webdevops.ini

