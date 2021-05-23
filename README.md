## About Wally's Widgets

Wally's Widgets is an application that lets the user calculate how many packs of various sizes he needs to send widgets
for the lowest cost.

If an amount cannot be fully satisfied by the current set of packs, the website will suggest to send the lowest possible
number of widgets on top of it.

E.g. if you want to send 700 widgets, but your packs only come in sizes 500 or 250, it will send one of 500 and one of
250 (so a loss of 50);

Also, whenever possible, the application should choose to send as few packs as possible (so 500 + 250 instead of 250 +
250 + 250);

If this project were to be any bigger, it would be worth to come up with a cost metric to calculate how much we actually
lose on sending such a package, however this seems to be out of scope for this scale.

### Deployment
To wind the application after cloning from github:

``composer install``

To create the tables in the database:
``php artisan migrate``

To seed the database:
``php artisan seed``

To test it:

`` php artisan test``

There are 2 tests created called DispatchmentTest and PackSizeHelperTest that test the functionality of the website. Other tests were provided by default.

Please remember to seed the database prior to using the app from the web interface.

The interface is available at the main page (so for ``php artisan serve`` its ``localhost:8000``).

Hope you have a good day!
