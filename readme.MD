#### Setup environment
Please do the following steps:
- `cp .env.dist .env` and set properly configuration options
- `composer install`
- `cp behat.yml.dist behat.yml` and update `baseUri` option in `behat.yml` file to correct url

#### What is included?
- symfony 4 application
- behat and phpunit tests
- api requests and response architecture

#### Build API Request Notes

- define handler for each api request
- define const variable in `DataHandler` class with value = `ApiObject::class`
- request data is mapped to object which should implement `ApiObjectInterface`
- please define serialization groups and validation rules inside `ApiObject`
- `ApiObject` doesn't have to be an entity, we can use any object like in symfony forms
- handler can return array or string, to get data from `ApiObject` please use serialization with `JMS\Groups` option

