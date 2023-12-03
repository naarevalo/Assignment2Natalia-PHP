<?php
include  './inc/database.php';

$employeeObj = new EmployeeDatabase();


if(!empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $employee = $employeeObj->displayRecordById($editId);
}
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
        <h1>Edit employee information.</h1>
    </header>

  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-primary">
            <h4 class="text-white">Update Records</h4>
          </div>
          <div class="card-body bg-light">
            <form method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $employee['name']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="employee_position">Employee Position:</label>
                <input type="text" class="form-control" name="uemployee_position" value="<?php echo $employee['employee_position']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" name="usalary" value="<?php echo $employee['salary']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="uphone" value="<?php echo $employee['phone']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="image">ID Photo:</label>
                <input type="file" class="form-control" name="uimage" value="<?php echo $employee['image']; ?>" required="">
              </div>

              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
              </div>
            </form>
            <?php
            
            if(!empty($_POST)) {
              $uname = $_POST['uname'];
              $uemployee_position = $_POST['uemployee_position'];
              $usalary = $_POST['usalary'];
              $uphone = $_POST['uphone'];
              $uimage = $_POST['uimage'];
              $id = $_POST['id'];
              $employeeObj->updateRecord($uname, $uemployee_position, $usalary, $uphone, $uimage, $id);
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
