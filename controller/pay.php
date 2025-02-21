<?php 
require "payment.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $number = $_POST['number'];
  $email = $_POST['email'];
  $jina = $_POST['name'];
  $kiasi = $_POST['amount'];

  $hatua = new payment();
  $response = $hatua->pay($name, $email, $number, $kiasi);
  echo json_encode($response );
}
?>
