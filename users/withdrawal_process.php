<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $withdrawalAmount = filter_input(INPUT_POST, 'withdrawal_amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if (!$withdrawalAmount || $withdrawalAmount <= 0) {
        echo "<p class='text-red-500'>Invalid withdrawal amount.</p>";
        exit();
    }

    $withdrawalMethod = $_POST['withdrawal_method'];

    $tableName = ($withdrawalMethod == 'naira') ? 'naira' : 'usdt';
    $balanceField = ($withdrawalMethod == 'naira') ? 'Naira_Balance' : 'USDT_Balance';

    $query = "SELECT $balanceField FROM $tableName WHERE user_id = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->bind_result($balance);
        $stmt->fetch();
        $stmt->close();

        if ($balance < $withdrawalAmount) {
            echo "<p class='text-red-500'>Insufficient balance.</p>";
        } else {
            $newBalance = $balance - $withdrawalAmount;
            $updateQuery = "UPDATE $tableName SET $balanceField = ? WHERE user_id = ?";
            if ($updateStmt = $mysqli->prepare($updateQuery)) {
                $updateStmt->bind_param("ds", $newBalance, $_SESSION['user_id']);
                $updateStmt->execute();
                $updateStmt->close();

                echo "<p class='text-green-500'>Withdrawal successful. Your new balance is $newBalance $withdrawalMethod.</p>";

                $insertQuery = "INSERT INTO withdrawal_history (user_id, withdrawal_method, amount) VALUES (?, ?, ?)";
                if ($insertStmt = $mysqli->prepare($insertQuery)) {
                    $insertStmt->bind_param("ssd", $_SESSION['user_id'], $withdrawalMethod, $withdrawalAmount);
                    $insertStmt->execute();
                    $insertStmt->close();
                }
            } else {
                echo "<p class='text-red-500'>Error processing withdrawal.</p>";
            }
        }
    } else {
        echo "<p class='text-red-500'>Error processing withdrawal.</p>";
    }
}
?>
