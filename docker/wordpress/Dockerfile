FROM wordpress:latest

RUN a2enmod headers expires rewrite

COPY docker-entrypoint-upload-perms.sh /usr/local/bin/docker-entrypoint-upload-perms.sh
RUN chmod +x /usr/local/bin/docker-entrypoint-upload-perms.sh

ENTRYPOINT ["docker-entrypoint-upload-perms.sh"]
CMD ["apache2-foreground"]
