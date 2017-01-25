<?php
require_once('./recurringPayments.php');

$users = array(
    array('userId' => 238342)
);

/** Subscription is an assoc array with name, price and vat */
$subscription = array(
    'name' => 'Ants Monthly',
    'price' => 9900,
    'vat' => 2400
);
/**/

/** Charging the users, and printing a report */
foreach ($users as $user) {
    $result = chargeUserForSubscription($user, $subscription);
    echo formatOrder($result) . "\n";
}
/**/
