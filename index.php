<?php
   include "./connection.php";
    //user login
   if(!empty($_POST["login"])){
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    $sql = "select * from user where email='$email' and password='$password'";
    $result = mysqli_query($con,$sql);
        if(mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["email"] = $email;
            ?>
            <script>
                alert("Login successfully!");
                window.location.href="welcome.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Please enter correct details?");
                window.location.href="index.php";
            </script>
            <?php
        }
    }

    // user registration
   if(!empty($_POST["register"])){

    $email = $_POST["email"];
    $password = $_POST["cpassword"];

    $sql = "select * from user where email='$email'";
    $result = mysqli_query($con,$sql);

    if(mysqli_fetch_assoc($result)){
        ?>
        <script>
            alert("User already exists?");
            window.location.href="index.php";
        </script>
        <?php
    }else{

        $sql2 = "insert into user values('null','$email','$password')";
        $result2 = mysqli_query($con,$sql2);
        if($result2){
            ?>
            <script>
                alert("Registration Successfull!");
                window.location.href="index.php";
            </script>
            <?php
        }
       
    }
   }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Internshala</title>
</head>
<script>
    function passHelp(){
        document.getElementById("passhelp").innerHTML = "Password should be 8 characters!"
    }
    function passWarn(){
        let pass = document.getElementById("password").value;
        let cpass = document.getElementById("cpassword").value;
        if(pass!=cpass){
            document.getElementById("passwarn").innerHTML = "Password must be same?";
            document.getElementById("register").disabled=true;
        }else{
            document.getElementById("passwarn").innerHTML = "";
            document.getElementById("register").disabled=false;   
        }
    }
</script>
<body>
    <!-- HERO -->
    <section class="d-flex flex-column justify-content-center align-items-center">

        <div class="bg-overlay"></div>

        <div class="container shadow m-4">
            <div class="row p-4">
                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h1 class="text-warning">Intershala Project</h1>
                        <hr>
                        <button type="button" class="btn btn-success bordered mt-3 px-4 py-3 rounded-pill "
                            data-bs-toggle="modal" data-bs-target="#LoginexampleModal">
                            Login
                        </button>
                        <button type="button" class="btn btn-outline-primary bordered mt-3 px-4 py-3 rounded-pill "
                            data-bs-toggle="modal" data-bs-target="#RegisterexampleModal">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Modal -->
    <div class="modal fade" id="LoginexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="loginEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="login" value="Login" class="btn btn-primary">Login</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration module -->
    <div class="modal fade" id="RegisterexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <span id="passhelp" class="text-muted"></span>
                          <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" maxlength="8" minlength="8" name="password" class="form-control" id="password" onclick="passHelp()" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                          <span id="passwarn" class="text-danger"></span>
                          <input type="password" maxlength="8" minlength="8" name="cpassword" class="form-control" id="cpassword" onkeyup="passWarn()" required>
                        </div>
                        <button type="submit" value="Register" name="register" class="btn btn-primary" id="register">Register</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>