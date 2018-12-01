<?php
    $orderid = $_GET['id'];
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    $dbname = "www_project";
    $conn = mysqli_connect("localhost", "root", "", $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // sql to delete a record
    $sql = "DELETE FROM orders WHERE orderid = $orderid"; 
    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: pengembalian.php'); //If book.php is your main page where you list your all records
        exit;
    } else {
        echo "Error deleting record";
    }

    
?>