<?php
use AyubIRZ\PerfectMoneyAPI\PerfectMoneyAPI;

//require "PerfectMoney.php";

$this->load->view('user_pages/PerfectMoney');

$PMAccountID = '9158415';      // This should be replaced with your real PerfectMoney Member ID(username that you login with).

$PMPassPhrase = 'alialialiK9'; // This should be replaced with your real PerfectMoney PassPhrase(password that you login with).

$PM = new PerfectMoneyAPI($PMAccountID, $PMPassPhrase);


$accountID = 'U26779791'; // A valid PM currency account ID that you want to get it's name.

// try{
//   $PMname = $PM->getAccountName($accountID); 
// 	//print_r($PMname);
//   // The account name(if it's valid) will return. Otherwise you have an error.
// } catch (Exception $exception) {
//   return $exception->getMessage();
// }

//$PMbalance = $PM->getBalance(); // array of all your currency wallets(as keys) and all of their balances(as values) will return.

//return json_encode($PMbalance);

//print_r( $PMbalance );

$fromAccount = 'U25299640'; // Replace this with one of your own wallet IDs that you want to transfer currency from.

$toAccount = 'U26779791'; // Replace this with the destination wallet ID that you want to transfer currency to.

$amount = 0.10; // Replace this with the amount of currency unit(in this case 250 USD) that you want to transfer.

$paymentID = microtime(); // Replace this with a unique payment ID that you've generated for this transaction. This can be the ID for the database stored record of this payment for example(Up to 50 characters). ***THIS PARAMETER IS OPTIONAL***

$memo = 'paying from superdoubler.ltd'; // Replace this with a description text that will be shown for this transaction(Up to 100 characters). ***THIS PARAMETER IS OPTIONAL***

$PMtransfer = $PM->transferFund($fromAccount, $toAccount, $amount, $paymentID, $memo); // An array of previously provided data will return for a valid and successful transaction. If any error happen, an array with one item with the key "ERROR" will return.


///parameters Array ( [Payee_Account_Name] => alikumbhar [Payee_Account] => U26779791 [Payer_Account] => U25299640 [PAYMENT_AMOUNT] => 0.1 [PAYMENT_BATCH_NUM] => 348296112 [PAYMENT_ID] => 0.87677700 )

print_r($PMtransfer);
return json_encode($PMtransfer);
?>