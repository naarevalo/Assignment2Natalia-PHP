<?php

require './inc/database.php';

$employeeObj = new EmployeeDatabase(); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EmployeeHub</title>
    <meta name="author" content="Natalia Arevalo" />
    <meta name="description" content="A concise and accurate summary of the document content is to appear here">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/3058002332.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="menu-bar">
                <i class="fas fa-bars" id="menu-bar"></i>
            </div>
            <img src="images/in.png" class="logo" alt="Logoinge">
            <ul class="sidebar" id="menu">
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main class="container2">
    <?php
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
      }
    
      ?>
    <section>
      <h2>
      <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
      </h2>
      <table class="table table-hover table-dark table-striped">
    
        <thead>
        <tr>
          <th>Name</th>
          <th>Employee Position</th>
          <th>Salary</th>
          <th>Phone</th>
          <th>ID Photo</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $employees = $employeeObj->displayData();
        if ($employees != null) {
          foreach ($employees as $employee) {
          ?>
          <tr>
            <td><?php echo $employee['name'] ?></td>
            <td><?php echo $employee['employee_position'] ?></td>
            <td><?php echo $employee['salary'] ?></td>
            <td><?php echo $employee['phone'] ?></td>
            <td><?php echo $employee['image'] ?></td>
            <td>
              <button class="btn btn-danger"><a href="edit.php?editId=<?php echo $employee['id'] ?>">
                  <i class="fa fa-pencil text-white" ></i></a></button>
              <button class="btn btn-danger">
    <a href="<?php echo "delete.php?deleteId=" . $employee['id']; ?>" onclick="return confirm('Are you sure?'); return false;">
        <i class="fa fa-trash text-white"></i>
    </a>
</button>



            </td>
          </tr>
        <?php } }?>
        </tbody>
      </table>
    </section>

    
</main>
</body>
</html>