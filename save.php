<?php

include "config/db.php";

header('Content-Type: application/json');

function response($status, $message)
{
    echo json_encode([
        "status" => $status,
        "message" => $message
    ]);
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {

    // ==========================
    // SAVE
    // ==========================
    case "save":

        $emp_date     = trim($_POST['emp_date']);
        $emp_type     = trim($_POST['emp_type']);
        $status       = trim($_POST['status']);
        $emp_id       = trim($_POST['emp_id']);
        $name         = trim($_POST['name']);
        $phone        = trim($_POST['phone']);
        $email        = trim($_POST['email']);
        $location     = trim($_POST['location']);
        $availability = trim($_POST['availability']);
        $note         = trim($_POST['note']);

        $check = $conn->prepare("SELECT id FROM employee_details WHERE phone=?");
        $check->bind_param("s", $phone);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            response(false, "Mobile number already exists.");
        }

        $stmt = $conn->prepare("INSERT INTO employee_details
        (emp_date,emp_type,status,emp_id,name,phone,email,location,availability,note)
        VALUES (?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param(
            "ssssssssss",
            $emp_date,
            $emp_type,
            $status,
            $emp_id,
            $name,
            $phone,
            $email,
            $location,
            $availability,
            $note
        );

        if ($stmt->execute()) {
            response(true, "Saved Successfully");
        } else {
            response(false, "Save Failed");
        }

        break;


    // ==========================
    // UPDATE
    // ==========================
    case "update":

        $id = $_POST['id'];

        $emp_date     = trim($_POST['emp_date']);
        $emp_type     = trim($_POST['emp_type']);
        $status       = trim($_POST['status']);
        $emp_id       = trim($_POST['emp_id']);
        $name         = trim($_POST['name']);
        $phone        = trim($_POST['phone']);
        $email        = trim($_POST['email']);
        $location     = trim($_POST['location']);
        $availability = trim($_POST['availability']);
        $note         = trim($_POST['note']);

        $stmt = $conn->prepare("UPDATE employee_details SET

            emp_date=?,
            emp_type=?,
            status=?,
            emp_id=?,
            name=?,
            phone=?,
            email=?,
            location=?,
            availability=?,
            note=?

            WHERE id=?");

        $stmt->bind_param(
            "ssssssssssi",
            $emp_date,
            $emp_type,
            $status,
            $emp_id,
            $name,
            $phone,
            $email,
            $location,
            $availability,
            $note,
            $id
        );

        if ($stmt->execute()) {
            response(true, "Updated Successfully");
        } else {
            response(false, "Update Failed");
        }

        break;


    // ==========================
    // DELETE
    // ==========================
    case "delete":

        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM employee_details WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            response(true, "Deleted Successfully");
        } else {
            response(false, "Delete Failed");
        }

        break;

    default:

        response(false, "Invalid Action");

}