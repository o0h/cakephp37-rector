# Rector Service for CakePHP 3.7

Rector for migration cakephp app to 3.7

## Install
composer reuqire --dev o0h/cakephp37-rector

## Setup
Set rector.yaml like bellow.

```yaml
parameters:
  autoload_paths:
    - './vendor/autoload.php'
    - './tests/bootstrap.php'
services:
    O0h\CakePHP37Rector\Rector\FixtureName\SnakeToCamel: ~
```
## Run
```sh
vendor/bin/rector process .
```

## See also
* [dereuromark/upgrade: Upgrade tools for CakePHP meant to facilitate migrating from one version of the framework to another](https://github.com/dereuromark/upgrade)
* [CakePHP 3\.6 is coming – DerEuroMark](https://www.dereuromark.de/2018/03/14/cakephp-3-6-is-coming/)
* [rector/cakephp37\.yaml at master · rectorphp/rector](https://github.com/rectorphp/rector/blob/master/config/level/cakephp/cakephp37.yaml)

