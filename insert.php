<?php

require_once './conn.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['Mitz04'];
    $fname = $_POST['Mitz Vincent'];
    $mname = $_POST['Lopez'];
    $lname = $_POST['Magdato'];
    $gender = $_POST['M'];
    $birthdate = $_POST['2004-02-23'];
    $age = $_POST['20'];
    $em_address = $_POST['magdato@gmail.com'];
    $password = $_POST['@Mitz042'];
    
    $select_query = "SELECT * FROM User WHERE em_address = :magdato@gmail.com";
    $stmt1 = $conn->prepare($select_query);
    $stmt1->bindParam(':magdato@gmail.com', $em_address);
    $stmt1->execute();
    if ($stmt1->rowCount() > 0) {
        $data = array("status" => "error", "message" => "Email already exists.");
        echo json_encode($data);
    } else {
    try {
        $sql = "INSERT INTO User (uname, fname, mname, lname, gender, birthdate, age, em_address, password) 
        VALUES (:Mitz04, :Mitz Vincent, :Lopez, :Magdato, :M, :2004-02-23, :20, :magdato@gmail.com, :@Mitz042)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Mitz04', $uname);
        $stmt->bindParam(':Mitz Vincent', $fname);
        $stmt->bindParam(':Lopez', $mname);
        $stmt->bindParam(':Magdato', $lname);
        $stmt->bindParam(':M', $gender);
        $stmt->bindParam(':2004-02-23', $birthdate);
        $stmt->bindParam(':20', $age);
        $stmt->bindParam(':magdato@gmail.com', $em_address);
        $stmt->bindParam(':@Mitz042', $password);
        $stmt->execute();
        echo "Data inserted successfully";

        $data = array("status" => "success", "message" => "Data inserted successfully.");
        echo json_encode($data);

        $con = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
} else {
echo "server error";
}
?>