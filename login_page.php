<?php 
    $serverName = "127.0.0.1";
    $userName = "root";
    $password = "";
    $db_name = "nhpc_stock";  
    $conn = new mysqli($serverName, $userName, $password, $db_name);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo " ";
?>
<?php
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from login_table where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: stock.html");
        }  
        else{  
            echo  '<script>
                        window.location.href = "login_page.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        #form {
            background: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #form h1 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

    <div id="form" class="container">
        <h1 class="text-center">Login Form</h1>
        <form name="form" action="login_page.php" onsubmit="return isvalid()" method="POST">
            <div class="mb-3">
                <label for="user" class="form-label">Username:</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" id="btn" value="Login" name="submit">
            </div>
        </form>
    </div>

    <script>
        function isvalid() {
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            if (user.length == "" && pass.length == "") {
                alert("Username and password field is empty!!!");
                return false;
            } else if (user.length == "") {
                alert("Username field is empty!!!");
                return false;
            } else if (pass.length == "") {
                alert("Password field is empty!!!");
                return false;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzN1qUsP6K4xvE1Bj1jeU6Wez5htIChy4D6fI5KI1FZ6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12WJLDFvSc5i4gX+n3p2LrG5/tc1XmgH+Ozcb7AXel77N7Aw" crossorigin="anonymous"></script>
</body>
</html>
