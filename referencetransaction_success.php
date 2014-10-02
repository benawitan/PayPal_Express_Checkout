<?php

require('includes/config.php');
require('includes/paypal.php');

$paypal = new PayPal($config);

$result = $paypal->call(array(
  'method'  => 'CreateBillingAgreement',
  'token'  => $_GET['token'],
));

if ($result['ACK'] == 'Success') {
  echo 'Billing Agreement completed';
  $myfile = fopen("newfile.txt", "w") or die("Unable to open file!"); 
  $txt = $result['BILLINGAGREEMENTID']; 
  fwrite($myfile, $txt); #Store BillingAgreement ID on a file in this sample use case
  fclose($myfile);
} else {
  echo 'Creation of Billing Agreement failed';
}