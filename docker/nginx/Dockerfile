FROM nginx:1.11

ADD /etc/nginx/nginx.conf /etc/nginx/nginx.conf
ADD /etc/nginx/conf.d /etc/nginx/conf.d

RUN usermod -u 1000 www-data

# Name of the remote host responsible of the php application
ENV PHP_HOST="php"
CMD ["/bin/bash", "-c", "envsubst < /etc/nginx/conf.d/upstream.conf.template > /etc/nginx/conf.d/upstream.conf && nginx -g 'daemon off;'"]

