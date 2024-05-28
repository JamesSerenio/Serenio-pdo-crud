<?php
// Import ng iyong PDO configuration file kung mayroon.
require_once 'config.php';

// Tiyakin na ang form ay na-submit bago kunin ang mga input.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kunin ang mga input mula sa form.
    $productName = $_POST['product_name'];
    $totalAmount = $_POST['total_amount'];
    $paymentMethod = $_POST['payment_method'];

    // Tiyakin na ang mga required fields ay hindi blanko.
    if (!empty($productName) && !empty($totalAmount) && !empty($paymentMethod)) {
        try {
            // Ihanda ang SQL statement para sa pag-insert ng payment transaction.
            $stmt = $pdo->prepare("INSERT INTO payments (product_name, total_amount, payment_method) VALUES (:product_name, :total_amount, :payment_method)");

            // Bind ng mga parameter.
            $stmt->bindParam(':product_name', $productName);
            $stmt->bindParam(':total_amount', $totalAmount);
            $stmt->bindParam(':payment_method', $paymentMethod);

            // Execute ang query.
            $stmt->execute();

            // I-output ang JavaScript para ipakita ang modal pagkatapos ng successful transaction.
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo 'var myModal = new bootstrap.Modal(document.getElementById("successModal"));';
            echo 'myModal.show();';
            echo '});';
            echo '</script>';
        } catch (PDOException $e) {
            // I-handle ang mga error sa database.
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Maglabas ng error message kung ang mga required fields ay blanko.
        echo "Error: Please fill out all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Import ng Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   /* Custom styles for modal */
.modal-dialog {
    max-width: 600px;
    margin: 30px auto; /* Lulagay sa gitna ng screen */
}

/* Form styles */
form {
    max-width: 500px;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
h2 {
            text-align: center;
        }
</style>
<body>
    <h2>Payment Form</h2>
    <form action="payment.php" method="post">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br><br>
        
        <label for="total_amount">Total Amount:</label><br>
        <input type="number" id="total_amount" name="total_amount" step="0.01" required><br><br>
        
        <label for="payment_method">Payment Method:</label><br>
        <select id="payment_method" name="payment_method" required>
            <option value="PayMaya">PayMaya</option>
            <option value="PayPal">PayPal</option>
            <option value="GCash">GCash</option>
            <option value="Credit Card">Credit Card</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <!-- Modal para sa successful transaction -->
    <div class="modal" id="successModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Transaction Successful!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p>Your payment transaction has been successfully recorded.</p>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="address.php" class="btn btn-primary">Proceed to Address</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Import ng Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Kunin ang mga detalye ng produkto mula sa URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('product_name');
    const totalAmount = urlParams.get('amount'); // Baguhin mula sa 'total_amount' papunta sa 'amount'

    // I-set ang mga detalye ng produkto sa mga field ng form
    document.getElementById('product_name').value = productName || '';
    document.getElementById('total_amount').value = totalAmount || '';
</script>
</script>
</body>
</html>
