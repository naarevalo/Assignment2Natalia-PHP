<?php

require './inc/database.php';

$employeeObj = new EmployeeDatabase(); 

if(isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    
    try {
        $employeeObj->deleteRecord($deleteId);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
