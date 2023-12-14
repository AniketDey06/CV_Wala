<!-- <?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include('dbcon.php');
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    // Check whether this email exists
    $existSql = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0)
    {
        $showError = "Email Already Exists";
    }
     else
     {
        if (($password == $cpassword)) 
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $dt = date('y-m-d h:i:s');
            $token=md5(rand(0,9999));
            $sql="INSERT INTO `user`(`name`,`email`,`phone`,`password`,`token`,`dt`) 
            VALUES('$name','$email','$phone','$hash','$token','$dt')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showAlert = "Successfully your account has been created";
            }
        }
        else 
        {
            $showError = "Password don't match";
        }
    }
}
if($showAlert == true)
{
    echo '<script> alert("'.$showAlert.'"); </script>';
}

if($showError)
{
    echo '<script> alert("'.$showError.'"); </script>';    
}
?> -->

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create an Account</title>
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="icon" type="image/x-icon" href="/img/cv_icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <div class="bg">
        <div class="center">
            <div class="ele1">
                <p>CV Wala</p>
            </div>
            <form action="signup.php" method="post" name="form" id="form" onsubmit ="check(event)">
                <h1>Create an Account</h1>
                <div class="name inputs relative z-0 mb-6 w-full group">
                    <input type="text" name="name" id="name" onkeyup="namecheck()"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <span id="usericon" class="material-symbols-outlined">
            
                    </span>
                    <div class="popname" id="popname">
                        <p>Enter valid Name</p>
                    </div>
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>

                <div class="inputs relative z-0 mb-6 w-full group">
                    <input type="email" name="email" onkeyup="emailcheck()" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <span id="emailicon" class="material-symbols-outlined">
                        
                    </span>
                    <div class="popemail" id="popemail">
                        <p>Enter valid Email</p>
                    </div>
                    <label for="email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email
                    </label>
                </div>

                <div class="inputs relative z-0 mb-6 w-full group">
                    <input type="tel" maxlength="10" onkeyup="phonecheck()" name="phone" id="phone"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />

                    <span id="phicon" class="material-symbols-outlined">

                    </span>
                    <div class="popph" id="popph">
                        <p>Enter valid Mobile number </p>
                    </div>
                    <label for="phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Mobile number
                    </label>

                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <input type="password" name="password" id="password" onkeyup="checkstrength()"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <span id="passicon" class="material-symbols-outlined">

                    </span>
                    <span id="passeye" class="material-symbols-outlined password1">
                        visibility_off
                    </span>
                    <div class="poppass" id="poppass">
                        <p>Password must contein 4 characters(alphabet, number)</p>
                        
                    </div>
                    <label for="password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>

                </div>

                <div class="inputs relative z-0 mb-6 w-full group">
                    <input type="password" name="cpassword" id="cpassword" onkeyup="checkpass()"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <span id="cpassicon" class="material-symbols-outlined">

                    </span>
                    <span id="cpasseye" class="material-symbols-outlined password1">
                        visibility_off
                    </span>
                    <div class="popcpass" id="popcpass">
                        <p>Password dose not match</p>
                    </div>
                    <label for="cpassword"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                        password</label>

                </div>

                <button type="submit" id="submit"
                    class="btn font-medium text-white text-sm bg-black dark:hover:bg-white-700">
                    Sign up
                </button>
                <br />
                <a href="login.php" class="back">Already have an account?</a>
            </form>
        </div>
    </div>

    <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-center md:p-6 dark:bg-offwhite-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">CVwala © 2022 &emsp; &nbsp;
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </footer>
    
    

    

    <script src="https://cdn.tailwindcss.com"></script>
</body>



<script>
    let form = document.querySelector("form");

    let username = document.querySelector("#name");
    let popname = document.querySelector("#popname");
    
    let email = document.querySelector("#email");
    let popemail = document.querySelector("#popemail");

    let phone = document.querySelector("#phone");
    let popph = document.querySelector("#popph");

    let password = document.querySelector("#password");
    let poppass = document.querySelector("#poppass");

    let cpassword = document.querySelector("#cpassword");
    let popcpass = document.querySelector("#popcpass");

    let submit = document.querySelector("#submit");

    let usericon = document.querySelector("#usericon");
    let emailicon = document.querySelector("#emailicon");

    let passeye = document.querySelector("#passeye");
    let cpasseye = document.querySelector("#cpasseye");

    // on submit
    function check(event) {

        
        if (username.value === "") {
            username.style.borderColor = "red";
            usericon.style.display = "block";
            usericon.textContent = "info";
            usericon.style.color = "red";
            popname.style.opacity = "1";
            event.preventDefault();
        }
        if (email.value === "") {
            email.style.borderColor = "red";
            emailicon.style.display = "block";
            emailicon.textContent = "info";
            emailicon.style.color = "red";
            popemail.style.opacity = "1";
            event.preventDefault();
        }
        if (phone.value === "") {
            phone.style.borderColor = "red";
            phicon.style.display = "block";
            phicon.textContent = "info";
            phicon.style.color = "red";
            popph.style.opacity = "1";
            event.preventDefault();
        }
        if (password.value === "") {
            password.style.borderColor = "red";
            passicon.style.display = "block";
            passicon.textContent = "info";
            passicon.style.color = "red";
            poppass.style.opacity = "1";
            event.preventDefault();
        }
        if (cpassword.value === "") {
            cpassword.style.borderColor = "red";
            cpassicon.style.display = "block";
            cpassicon.textContent = "info";
            cpassicon.style.color = "red";
            popcpass.style.opacity = "1";
            event.preventDefault();
        }
        
    }

    // namecheck onkeyup
    function namecheck() {
        event.preventDefault();
        if (username.value === "") {
            username.style.borderColor = "red";
            usericon.style.display = "block";
            usericon.textContent = "info";
            usericon.style.color = "red";
            usericon.style.display = "block";
            popname.style.opacity = "1";
        }
        else {
            username.style.borderColor = "green";
            usericon.style.color = "green";
            usericon.style.display = "block";
            usericon.textContent = "check_circle";
            popname.style.opacity = "0";
        }
    }

    // emailcheck onkeyup
    function emailcheck() {
        let expression = /^[a-z\._\-0-9]*[@][A-za-z]*[\.][a-z]{2,4}$/;
        if (email.value.match(expression)) {
            email.style.borderColor = "green";
            emailicon.style.display = "block";
            emailicon.style.color = "green";
            emailicon.textContent = "check_circle";
            popemail.style.opacity = "0";
        }
        else {
            email.style.borderColor = "red";
            emailicon.style.color = "red";
            emailicon.style.display = "block";
            emailicon.textContent = "info";
            popemail.style.opacity = "1";
        }
    }

    // phonecheck onkeyup
    function phonecheck() {
        let expression = /^[0-9]{10}$/;
        if (phone.value.match(expression) && phone.value.length == 10) {
            phone.style.borderColor = "green";
            phicon.style.display = "block";
            phicon.style.color = "green";
            phicon.textContent = "check_circle";
            popph.style.opacity = "0";
        }
        else {
            phone.style.borderColor = "red";
            phicon.style.display = "block";
            phicon.style.color = "red";
            phicon.textContent = "info";
            popph.style.opacity = "1";
        }
    }

    // password check onkeyup
    function checkstrength() {
        let alphabet = /[a-zA-Z]/,
            numbers = /[0-9]/,
            character = /[!,@,$,#,%,^,&,*,(),_,-,+]/;
        let value = password.value;

        if (value.match(alphabet) || value.match(numbers) || value.match(character) || value == "") {
            password.style.borderColor = "red";
            passicon.style.display = "block";
            passicon.textContent = "info";
            passicon.style.color = "red";
            poppass.style.opacity = "1";
        }
        if (value.match(alphabet) && value.match(numbers) && value.length>=4) {
            password.style.borderColor = "green";
            passicon.style.display = "block";
            passicon.textContent = "check_circle";
            passicon.style.color = "green";
            poppass.style.opacity = "0";
        }
    }

    // confirm password
    function checkpass() {
        if (password.value === cpassword.value) {
            cpassword.style.borderColor = "green";
            cpassicon.style.display = "block";
            cpassicon.textContent = "check_circle";
            cpassicon.style.color = "green";
            popcpass.style.opacity = "0";
        }
        else {
            cpassword.style.borderColor = "red";
            cpassicon.style.display = "block";
            cpassicon.textContent = "info";
            cpassicon.style.color = "red";
            popcpass.style.opacity = "1";
        }
    }

    // password visibility on/off
    passeye.addEventListener("click", function () {
        if (password.type === "password") {
            password.type = "text";
            passeye.textContent = "visibility";
        }
        else {
            password.type = "password";
            passeye.textContent = "visibility_off";
        }
    })

    // confirm password visibility on/off
    cpasseye.addEventListener("click", function () {
        if (cpassword.type === "password") {
            cpassword.type = "text";
            cpasseye.textContent = "visibility";

        }
        else {
            cpassword.type = "password";
            cpasseye.textContent = "visibility_off";
        }
    })
</script>
</html>