<?php
session_start(); 

$cookie_name = "book_name"; 

if (isset($_POST['submit'])) { 
    if (empty(trim($_POST['field1']))) {
        echo "Please fill Student Full Name.";
        exit;
    }
    if (empty(trim($_POST['field2']))) {
        echo "Please fill Student ID.";
        exit;
    }
    if (empty(trim($_POST['field3']))) {
        echo "Please fill E-mail.";
        exit;
    }
    if (empty(trim($_POST['field4']))) {
        echo "Please select a Book Title.";
        exit;
    }
    if (empty(trim($_POST['field5']))) {
        echo "Please fill Borrow Date.";
        exit;
    }
    if (empty(trim($_POST['field6']))) {
        echo "Please fill Return Date.";
        exit;
    }
    if (empty(trim($_POST['field7']))) {
        echo "Please fill Token Number.";
        exit;
    }
    if (empty(trim($_POST['field8']))) {
        echo "Please fill Fees.";
        exit;
    }
    if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $_POST['field2'])) {
        echo "Enter a valid Student ID in the format XX-XXXX-X.";
        exit;
    }
    if (!preg_match("/\@+(student)+\.(aiub)+\.(edu)/", $_POST['field3'])) {
        echo "Please Enter a Valid Email.";
        exit;
    }
    if (!preg_match("/^[0-9]+$/", $_POST['field7']) || !preg_match("/^[0-9]+$/", $_POST['field8'])) {
        echo "You have entered an invalid Token Number or Fees amount.";
        exit;
    }

    $borrowDate = strtotime($_POST['field5']);
    $returnDate = strtotime($_POST['field6']);
    if ($borrowDate && $returnDate) {
        $dateDifference = ($returnDate - $borrowDate) / (60 * 60 * 24); 
        if ($dateDifference < 0 || $dateDifference > 10) {
            echo "The return date must be within 10 days of the borrow date! ,,, Please contact the library man or fines will be added";
            exit;
        }
    } else {
        echo "Invalid Borrow or Return Date ";
        exit;
    }

    $student_name = $_POST['field1']; 
    $book_name = $_POST['field4'];    

    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === $book_name) {
        $borrower = $_SESSION['borrower'];
        echo "The book '$book_name' has already been borrowed by $borrower. Please wait 20 seconds.";
        exit;
    } else {
        setcookie($cookie_name, $book_name, time() + 20, "/"); 
        $_SESSION['borrower'] = $student_name;
        echo "The book '$book_name' has been successfully borrowed by $student_name.";
    }

    echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; border: 1px solid #ddd; border-radius: 5px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
    echo "<h2 style='text-align: center; color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px;'>Library Invoice</h2>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'><strong>Hi " . $_POST['field1'] . "</strong>, Good Morning</p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Your ID Number is: <strong>" . $_POST['field2'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Your Email is: <strong>" . $_POST['field3'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Your Book is: <strong>" . $_POST['field4'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Borrow Date: <strong>" . $_POST['field5'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Return Date: <strong>" . $_POST['field6'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Your Token Number is: <strong>" . $_POST['field7'] . "</strong></p>";
    echo "<p style='font-size: 16px; line-height: 1.6; color: #555;'>Your Fees are: <strong>" . $_POST['field8'] . "</strong></p>";
    echo "<p style='text-align: center; margin-top: 20px; font-size: 14px; color: #999;'>Thank you for using our library services!</p>";
    echo "</div>";
}
?>

