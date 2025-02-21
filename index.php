<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .payment-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .payment-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .payment-form input[type="text"],
        .payment-form input[type="email"],
        .payment-form input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .payment-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .payment-form button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="payment-form">
        <h2>Payment Form</h2>
        <form action="pay.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="number">Number:</label>
            <input type="text" id="number" name="number" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>

            <button type="submit">Pay</button>
        </form>
    </div>
</body>
</html>
