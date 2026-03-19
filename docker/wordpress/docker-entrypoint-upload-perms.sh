#!/usr/bin/env bash
set -euo pipefail

UPLOADS_DIR="/var/www/html/wp-content/uploads"

mkdir -p "${UPLOADS_DIR}"
chown -R www-data:www-data "${UPLOADS_DIR}"
chmod -R ug+rwX "${UPLOADS_DIR}"

exec /usr/local/bin/docker-entrypoint.sh "$@"
