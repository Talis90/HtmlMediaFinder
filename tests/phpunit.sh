DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
php $DIR/../vendor/phpunit/phpunit/phpunit -c $DIR/phpunit.xml --coverage-html $DIR/cov/