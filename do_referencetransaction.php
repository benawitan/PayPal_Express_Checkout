<?php

require('includes/config.php');
require('includes/paypal.php');

$paypal = new PayPal($config);
$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
$transaction_reference = fread($myfile,filesize("newfile.txt"));
fclose($myfile);

$result = $paypal->call(array(
  'method'  => 'DoReferenceTransaction',
  'amt' => '520.00',
  'currencycode' => 'USD',
  'paymentaction' => 'Sale',
  'referenceid' => $transaction_reference
));


if ($result['ACK'] == 'Success') {
  echo $result['AMT'] . " has been deducted.";
} else {
  echo 'Handle the payment creation failure <br>';
}