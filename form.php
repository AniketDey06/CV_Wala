<?php 
    //This script will handle login
    session_start();

    // check if the user is logged in or not
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    {
        header("location: login.php");
        exit;
    } 
    include('dbcon.php');
    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $upload=$_FILES['upload'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $dob=$_POST['dob'];
     $address=$_POST['address'];
     $gender=$_POST['gender'];
     $extracurriculum=$_POST['extracurriculum'];
     $linkedin=$_POST['linkedin'];
     $website=$_POST['website'];
     $objective=$_POST['objective'];
     $language=$_POST['language'];
     $skills=$_POST['skills'];
     $institute=$_POST['institute'];
     $uniboard=$_POST['uniboard'];
     $course=$_POST['course'];
     $marks=$_POST['marks'];
     $course_duration=$_POST['course_duration'];
     $company=$_POST['company'];
     $work_description=$_POST['work_description'];
     $work_duration=$_POST['work_duration'];
     $project=$_POST['project'];
     $project_description=$_POST['project_description'];
    
     
    $language = str_replace(',','',$language);
    $skills = str_replace(',','',$skills);

    #Creating array
    $education=array($institute, $uniboard, $course, $marks, $course_duration);
    $work_experience=array($company ,$work_description, $work_duration);
    $project=array($project ,$project_description);
 

    //Array to string 
    $education = json_encode($education);
    $work_experience = json_encode($work_experience);
    $project = json_encode($project);
    

    // Upload Image
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["upload"]["tmp_name"]);
      if($check !== false) {
        //echo "<script> alert('File is an image - " . $check["mime"] . ".'); </script>";
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
        $msg = "File is not an image.";
        echo "<script> alert('.$msg.'); </script>";
      }
    }
    
    // Check file size
    if ($_FILES["upload"]["size"] > 5000000) {
      $uploadOk = 0;
      $msg="Sorry, your file is too large.";
      echo "<script> alert('.$msg.'); </script>";
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
      $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      echo "<script> alert('.$msg.'); </script>";
      
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      //echo "<script> alert('.$msg.'); </script>";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
        //echo "<script> alert('The file ". htmlspecialchars( basename( $_FILES["upload"]["name"])). " has been uploaded.'); </script>"; 
        $dt = date('y-m-d h:i:s');
        $token = $_SESSION['token'];
        $sql = "SELECT * FROM rdata WHERE token='$token'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $sqll= "UPDATE rdata SET 
                    upload='$target_file', name='$name', email='$email', phone='$phone', dob='$dob',
                    address='$address', gender='$gender', extracurriculum='$extracurriculum', 
                    linkedin='$linkedin', website='$website', objective='$objective',
                    language='$language', skills='$skills', education='$education', 
                    work_experience='$work_experience', project='$project', dt='$dt'
			        WHERE token='$token'";
                    mysqli_query($conn, $sqll);
            }
        }
        else{
        $sql= "INSERT INTO rdata(upload, name, email, phone, dob, address, gender, extracurriculum, linkedin, website, objective, language, skills, education, work_experience, project, token, dt) 
        VALUES ('$target_file','$name','$email','$phone','$dob','$address','$gender','$extracurriculum','$linkedin','$website','$objective','$language','$skills','$education','$work_experience','$project','$token','$dt')";
        $result=mysqli_query($conn,$sql);
        }

        if($result){

            $_SESSION['token'] = $token;
            $msg= 'Data inserted successfully';
            //echo "<script> alert('$msg'); </script>";
            header("location: output.php");
        }
    }
    else{
        header("location: form.php");
        $msg="Sorry, there was an error uploading your file.";
        echo "<script> alert('.$msg.'); </script>";
        die(mysqli_error($conn));
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">

    <link rel="icon" type="image/x-icon" href="/img/cv_icon.png">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <script src="https://kit.fontawesome.com/9911e4038a.js" crossorigin="anonymous"></script>

    <script src="js/form.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="js/preventBack.js"></script>    
    ---- Include the above in your HEAD tag ---------->
    <title>Form</title>


</head>

<body>
    <nav class="bar">
        <div class="mycont">
            <div class="mynavbar">
                <div class="logo">
                    <span class="">CV Wala</span>
                </div>
                <div class="opt">
                    <ul>
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="">About</a>
                        </li>
                        <li>
                            <a href="">Contact</a>
                        </li>
                    </ul>
                    <div class="logout">
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="body">
        <div class="mycont ">

            <form action="" method="POST" enctype="multipart/form-data">

                <!-- Personal Info -->
                <div class="pres-info myshadow">
                    <div class="heading">
                        <h2>Personal Info</h2>
                    </div>

                    <div class="pres-info-row">
                        <div class="pres-info-col col-sm-4">
                            <label for="upload">Upload Photo</label>
                            <input type="file" class="up form-control nopadding" name="upload" id="up"
                                accept="image/png, image/jpeg" required>
                            <br>

                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Fullname" required>
                            <br>


                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            <br>


                            <label>Mobile Number</label>
                            <input type="tel" maxlength="10" pattern="[0-9]{10}" name="phone" class="form-control"
                                placeholder="Enter Mobile Number" required>

                        </div>

                        <div class="pres-info-col col-sm-4">
                            <Label>Date of Birth</Label>
                            <input type="date" name="dob" class=" form-control" placeholder="Date Of Birth" required>
                            <br>

                            <Label>Address</Label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                            <br>

                            <Label>Gender</Label>
                            <div class="gen">

                                <input type="radio" name="gender" class="" id="Male" value="Male">
                                <label for="Male">Male</label>

                                <input type="radio" name="gender" class="" id="Female" value="Female">
                                <label for="Female">Female</label>

                                <input type="radio" name="gender" class="" id="Others" value="Others">
                                <label for="Others">Others</label>

                            </div>

                        </div>

                        <div class="pres-info-col col-sm-3">
                            <Label>Extra-curriculum</Label>
                            <input type="text" name="extracurriculum" class="form-control"
                                placeholder="Enter Extra-curriculum">
                            <br>

                            <Label>Linkedin</Label>
                            <input type="text" name="linkedin" class="form-control" placeholder="Enter Linkedin">
                            <br>

                            <Label>Website</Label>
                            <input type="text" name="website" class="form-control"
                                placeholder="Enter your Website(*if any)">
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Professional Info -->
                <div class="pro-info myshadow">
                    <div class="heading">
                        <h2>Professional Info</h2>
                    </div>

                    <div class="pres-info-row ">
                        <div class="pres-info-col col-sm-4">
                            <Label>Objective</Label>
                            <input type="text" name="objective" class="form-control" placeholder="Objective" required>
                            <br>

                        </div>

                        <div class="pres-info-col col-sm-4">
                            <label>Language</label>
                            <input type="text" name="language" class="form-control" placeholder="e.g. English" required>
                            <br>


                        </div>

                        <div class="pres-info-col col-sm-4">

                            <label>Skills</label>
                            <input type="text" name="skills" class="form-control" placeholder="e.g. HTML, CSS">

                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="edu myshadow">
                    <div class="heading">
                        <h2>Educational Qualification</h2>
                    </div>

                    <div class="degree">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="institute" name="institute[]"
                                            placeholder="Institute Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="uniboard" name="uniboard[]"
                                            placeholder="University/Board" required>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="course" name="course[]"
                                            placeholder="Course" required>
                                    </div>
                                </div>

                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="marks" name="marks[]"
                                            placeholder="Marks(%/CGPA)" required>
                                    </div>
                                </div>


                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text"  class="form-control"
                                                name="course_duration[]" placeholder="Passing Year" required>

                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"
                                                    onclick="education_fields();">
                                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="education_fields">

                                </div>

                                <div class="clear">

                                </div>

                            </div>
                            <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to
                                    add
                                    another form field
                                    :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to
                                    remove
                                    form field :)</small>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Work Experience -->
                <div class="pres-info myshadow">
                    <div class="heading">
                        <h2>Work Experience</h2>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">

                            
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="company" name="company[]"
                                        placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="work_description" name="work_description[]"
                                        placeholder="Work Description">
                                </div>
                            </div>


                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="work_duration" name="work_duration[]"
                                            placeholder="Work Duration">

                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="work_fields();">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="work_fields">

                            </div>

                            <div class="clear">

                            </div>

                        </div>
                        <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add
                                another form field
                                :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove
                                form
                                field :)</small>
                        </div>
                    </div>
                </div>




                <!-- Projects -->
                <div class="pro-info myshadow">
                    <div class="heading">
                        <h2>Projects</h2>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="project" name="project[]"
                                        placeholder="Project Name">
                                </div>
                            </div>

                            <div class="col-sm-8 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="project_description"
                                            name="project_description[]" placeholder="Project Description">

                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="project_fields();">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="project_fields">

                            </div>
                            <div class="clear"></div>

                        </div>
                        <div class="panel-footer">
                            <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add
                                another form field
                                :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove
                                form
                                field :)</small>
                        </div>

                    </div>



                </div>




                <div class="submit">
                    <label for="sub">
                        <input type="checkbox" id="sub" name="" value="" required>
                        I, hereby declare that the details given above are correct and true to the best of my knowledge
                        and ability.
                    </label>

                    <input type="submit" Value="Generate CV" name="submit" class="sbtn">
                </div>

            </form>
        </div>

        <footer class="foot">
            <ul>
                <li>
                    <h6>CVwala © 2022</h6>
                </li>
                <li>
                    <a href="#" class="">About</a>
                </li>
                <li>
                    <a href="#" class="">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="">Licensing</a>
                </li>
                <li>
                    <a href="#" class="">Contact</a>
                </li>
            </ul>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/9911e4038a.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>