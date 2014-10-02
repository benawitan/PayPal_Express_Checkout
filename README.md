# Using the PayPal Express Checkout API in PHP to make a PayPal payment

Built on https://github.com/commercefactory/005-paypal-express-checkout-php

This is an example of the PayPal Express Checkout API using plain PHP to make a 
1. PayPal payment
2. Recurring Payment
3. Reference Transaction - Variable future payment

This code does not use an SDK although it uses a basic wrapper to handle the NVP API. You can use [this library](includes/paypal.php) as a drop in for your project.

## Technology

This demo uses

* PHP

## Running the demo

* Run `php -S 127.0.0.1:8080` to start the app (requires PHP 5.4 or above) or load it in your web server of choice.
* Visit `http://127.0.0.1:8080/` in your browser
* Visit index.html
* Click on the links
* You will be redirected to PayPal
* Login using the following credentials:
  * Username: `tancy123@gmail.com`
  * Password: `test1234`
* Complete the payment instructions
* You will receive a message that says __"Payment completed"__
* Verify sandbox account transactions in http://sandbox.paypal.com against the login credentials above

## Useful link

* [List of methods available on the Merchant API](https://developer.paypal.com/docs/classic/api/#merchant)
