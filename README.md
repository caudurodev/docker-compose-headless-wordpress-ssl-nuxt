A basic docker-compose recipe to spin up the containers necessary for running a headless wordpress backend and nuxt / vue frontend.

Recommended wp plugins 
- Advanced Custom Fields
- Better-Search-Replace
- Redis-Cache
- Safe-SVG
- WP-GraphQL
- WP-User-Avatar

Recommended Themes
- Nude (for Headless WP)

The recipe should spin up a working site with SSL. It's not very user friendly at the moment but I will improve it over time to make it more generic.

## Setup Overview
1) Add these files to a folder on your server called /app

2) Assuming you have a domain name and server setup. Edit the following files with your credentials:
- .env file with domain name and basic database / wordpress credentials
- init-letsencrypt.sh with your domain name(s)
- /app/nginx/lets.conf with your domain name

3) Make init-letsencrypt.sh executable and then run it:
$ chmod +x init-letsencrypt.sh
$ sudo ./init-letsencrypt.sh

4) You might need to restart docker containers for the previous step to work
$ docker-compose down
$ docker-compose up (might need --build --force-recreate)

5) Your site should spin up - nuxt takes a lot longer (~3-5 minutes) to fully load. Go to Wordpress and add a basic database at domain.name/wp-admin

For now, my nuxt theme is very proprietary, so you can check out the code to get it working, but to simplify - you will need to install advanced custome fields and setup pages that I am using to save basic data about the website as well as the WP GraphQL plugin. In the future I plan to make this step a bit more generic. If you have trouble setting this up, message me. 

Performance is quite good so far - my website (still in development) appears quite fast, even without caching.

## Next steps
I plan to make this theme more generic as well as enable static generation mode for serverless.

I might even create some custom Gutenberg blocks instead of relying on ACF for simple data - still contemplating the best options.

I 

