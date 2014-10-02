<?php

require('includes/config.php');
require('includes/paypal.php');

$paypal = new PayPal($config);

$result = $paypal->call(array(
  'method'  => 'SetExpressCheckout',
  'L_BILLINGTYPE0' => 'RecurringPayments',
  'L_BILLINGAGREEMENTDESCRIPTION0' => 'FitnessMembership for 19.99 per month',
  'returnurl'  => 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/recurring_success.php',
  'cancelurl'  => 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/cancel.php',
));

if ($result['ACK'] == 'Success') {
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure <br>';
}