<?php
    session_start();
    $login=false;
    $showError = false;
    if(isset($_SESSION['loggedin']))
    {
        header("location: form.php");
        exit;
    } 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include('dbcon.php');
        $email=$_POST["email"];
        $password=$_POST['password'];
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if (password_verify($password, $row['password']))
                {   
                    $dt = date('y-m-d h:i:s');
                    $login = true;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['token']=$row['token'];

                    $sqll= "UPDATE user SET dt='$dt'
			        WHERE email='$email'";
                    mysqli_query($conn, $sqll);
                    header("location: form.php");
		        }
                else
                {
                    $showError = 'Wrong Password';
                }
            }
        }
        else
        {
            $showError = 'User Not Found';
        }
    }

    if($login == true)
    {
        echo '';
    }

    if($showError)
    {
        echo '<script> alert("'.$showError.'"); </script>';    
    }
  
    
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>log in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/img/cv_icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   </head>
<body>
    

    <div class="main">
        <div class="ele1">
            <p>CV Wala</p>
        </div>
        <form   id="form" action="" method="post" onsubmit = "check(event)">
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <span id="emailicon" class="material-symbols-outlined">
                    info
                </span>
                <div class="popemail" id="popemail">
                    <p>Enter valid Email</p>
                </div>
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <span id="passicon" class="material-symbols-outlined">
                    info
                </span>
                <span id="passeye" class="material-symbols-outlined password1">
                    visibility_off
                </span>
                <div class="poppass" id="poppass">
                    <p>Password must contein 4 characters(alphabet, number)</p>
                </div>
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <input type="submit" class="btn " value="Log in">
            <div class="create">
                <!-- <a href="#" class="a">Forget password?</a>
                <hr> -->
                <a href="signup.php" class="a2">Create New Account</a>
            </div>

        </form>
    </div>
    
    <?php include('footer.php');?>

</body>

<script>
    let form = document.querySelector("form")
    let email = document.querySelector("#email");
    let password = document.querySelector("#password");
    let submit = document.querySelector("#submit");

    let passeye=document.querySelector("#passeye");

    function check(event) {
        
        if (email.value === "" ) {
            email.style.borderColor = "red";
            emailicon.style.display = "block";
            emailicon.textContent = "info";
            emailicon.style.color = "red";
            popemail.style.opacity = "1";
            event.preventDefault();
        }else{
            email.style.borderColor = "black";
            emailicon.style.display = "none";
            popemail.style.opacity = "0";
            emailicon.textContent = " ";
        }
        
        if (password.value === "") {
            password.style.borderColor = "red";
            passicon.style.display = "block";
            passicon.textContent = "info";
            passicon.style.color = "red";
            poppass.style.opacity = "1";
            event.preventDefault();
        }
    }

    passeye.addEventListener("click",function(){
        if(password.type==="password"){
            password.type="text";
            passeye.textContent="visibility";
        } 
        else{
            password.type="password";
            passeye.textContent="visibility_off";
        }
    })
</script>
</html>