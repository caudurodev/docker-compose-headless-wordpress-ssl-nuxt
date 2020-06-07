FROM nginx:1.15-alpine

WORKDIR /app

## nginx template to parse
COPY ./nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

## add entrypoint.sh
COPY ./nginx/docker-entrypoint.sh /

COPY ./.env /app




ENTRYPOINT ["sh", "/docker-entrypoint.sh"]


CMD ["nginx", "-g", "daemon off;"]