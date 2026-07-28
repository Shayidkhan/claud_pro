<?php

include "config/db.php";

header("Content-Type: application/json");

// ==========================
// Search by ID
// ==========================
if(isset($_POST['id']) && $_POST['id'] != "")
{
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM employee_details WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
        echo json_encode($result->fetch_assoc());
    }
    else
    {
        echo json_encode([
            "status"=>false,
            "message"=>"Record Not Found"
        ]);
    }

    exit;
}



// ==========================
// Search by Mobile Number
// ==========================

if(isset($_POST['phone']) && $_POST['phone'] != "")
{

    $phone = trim($_POST['phone']);

    $stmt = $conn->prepare("SELECT * FROM employee_details WHERE phone=?");

    $stmt->bind_param("s",$phone);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {

        echo json_encode($result->fetch_assoc());

    }
    else
    {

        echo json_encode([
            "status"=>false,
            "message"=>"Mobile Number Not Found"
        ]);

    }

    exit;

}



// ==========================
// Invalid Request
// ==========================

echo json_encode([
    "status"=>false,
    "message"=>"Invalid Request"
]);

?>