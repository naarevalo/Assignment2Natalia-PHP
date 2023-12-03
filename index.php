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

<main>

<div class="container__all">
     
     <!--Form Login and register-->
     <div class="contenedor__login-register">
         <!--Login-->
    <form method="post" action="./inc/validate.php" class="formulario__login">
    <h2>Welcome Back!</h2>
    <br>

    <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
    <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
    <input class="btn btn-light" type="submit" value="Login" />
</form>



         <!--Register-->
         <form method="post" action="save-admin.php" class="formulario__register">
             <h2>New to our platform? Register now to access </h2>
             <br>
             <p><input class="form-control" name="name" type="text" placeholder="First Name" required/></p>
             <p><input class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
             <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
             <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
             <p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
             <input class="btn btn-light" type="submit" name="submit" value="Register" />
         </form>
     </div>
 </div>

</main>

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









