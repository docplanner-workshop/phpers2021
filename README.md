# phpers2021
PHPers Summit 2021 - Modular monolith unicorn

## SETUP PROJECT

#### clone repository
`git clone git@github.com:docplanner-workshop/phpers2021.git`
#### go to project directory
`cd phpers2021`
#### up project
`docker-compose up -d`
#### go into container
`docker-compose exec backend bash`
#### create schema
`bin/console d:s:u -f`
#### load fixtures
`bin/console d:f:l --no-interaction`
#### run tests
`bin/phpunit`
`OK (1 test, 2 assertions)`

### RECRATE DATABASE

#### drop schema
`bin/console d:s:d -f`
#### create schema
`bin/console d:s:u -f`
#### fixtures load
`bin/console d:f:l --no-interaction`
