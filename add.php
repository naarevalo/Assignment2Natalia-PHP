<?php

require './inc/database.php';


$userObj = new EmployeeDatabase(); 


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
        <h1>Enter new employee information</h1>
    </header>

  <section class="container2">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header2 bg-dark text-white">
            <br>
            <br>
            <h2>Enter Details for the New Team Member:</h2>
          
          </div>
          <br>
          <br>
          <div class="card-body bg-light">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control2" name="name" placeholder="Enter name" required="">
              </div>
              <div class="form-group">
                <label for="position">Employee Position:</label>
                <input type="text" class="form-control2" name="employee_position" placeholder="Enter employee position" required="">
              </div>
              <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control2" name="salary" placeholder="Enter Salary" required="">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control2" name="phone" placeholder="Enter phone" required="">
              </div>
              <div class="form-group">
                <label for="image">ID photo:</label>
                <input type="file" name="image" />
              </div>

              <br>
              <br>
      
              <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
              <button type="button" class="return-button" onclick="goBack()">Back</button>
            </form>
            <script>
              function goBack() {
                window.history.back();
              }
            </script>
            <?php
              
              if (!empty($_POST)) {
                  $name = $_POST['name'];
                  $employee_position = $_POST['employee_position'];
                  $salary = $_POST['salary'];
                  $phone = $_POST['phone'];
                  $image = $_FILES['image']['name'];
                  
                  move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

                
                  $userObj->insertData($name, $employee_position, $salary, $phone, $image);
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <div class="footer-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i>Facebook</a>
                    <a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a>
                    <a href="#"><i class="fa-brands fa-twitter"></i>Twitter</a>
                </div>
                <div class="footer-text">
                    <p><small>© AmbiSolutions. All Rights Reserved</small></p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
