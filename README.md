# RESTShoppingList

This is a work in progress backend project.

## requironments
* PHP-5
* php-sqlight
* composer

## hot wo use it
first of all, open a shell and *cd* to the *RESTShoppingList*-folder
you have to install the composer dependencies
`composer install` or `composer up`
after tat, you can run it with the *PHP Built-in web server*
`php -S localhost:8000`
you can run the API tests to check, if everything works like intendet
`codecept run` or `vendor/codeception/codeception/codecept run`

## What is it about?
I hate to write paper lists for supermarket, so this is my REST list for the supermarket.

## How dose it work?
There are two routs implemented.

| Routs                     | description |
| ------------------------- | ----------- |
| `"GET /rels"`             |brings you a complete List of all useable REST interfaces |
| `"GET /list/elements"`    |returns your full shopping list |
| `"POST /list/elements"`   |adds one element to your list - if you wont to show more, you need to access it more often. Just REST-Style |
| `"DELETE /list/elements"` |deletes exactly one element |

## Where can I find a full documentation of the API?
The best documentation is a projects tests, so don't be shy and check the
API-Acceptance tests to get a fealing of how this small incomplete REST project works.

## Where do it saves the Data?
in a sqlight database, located in /data/sqlight/shoppling.sqlight

## What is the default user?
well, this is still in progress an a userhandling is not implemented yet.
If you want to run it on a live environment, you need to add a .htaccess authorisation.
But in fact, that there is no Frontend, I don't think, it will be used on live in the
verry next time.

## Will you extend it?
Sure, this is my baby! Thare will be a Frontend, an authorisation, I will add the ability
to administrate serveral lists and maybe there will be a way to COOP use the lists.

## I found a bug!
what a pitty, tell me on [XING](https://www.xing.com/profile/Steffen_Kluetsch)

## I didn't found a bug!
Much better, also tell me that ;)


