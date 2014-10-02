<?php

require('includes/config.php');
require('includes/paypal.php');

$paypal = new PayPal($config);

$result = $paypal->call(array(
  'method'  => 'GetExpressCheckoutDetails',
  'token'  => $_GET['token'],
));

if ($result['BILLINGAGREEMENTACCEPTEDSTATUS'] == '1') {
  		$result_2 = $paypal->call(array(
  		'method'  => 'CreateRecurringPaymentsProfile',
  		'email' => $result['EMAIL'],
  		'payerid' => $result['PAYERID'],
  		'token'  => $result['TOKEN'],
  		'profilestartdate' => '2014-10-03T00:00:00Z', #must be after today's datetime
  		'desc' => 'FitnessMembership for 19.99 per month',
  		'billingperiod' => 'Month',
  		'billingfrequency' => '1',
  		'amt' => '19.99',
  		'currencycode' => 'USD',
  		'countrycode' => 'US',
  		'maxfailedpayments' => '3',
  		'street' => $result['PAYMENTREQUEST_0_SHIPTOSTREET'], 
  		'city' => $result['PAYMENTREQUEST_0_SHIPTOCITY'], 
  		'state' => $result['PAYMENTREQUEST_0_SHIPTOSTATE'],
  		'zip' => $result['PAYMENTREQUEST_0_SHIPTOZIP'],
		));
		if ($result_2['PROFILESTATUS'] == 'ActiveProfile') {
			echo 'Success';
		}
		else{
			echo 'CreateRecurringPaymentsProfile Failure';
		}
		echo 'Token: ' . $result['TOKEN'];
		echo 'Email: ' . $result['EMAIL'];
		echo 'Status: ' . $result_2['ACK'];
		echo 'PROFILEID: ' . $result_2['PROFILEID'];
		echo 'PROFILESTATUS: ' . $result_2['PROFILESTATUS'];

} else {
  echo 'Agreement Acceptance Failure';
}
