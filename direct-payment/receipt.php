<?php
session_start();
$user = $_SESSION['user'];

if (!$user) {
    header('Location: /');
    die();
}

/** Order status codes */
$statuses = array(
    "-3" => "Expired",
    "-2" => "Cancelled",
    "-1" => "Failed",
    "0" => "Created",
    "1" => "Pending",
    "2" => "Complete",
    "3" => "Credited",
    "4" => "Authorized"
);
/**/

/** Payment identifier types */
$identifiers = array(
    "2" => "Credit card",
    "4" => "SMS",
    "8" => "PayEx Invoice",
    "16" => "Voucher",
    "32" => "Klarna Invoice"
);
/**/

function getOrderStatus($status) {
    global $statuses;
    return $statuses[$status];
}

function getPaymentIdentifierType($identifierType) {
    global $identifiers;
    return $identifiers[$identifierType];
}
?><!DOCTYPE html>
<html>
  <head>
    <title>Success!</title>
  </head>
  <!-- Simple receipt -->
  <body>
    <h1>Success!</h1>
    <p>
      Order <?php echo $order['clientReference'] ?> is
      <strong><?php echo getOrderStatus($order['status']) ?></strong>
    </p>
    <p>
      Captured <?php echo $order['currency'] ?> <?php echo $order['capturedAmount'] / 100 ?>
      from <?php echo getPaymentIdentifierType($order['identifierType']) ?>.
    </p>
  </body>
  <!---->
</html>
