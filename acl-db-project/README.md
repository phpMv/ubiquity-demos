# acl-db-project

This README outlines the details of collaborating on this Ubiquity application.
A short introduction of this app could easily go here.

## Prerequisites

You will need the following things properly installed on your computer.

* php >=7.4
* [Git](https://git-scm.com/)
* [Composer](https://getcomposer.org)
* [Ubiquity devtools](https://ubiquity.kobject.net/)

## Installation

* `git clone <repository-url>` this repository
* `cd acl-db-project`
* `composer install`

## ACLs initialization
* Create an empty Mysql database: **acl-tests**
* Run `Ubiquity bootstrap dev` from the **acl-db-project** folder

## Running / Development

* `Ubiquity serve`
* Visit your app at [http://127.0.0.1:8090](http://127.0.0.1:8090).
* The ACLs defined in the database are automatically added during the first query to [http://127.0.0.1:8090/withAcl/](http://127.0.0.1:8090/withAcl/)

### devtools

Make use of the many generators for code, try `Ubiquity help` for more details

### Optimization for production

Run:
`composer install --optimize --no-dev --classmap-authoritative`

### Deploying

Specify what it takes to deploy your app.

## Further Reading / Useful Links

* [Ubiquity website](https://ubiquity.kobject.net/)
* [Guide](http://micro-framework.readthedocs.io/en/latest/?badge=latest)
* [Doc API](https://api.kobject.net/ubiquity/)
* [Twig documentation](https://twig.symfony.com)
* [Semantic-UI](https://semantic-ui.com)
