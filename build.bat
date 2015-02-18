php app/console cache:clear --env=dev
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load --fixtures=src/SlashStudio/AppBundle/DataFixtures/ORM
php app/console assets:install web --symlink
php app/console mopa:bootstrap:symlink:less