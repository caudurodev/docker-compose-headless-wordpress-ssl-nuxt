# Overview
A docker-compose file to spin up the containers necessary for running a wordpress instance with SSL / MySQL / Nginx quickly
Contains a local docker-compose

## Recommended wp plugins 
- Advanced Custom Fields
- Better-Search-Replace
- Redis-Cache (container enabled by default in docker-compose)
- Safe-SVG
- WP-GraphQL
- WP-User-Avatar

Recommended Wordpress Themes

- Nude (for Headless WP)

Nuxt wordpress theme:

- https://github.com/caudurodev/wordpress-nuxt-theme

The recipe should spin up a working site with SSL. It's not very user friendly at the moment but I will improve it over time to make it more generic.

## Setup Overview
1) Assuming you have a domain name and server already setup. Edit and rename sample.env to .env with your data.

2) Make ./init-letsencrypt.sh executable and then run it:
```$ chmod +x init-letsencrypt.sh```
```$ sudo ./init-letsencrypt.sh```

3) You might need to restart docker containers for the previous step to work
```$ docker-compose down```
```$ docker-compose up (might need --build --force-recreate)```

4) Your site should spin up  Go to yourdomain.com/wp-admin and install wordpress as usual

5) Optional - enable my wordpress plugin (caudurodev) to turn on Redis WP GraphQL query caching - you specify if you want the query cached via a unique string in the request header...

6) Change permissions in wordpress folders so you can upload files and edit plugins / themes
```$ sudo chown -R www-data:www-data wp-content/* ```

## Local Development
This will use slightly different configurations. You will need a /data folder in the same dir as your docker-compose to store your DB files
```$ docker-compose -f docker-compose-dev.yml up```

 

