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

`cd app`

`composer install`
#### database
`composer recreate-db`
#### run tests
`bin/phpunit`

#### got to web
`http://localhost:8088/`

### RECRATE DATABASE
`composer recreate-db`

