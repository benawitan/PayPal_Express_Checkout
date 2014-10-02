<?php

require('includes/config.php');
require('includes/paypal.php');

$paypal = new PayPal($config);

$result = $paypal->call(array(
  'method'  => 'SetExpressCheckout',
  'paymentrequest_0_paymentaction' => 'Authorization',
  'paymentrequest_0_amt' => '0',
  'paymentrequest_0_currencycode' => 'USD',
  'l_billingtype0' =>  'MerchantInitiatedBilling',
  'l_billingdescription0' => 'SAAS Usage',
  'returnurl'  => 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/referencetransaction_success.php',
  'cancelurl'  => 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/cancel.php',
));

if ($result['ACK'] == 'Success') {
  $paypal->redirect($result);
} else {
  echo 'Handle the payment creation failure <br>';
}