# mock_pre_http_request
> :warning: **UNDER CONSTRUCTION** 
> 
> This plugin currently doesnt do anything
- Wordpress has a filter called pre_http_request that is hit on any usage of wp_remote_request and acts a short-curcuit. If the filter returns false it continues,  but if returns an array it doesnt complete the request and returns that array as the response.
## Goal
Make it easier for test frameworks (ie. selnium) to more accurately simulate a production environment via a remote testing server.
## Suggested Development Environment
- PHPStorm :heart:
- composer.json is located in the repo ./ root directory
  - `composer install`
    - Wordpress Core
    - wp-phpunit modified to use a db.php drop-in
    - phpunit 9.5
- docker-compose.yml and Dockerfile located in the repo ./ root directory. 
  - `docker-compose up -d -- build`
    - php:7.4.30-apache
      - xdebug-3.1.5
      - wp-cli (latest)
      - uses cache on parts of volume to speedup mac and windows volume issues
    - phpmyadmin/phpmyadmin:4.7
    - mysql:5.7
      - wordpress username: admin
        - password: password
## Build for Deployment
- Because of the project layout and use of composer packages there are some transformations that I like to happen to prepare a zip file that can be uploaded to Wordpress. 
- Reccomend you read thru the workflow `./github/test_on_push_and_build_if_on_main.yml`
## Credit
There is considerably more credit due than I can list.  Encourage you to look in the composer.json and docker container for all of the packages used,  here are some things not being brought in via that.
- Wordpress SQLite db.php Drop In - https://github.com/aaemnnosttv/wp-sqlite-db
