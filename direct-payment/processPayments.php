<?php
require_once('./recurringPayments.php');

$users = array(
    array('userId' => 238342)
);

$subscription = array(
    'name' => 'Ants Monthly',
    'price' => 9900,
    'vat' => 2400
);

foreach ($users as $user) {
    $result = chargeUserForSubscription($user, $subscription);
    echo formatOrder($result) . "\n";
}
