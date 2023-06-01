<?php
require 'path/to/PHPMailer/PHPMailerAutoload.php';

// Retrieve form data
$companyName = $_POST['companyName'];
$userName = $_POST['userName'];
$phoneNumber = $_POST['phoneNumber'];
$paymentState = $_POST['paymentState'];
$productNames = $_POST['productName'];
$productCodes = $_POST['productCode'];
$productPrices = $_POST['productPrice'];

// Configure PHPMailer
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'z.zardiny0@gmail.com'; // Replace with your Gmail email address
$mail->Password = 'N@ss@h68'; // Replace with your Gmail password

// Set the email parameters
$mail->setFrom('z.zardiny0@gmail.com', 'hasan zare'); // Replace with your email address and name
$mail->addAddress('z.zardiny@gmail.com'); // Replace with the recipient email address
$mail->Subject = 'New Company Form Submission';
$mail->Body = "Company Name: $companyName\n";
$mail->Body .= "User Name: $userName\n";
$mail->Body .= "Phone Number: $phoneNumber\n";
$mail->Body .= "Payment State: $paymentState\n";

$mail->Body .= "\nProduct List:\n";
for ($i = 0; $i < count($productNames); $i++) {
  $productName = $productNames[$i];
  $productCode = $productCodes[$i];
  $productPrice = $productPrices[$i];
  $mail->Body .= "Product " . ($i + 1) . ": $productName (Code: $productCode, Price: $productPrice)\n";
}

// Send the email
if ($mail->send()) {
  echo "Thank you for your submission! We will contact you shortly.";
} else {
  echo "Oops! Something went wrong. Please try again later.";
}
?>
