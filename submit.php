<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    $query = "INSERT INTO USER (name, phone_number) VALUES ('" . $_POST['name'] . "', '" . $_POST['phone_number'] . "')";

    $bias_counts_res = mysqli_query($conn, $query);
    mysqli_close($conn);
    $response = array('status'=> true, 'msg'=>'success');
    echo json_encode($response);
?>