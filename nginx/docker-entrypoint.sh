#!/bin/bash
export DOLLAR='$'
export DOMAIN="$(grep DOMAIN .env | cut -d '=' -f2)"
set -eu

envsubst < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

exec "$@"