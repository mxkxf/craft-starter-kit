# Craft CMS Starter Kit

An opinionated [Craft CMS](https://craftcms.com) starter kit, featuring the following:

* Sass pre-processing
* ES6 compilation
* Cache bursting
* Composer managed
* AWS S3 asset management
* Git deploys to Heroku

## Installation

Start by installing [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx), if you don't 
already have it. Then create a new project:

```bash
composer create-project mikefrancis/craft-starter-kit my-new-project
```

Once this is complete you will then need to edit the generated `.env` file to add your project's URL and database and 
S3 credentials.

After completing this step, the final thing to do is to run the database migrations:

```bash
php craft migrate
```

## Development

You can either view your project in the browser or run the following to start a new BrowserSync server: 

```bash
npm run watch
```

This will watch your source files and perform your build tasks, then reload the browser for you. The server will proxy 
to whatever is set as your `APP_URL` in your `.env` file.

## Deployment

When you're ready to share your project, you can deploy it to [Heroku](https://heroku.com) for free (at the time of writing).

First, create a new Heroku app and add the ClearDB add-on:

```bash
heroku create
heroku addons:create cleardb:ignite
heroku config:get CLEARDB_DATABASE_URL
```

From the `CLEARDB_DATABASE_URL`, you will need to extract the following:

```bash
mysql://{$USERNAME}:{$PASSWORD}@{$SERVER}.cleardb.net/{$DATABASE}?reconnect=true
```

And replace the values below with those values:

```bash
heroku config:get CLEARDB_DATABASE_URL
heroku config:set \
 APP_ENV=production \
 APP_KEY=$(openssl rand -base64 32) \
 DB_DRIVER=mysql \
 DB_HOSTNAME=SERVER.cleardb.net \
 DB_USERNAME=USERNAME \
 DB_PASSWORD=PASSWORD \
 DB_DATABASE=DATABASE
```

(We are trying to find a way to automate this!)

Once these environment variables have been published to Heroku, you are ready to push your code. Heroku will then take 
care of installing the dependencies and migrating the database:

```bash
git push heroku master
```

Then you can view your project!

```bash
heroku open
```

## Extending

As we're making use of the fantastic [Laravel Mix](https://laravel.com/docs/5.5/mix) package, you can take advantage of other configurations and build 
tasks enabled, such as:

 * [Copying folders](https://laravel.com/docs/5.5/mix#copying-files-and-directories) (if you are using custom fonts)
 * [Compiling JSX templates](https://laravel.com/docs/5.5/mix#react)

Please check the [docs](https://laravel.com/docs/5.5/mix) for more!
