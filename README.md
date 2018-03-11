# Simple SQL Injection Training App

## Introduction

**This is an extremely vulnerable application. Please do not deploy in production or host it on the Internet. You are responsible for this application and what you do with it.**

This is a simple PHP application with multiple pages to demonstrate and learn SQL Injection.

The PHP code is extremely primitive but clearly demonstrates the vulnerability and can be used to teach the various kinds of SQL injection in a hands on class.

The `sqlictf` folder can be deployed independently if you simply want to play the challenges.

## Setup

The application requires PHP and MySQL/MariaDB. The server could be nginx or Apache. 
[Here's a link to set up Apache, MySQL and PHP on Ubuntu 14.04](https://www.digitalocean.com/community/tutorials/how-to-install-lamp-on-ubuntu-14-04-quickstart)

- Go to `/resetdb.php` to setup the application.
- To complete the OS command execution level, set the `uploads` directory with `chmod 777`.

## DB variables

If your MySQL/MariaDB credentials are different than 'root' and 'root' (which ideally should be), then update the following files as well
* db_config.php
* resetdb.php
* sqlictf/db_config.php
* sqlictf/resetdb.php

## Walkthrough

The different inputs for each of the links can be found in `walkthrough.md`

## Reset DB

To reset the database, navigate to `/resetdb.php`

## Credits

- Shout out to the [@null0x00](https://twitter.com/null0x00) community.
- This application was initially developed for a SQL Injection humla session conducted [@nullblr](https://twitter.com/nullblr) 