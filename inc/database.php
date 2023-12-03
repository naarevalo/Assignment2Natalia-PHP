<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=employee2', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
    error_log("Connection failed: " . $e->getMessage(), 0);
    echo "Connection failed. Please try again later.";
}

class EmployeeDatabase {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function insertData($name, $employee_position, $salary, $phone, $image) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO user2 (name, employee_position, salary, phone, image) VALUES (:name, :employee_position, :salary, :phone, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':employee_position', $employee_position);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
        } catch (PDOException $e) {
          
            error_log("Insert failed: " . $e->getMessage(), 0);
            echo "Insert failed. Please try again.";
        }
    }

    public function displayData() {
        try {
            $stmt = $this->conn->query("SELECT * FROM user2");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            
            error_log("Display data failed: " . $e->getMessage(), 0);
            echo "Display data failed. Please try again.";
            return null;
        }
    }

    public function displayRecordById($id)
    {
        $query = "SELECT * FROM user2 WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function updateRecord($uname, $uemployee_position, $usalary, $uphone, $uimage, $id)
    {
        $query = "UPDATE user2 SET name = '$uname', employee_position = '$uemployee_position', salary = '$usalary', phone = '$uphone', image = '$uimage' WHERE id = '$id'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location:index2.php?msg2=update");
        } else {
            echo "Registration updated failed try again!";
        }
    }

    public function deleteRecord($id)
    {
        try {
            $query = "DELETE FROM user2 WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                header("Location: index2.php?msg3=delete");
            } else {
                echo "Record does not delete. Please try again.";
            }
        } catch (PDOException $e) {
            
            error_log("Delete failed: " . $e->getMessage(), 0);
            echo "Delete failed. Please try again. Error: " . $e->getMessage();
        }
    }
    
}
?>
