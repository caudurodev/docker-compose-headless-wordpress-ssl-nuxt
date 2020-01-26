#!/bin/sh

cd /app/wordpress

# echo -e "define('FORCE_SSL_ADMIN', true);" >> wp-config.php
# echo -e "if (\$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') \$_SERVER['HTTPS'] = 'On';" >> wp-config.php

sed -i -e "s/database_name_here/$WORDPRESS_DB_NAME/" wp-config.php
sed -i -e "s/username_here/$WORDPRESS_DB_USER/" wp-config.php
sed -i -e "s/password_here/$WORDPRESS_DB_PASSWORD/" wp-config.php
sed -i -e "s/localhost/$WORDPRESS_DB_HOST/" wp-config.php


# echo -e "define('FORCE_SSL_LOGIN', true);" >> wp-config.php
echo -e "define('FS_METHOD', 'direct');" >> wp-config.php
echo -e "define( 'WP_HOME', '"$HOSTNAME"' );" >> wp-config.php
echo -e "define( 'WP_SITEURL', '"$HOSTNAME"' );" >> wp-config.php
echo -e "define( 'WP_DEBUG', true );" >> wp-config.php

echo "<?php   if (\$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') { define('FORCE_SSL_ADMIN', true); \$_SERVER['HTTPS'] = 'On';}?>"  | cat - wp-config.php > temp && mv temp wp-config.php

php -S 0.0.0.0:8080
