## Readme
1.  Clone the repo
2.  Do composer install
3.  Copy the .env.dist to .env and change the database data at the end of the file
4.  Run the following command: `bin/console doctrine:migrations:migrate`
5.  Run  `php bin/console ckeditor:install`
6.  Run  `php bin/console assets:install --symlink`
7.  Do a yarn install and yarn build

## Configuring the admin

Go to config/packages/easy_admin.yaml and change the settings there
