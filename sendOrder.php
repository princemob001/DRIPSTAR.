<?php
$data = json_decode(file_get_contents("php://input"), true);

$orderDetails = "";
foreach ($data as $item) {
    $orderDetails .= $item['product']." (Size: ".$item['size'].") x ".$item['quantity']." = $".($item['price']*$item['quantity'])."\n";
}

$to = "yourshopemail@example.com"; 
$subject = "New Dripstar Fashion Order";
$message = "You have a new order:\n\n".$orderDetails;
$headers = "From: no-reply@dripstar.com";

if(mail($to, $subject, $message, $headers)) {
    echo "✅ Order sent to your email!";
} else {
    echo "❌ Failed to send order email.";
}
?>
