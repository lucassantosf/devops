# Heroku Deployment Guide for Laravel Applications

## Overview
This guide provides step-by-step instructions for deploying a Laravel application to Heroku, covering authentication, configuration, database setup, and deployment.

## Prerequisites
- Heroku CLI installed
- Git installed
- Heroku account
- Laravel project ready for deployment

## Deployment Steps

### 1. Heroku Login
```bash
heroku login
```

### 2. Create Procfile
Create a `Procfile` in the project root with Apache configuration:
```
web: vendor/bin/heroku-php-apache2 public/
```

### 3. Create Heroku App
```bash
# Create app with a specific name
heroku apps:create fut-agenda
```

### 4. Verify Git Remote
```bash
git remote -v
```

### 5. Deploy to Heroku
```bash
git push heroku master
```

## Environment Configuration

### Set Environment Variables
#### Method 1: Heroku Web Interface
- Navigate to app settings
- Go to "Config Vars"
- Add variables: 
  - APP_DEBUG
  - APP_KEY
  - APP_NAME
  - APP_ENV
  - APP_URL

#### Method 2: Heroku CLI
```bash
# Example of setting an environment variable
heroku config:add APP_NAME=FutAgenda
```

## Database Setup

### Create Heroku Postgres Database
- In Heroku web interface, go to Resources
- Add Heroku Postgres add-on

### Retrieve Database Credentials
```bash
# Get database connection URL
heroku pg:credentials:url
```

### Configure Database Connection
```bash
# Set database configuration variables
heroku config:add DB_CONNECTION=pgsql
heroku config:add DB_HOST=ec2-52-5-247-46.compute-1.amazonaws.com
heroku config:add DB_PORT=5432
heroku config:add DB_DATABASE=dbj3b962sgtp0n
heroku config:add DB_USERNAME=orrcrtdjzvgqis
heroku config:add DB_PASSWORD=your_password_here
```

## Run Migrations

### Method 1: Connect to Heroku Server
```bash
# Connect to Heroku bash
heroku run bash

# Run migrations
php artisan migrate
```

### Method 2: Direct Migration
```bash
# Run migrations directly
heroku run php artisan migrate
```

## Useful Heroku Commands

### Application Management
```bash
# List Heroku apps
heroku apps

# Open application
heroku open

# View logs
heroku logs --tail
```

## Best Practices
- Always use environment variables for sensitive information
- Keep `.env` file out of version control
- Use Heroku add-ons for extended functionality
- Monitor application logs regularly

## Troubleshooting
- Check Heroku logs for deployment and runtime errors
- Ensure all dependencies are correctly specified in `composer.json`
- Verify environment configurations

## Resources
- [Heroku Laravel Deployment Guide](https://devcenter.heroku.com/articles/getting-started-with-laravel)
- [Laravel Documentation](https://laravel.com/docs/)
- [Heroku CLI Commands](https://devcenter.heroku.com/articles/heroku-cli-commands)

## Contribution
Improvements and additional deployment tips are welcome.
