<?php session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
    header("location: login.php");
}

include('dbcon.php');    

$email='';
$upload='';
$token = $_SESSION['token'];
$sql="SELECT * FROM rdata WHERE token = '$token'";
$result=mysqli_query($conn,$sql);
//$num = mysqli_num_rows($result);
//echo $num;
while ($rows = mysqli_fetch_assoc($result)) {
    if ($rows['upload'] && file_exists($rows['upload'])) {
		$upload='<a href="'.$rows['upload'].'" target="_blank"><img  src="'.$rows['upload'].'" width="100px"></a>';
	}
    //$upload=$rows['upload'];
    $name=$rows['name'];
    $email=$rows['email'];
    $phone=$rows['phone'];
    $dob=$rows['dob'];
    $address=$rows['address'];
    $gender=$rows['gender'];
    $extracurriculum=$rows['extracurriculum'];
    $linkedin=$rows['linkedin'];
    $website=$rows['website'];
    $objective=$rows['objective'];
    $language=$rows['language'];
    $skills=$rows['skills'];
    $education=$rows['education'];
    $work_experience=$rows['work_experience'];
    $project=$rows['project'];
}

//String to Array
$education = json_decode($education, true);
    
if($work_experience == '[[""],[""],[""]]'){
    $work_experience = NULL;
    $work_experience = json_decode($work_experience, true);
}else{
    $work_experience = json_decode($work_experience, true);
}
$project = json_decode($project, true);


//Education
$inst1 = '';
$inst2 = '';
$inst3 = '';
$inst4 = '';
$unib1 = '';
$unib2 = '';
$unib3 = '';
$unib4 = '';
$course1 = '';
$course2 = '';
$course3 = '';
$course4 = '';
$marks1 = '';
$marks2 = '';
$marks3 = '';
$marks4 = '';
$passyear1 = '';
$passyear2 = '';
$passyear3 = '';
$passyear4 = '';

$cnt = count($education);
for ($i = 0; $i < $cnt; $i++)
{  
for ($j = 0; $j < $cnt; $j++)
{
    if(isset($education [$j][$i])) 
    {
        if ($i==0) 
        {
            if ($j == 0) {
                $inst1 = $education[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $unib1 = $education[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $course1 = $education[$j][$i];
                $j++;
            }
            if ($j == 3) {
                $marks1 = $education[$j][$i];
                $j++;
            }
            if ($j == 4) {
                $passyear1 = $education[$j][$i];
                $j++;
            }           
        } 
        if ($i==1) 
        {
            if ($j == 0) {
                $inst2 = $education[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $unib2 = $education[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $course2 = $education[$j][$i];
                $j++;
            }
            if ($j == 3) {
                $marks2 = $education[$j][$i];
                $j++;
            }
            if ($j == 4) {
                $passyear2 = $education[$j][$i];
                $j++;
            }
        }  
        if ($i==2) 
        {
            if ($j == 0) {
                $inst3 = $education[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $unib3 = $education[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $course3 = $education[$j][$i];
                $j++;
            }
            if ($j == 3) {
                $marks3 = $education[$j][$i];
                $j++;
            }
            if ($j == 4) {
                $passyear3 = $education[$j][$i];
                $j++;
            }
        } 
        if ($i==3) 
        {
            if ($j == 0) {
                $inst4 = $education[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $unib4 = $education[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $course4 = $education[$j][$i];
                $j++;
            }
            if ($j == 3) {
                $marks4 = $education[$j][$i];
                $j++;
            }
            if ($j == 4) {
                $passyear4 = $education[$j][$i];
                $j++;
            }
        } 

        // echo $education [$j][$i], "<br>"; 
        
    }
} 
    // echo "<br>";
}


//Work Experiance
$jobrole1 = '';
$jobrole2 = '';
$workduration1 = '';
$workduration2 = '';
$coname1 = '';
$coname2 = '';

if(isset($work_experience))
{
$cntw = count($work_experience);
for ($i = 0; $i < $cntw; $i++)
{  
for ($j = 0; $j < $cntw; $j++)
{
    if(isset($work_experience[$j][$i])) 
    {
        if ($i==0) 
        {
            if ($j == 0) {
                $jobrole1 = $work_experience[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $workduration1 = $work_experience[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $coname1 = $work_experience[$j][$i];
                $j++;
            }           
        } 
        if ($i==1) 
        {
            if ($j == 0) {
                $jobrole2 = $work_experience[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $workduration2 = $work_experience[$j][$i];
                $j++;
            }
            if ($j == 2) {
                $coname2 = $work_experience[$j][$i];
                $j++;
            }
        }
    }
}
}
}

//Project
$projectn1 = '';
$projectn2 = '';
$projectn3 = '';
$projectn4 = '';
$projectdes1 = '';
$projectdes2 = '';
$projectdes3 = '';
$projectdes4 = '';

$cntp = count($project);
for ($i = 0; $i < $cntp; $i++)
{  
for ($j = 0; $j < $cntp; $j++)
{
    if(isset($project[$j][$i])) 
    {
        if ($i==0) 
        {
            if ($j == 0) {
                $projectn1 = $project[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $projectdes1 = $project[$j][$i];
                $j++;
            }      
        } 
        if ($i==1) 
        {
            if ($j == 0) {
                $projectn2 = $project[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $projectdes2 = $project[$j][$i];
                $j++;
            }
        }  
        if ($i==2) 
        {
            if ($j == 0) {
                $projectn3 = $project[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $projectdes3 = $project[$j][$i];
                $j++;
            }
        } 
        if ($i==3) 
        {
            if ($j == 0) {
                $projectn4 = $project[$j][$i];
                $j++;
            }
            if ($j == 1) {
                $projectdes4 = $project[$j][$i];
                $j++;
            }
        } 
        
    }
}
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="/img/cv_icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Resume</title>
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
                            <a href="index.html">Home</a>
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
<section class="main-section" id="cv">
        <div class="left-part">
            <div class="photo-container">
                <!-- <img src= -->
                    <?php
                    // <img src="
                        echo $upload;
                    // ">
                    ?>
            </div>
            <div class="contact-container">
                <h2 class="title">Contact Me</h2>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p><?php echo $address; ?></p>
                    </div>
                </div>

                <div class="contact-list">
                    <div class="icon-container">
                    <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p><?php echo $phone; ?></p>
                    </div>
                </div>

                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-text">
                        <p><?php echo $email; ?></p>
                    </div>
                </div>

                <?php
                    if($website == NULL){
                    }else{ ?>
                        <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <div class="contact-text git" id="github">
                        <p><?php echo $website; ?></p>
                    </div>
                </div>

                <?php } 
                if($linkedin == NULL){
                    }else{ ?>
                <div class="contact-list">
                    <div class="icon-container">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <div class="contact-text link" id="linkedin">
                        <?php echo $linkedin; ?>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="skills-container">
                <h2 class="title">Skills</h2>
                <div class="skill">
                    <div class="left-skill">
                        <p>
                            <?php
                                $skills = str_replace(' ','<br>',$skills);
                                echo $skills;
                            ?> 
                        </p>
                    </div>    
                </div>
            </div>

            <div class="skills-container">
                <h2 class="title">Language</h2>
                <div class="skill">
                    <div class="left-skill">
                        <p>
                            <?php 
                                $language = str_replace(' ','<br>',$language);
                                echo $language;
                            ?>
                        </p>
                    </div>
                    
                </div>
            </div>

            <div class="skills-container">
                <h2 class="title">INTERESTS</h2>
                <div class="skill">
                    <div class="left-skill">
                        <p>
                            <?php
                                $extracurriculum = str_replace(' ','<br>',$extracurriculum);
                                echo $extracurriculum;
                            ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
        <div class="right-part">
            <div class="banner">
                <h4 class="firstname"><?php echo $name; ?></h4>
                <!-- <h1 class="lastname">Anderson</h1> -->
                <p class="position"><?php echo $objective; ?></p>
            </div>
            
            <div class="education-container">
                <h2 class="title" id="edu">Education</h2>
                <div class="course">
                    <div class="box">
                        <h2 class="education-title"><?php echo $course1; ?></h2>
                        <p><?php echo $marks1; ?></p>
                        <p class="education-date"><?php echo $passyear1; ?></p>
                    </div>
                    <h5 class="college-name"><?php echo $inst1; ?></h5>
                    <h5 class="college-name"><?php echo $unib1; ?></h5>
                </div>

                <div class="course">
                    <div class="box">
                        <h2 class="education-title"><?php echo $course2; ?></h2>
                        <p><?php echo $marks2; ?></p>
                        <p class="education-date"><?php echo $passyear2; ?></p>
                    </div>
                    <h5 class="college-name"><?php echo $inst2; ?></h5>
                    <h5 class="college-name"><?php echo $unib2; ?></h5>
                </div>

                <div class="course">
                    <div class="box">
                        <h2 class="education-title"><?php echo $course3; ?></h2>
                        <p><?php echo $marks3; ?></p>
                        <p class="education-date"><?php echo $passyear3; ?></p>
                    </div>
                    <h5 class="college-name"><?php echo $inst3; ?></h5>
                    <h5 class="college-name"><?php echo $unib3; ?></h5>
                </div>

                <div class="course">
                    <div class="box">
                        <h2 class="education-title"><?php echo $course4; ?></h2>
                        <p><?php echo $marks4; ?></p>
                        <p class="education-date"><?php echo $passyear4; ?></p>
                    </div>
                    <h5 class="college-name"><?php echo $inst4; ?></h5>
                    <h5 class="college-name"><?php echo $unib4; ?></h5>
                </div>
                    
            </div> 
            <?php if(isset($work_experience)){ ?>
            <div class="work-container ">
                <h2 class="title text-left">work experience</h2>
                <div class="work">
                    <div class="job-date">
                        <p class="job"><?php echo $jobrole1; ?></p>
                        <p class="date"><?php echo $workduration1; ?></p>
                    </div>
                    <h2 class="company-name"><?php echo $coname1; ?></h2>
                </div>
                <div class="work">
                    <div class="job-date">
                        <p class="job"><?php echo $jobrole2; ?></p>
                        <p class="date"><?php echo $workduration2; ?></p>
                    </div>
                    <h2 class="company-name"><?php echo $coname2; ?></h2>
                </div>
                
            </div>
            <?php } ?>

            <div class="work-container ">
                <h2 class="title text-left">Project</h2>
                <div class="work">
                    <h2 class="company-name"><?php echo $projectn1; ?></h2>
                    <p class="work-text"><?php echo $projectdes1; ?></p>
                </div>
                <div class="work">
                    <h2 class="company-name"><?php echo $projectn2; ?></h2>
                    <p class="work-text"><?php echo $projectdes2; ?></p>
                </div>
                <div class="work">
                    <h2 class="company-name"><?php echo $projectn3; ?></h2>
                    <p class="work-text"><?php echo $projectdes3; ?></p>
                </div>
                <div class="work">
                    <h2 class="company-name"><?php echo $projectn4; ?></h2>
                    <p class="work-text"><?php echo $projectdes4; ?></p>
                </div>
            </div>

            
        </div>
    </section>

    <div class="btn">

        <input type="submit" Value="Edit" onclick="history.back()" name="submit" class="sbtn" id='edit'>
        <input type="submit" Value="Download" name="submit" class="sbtn" id='download'>
    </div>

    <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-center md:p-6 dark:bg-offwhite-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">CVwala © 2023 &emsp; &nbsp;
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
<!-- <button id='download'>Download</button> -->
<script>
  window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const cv = this.document.getElementById("cv");
            console.log(cv);
            console.log(window);
            //html2pdf().from(cv).save();
            var opt = {
                margin: 0,
                filename: '<?php echo htmlspecialchars($name).".pdf"; ?>',
                image: { type: 'jpeg', quality: .98 },
                html2canvas: { scale: 5 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().from(cv).set(opt).save(); 
        })
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<!-- <div class="html2pdf__page-break"></div> -->

</body>
</html>