#!/bin/bash
set -e

/home/wwwroot/filament-contact-logs/vendor/bin/pest
/home/wwwroot/filament-contact-logs/vendor/bin/pint
/home/wwwroot/filament-contact-logs/vendor/bin/phpstan analyse
