#!/bin/sh
set -e
cd /home/wwwroot/filament-contact-logs || exit
chown -R www-data:www-data /home/wwwroot/filament-contact-logs && \
find /home/wwwroot/filament-contact-logs -type f -exec chmod 644 {} \; && \
find /home/wwwroot/filament-contact-logs -type d -exec chmod 755 {} \; && \
chmod -R +x /home/wwwroot/filament-contact-logs/vendor/bin/ && \
chmod -R +x /home/wwwroot/filament-contact-logs/dev/
