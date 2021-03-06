<?php
    require "a.php";
	$email=$_SESSION['email'];

    	//For Retrieval of Page data
	//pagedata fetching
	$sql = "SELECT * from page where id='5'";
	$result = $conn->query($sql);
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$title=$row["title"];
		}
	//logged in or not checking
		if(!(isset($_SESSION['email'])))
		{
		 header('location:login.php');
		}
        
   
	//userdata fetching 
	$query="SELECT * FROM `user` where email='$email'";
	$userdata=$conn->query($query);
	$out=$userdata->fetch_assoc();
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo "$title";?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="css/settings.css">
    <link rel="stylesheet" type="text/scss" href="css/settings.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
    .alb {
        width: 200px;
        height: 200px;
        padding: 5px;
    }

    .alb img {
        width: 100%;
        height: 100%;
    }

    a {
        text-decoration: none;
        color: black;
    }
    </style>

<body>
    <div id="header"></div>
    <div class="container">
        <section class="py-5 my-5">
            <div class="container">
                <h1 class="mb-5"></h1>
                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                    <div class="profile-tab-nav border-right">
                        <!----Profile picture upload--->
                        <div class="profile_picture">
                            <?php if (isset($_GET['error'])): ?> <p>
                                <?php echo $_GET['error']; ?></p>
                            <?php endif ?>
                            <div class="p-4">
                                <div class="alb">
                                    <img src="uploads/profile_image/<?=$out['profile_image']?>">
                                </div>
                                <?php ?>
                                <form action="update.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="profile_image">
                                    <input type="submit" name="image_upload" value="Upload">

                            </div>

                            <h4 class="text-center"></h4><?php echo $out['first_name'];?></h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab"
                                aria-controls="account" aria-selected="false"><i
                                    class="fa fa-home text-center mr-1"></i>Profile</a>
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                                aria-controls="password" aria-selected="false"><i
                                    class="fa fa-key text-center mr-1"></i>Privacy & Security</a>
                            <a class="nav-link" id="featured-tab" data-toggle="pill" href="#featured" role="tab"
                                aria-controls="featured" aria-selected="false"><i
                                    class="fa fa-key text-center mr-1"></i>Featured</a>
                            <a class="nav-link" id="skill-tab" data-toggle="pill" href="#skill" role="tab"
                                aria-controls="skills" aria-selected="false"><i class="fa fa-certificate"
                                    aria-hidden="true"></i>skills</a>
                            <a class="nav-link" id="accomplishment-tab" data-toggle="pill" href="#accomplishment"
                                role="tab" aria-controls="accomplishment" aria-selected="false"><i
                                    class="fa fa-bookmark" aria-hidden="true"></i>Accomplishments & Certifications</a>
                            <a class="nav-link" id="project-tab" data-toggle="pill" href="#project" role="tab"
                                aria-controls="project" aria-selected="false"><i class="fa fa-suitcase"
                                    aria-hidden="true"></i>Projects & Work Experience</a>
                            <a class="nav-link" id="appearance-tab" data-toggle="pill" href="#appearance" role="tab"
                                aria-controls="appearance" aria-selected="false"><i
                                    class="fa fa-adjust text-center mr-1"></i>Appearance</a>
                            <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab"
                                aria-controls="notification" aria-selected="false"><i
                                    class="fa fa-bell text-center mr-1"></i>Notification</a>
                            <a class="nav-link" id="cproject-tab" data-toggle="pill" href="#cproject" role="tab"
                                aria-controls="cproject" aria-selected="false"><i class=" fa fa-play"></i>Current
                                Project</a>
                            <a class="nav-link" id="communication-tab" data-toggle="pill" href="#communication"
                                role="tab" aria-controls="communication" aria-selected="false"><i
                                    class="fa fa-address-book" aria-hidden="true"></i>Communication</a>
                            <a class="nav-link" id="post-tab" data-toggle="pill" href="#post" role="tab"
                                aria-controls="post" aria-selected="false"><i class=" fa fa-bullhorn"></i>Post</a>
                        </div>
                    </div>
                    <form method="POST" action="update.php">
                        <div class="tab-content p-4 p-md-7" id="v-pills-tabContent">
                            <!----Profile Section--->
                            <div class="tab-pane fade show active" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <h3 class="mb-4">Profile</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>First Name</label><input type="text"
                                                id="first_name" name="first_name" class="form-control"
                                                value="<?php echo $out['first_name'];?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Last Name</label><input type="text"
                                                id="last_name" name="last_name" class="form-control"
                                                value="<?php echo $out['last_name'];?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Email</label><input type="text" id="email"
                                                name="email" class="form-control" value="<?php echo $out['email'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Mobile Number</label><input type="text"
                                                id="mobile" name="mobile" class="form-control"
                                                value="<?php echo $out['mobile'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Company/Institution</label><input type="text"
                                                id="institution" name="institution" class="form-control"
                                                value="<?php echo $out['institution'];?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Department</label><input type="text" id="dept"
                                                name="dept" class="form-control" value="<?php echo $out['dept'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Designation</label><input type="text" id="title"
                                                name="title" class="form-control" value="<?php echo $out['title'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>City</label><input type="text" id="city"
                                                name="city" class="form-control" value="<?php echo $out['city'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label
                                                for="birthday">DOB(dd/mm/yy)</label><br><br><input type="date" id="dob"
                                                name="dob" value="<?php echo $out['dob'];?>"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Gender</label><br><input type="radio" id="male"
                                                name="gender" value="<?php echo $out['dob'];?>"><label
                                                for="male">Male</label><br><input type="radio" id="female" name="gender"
                                                value="<?php echo $out['dob'];?>"><label
                                                for="female">Female</label><br><input type="radio" id="other"
                                                name="gender" value="<?php echo $out['dob'];?>"><label
                                                for="other">Other</label></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Bio</label><input type="text" id="bio" name="bio"
                                                class="form-control" value="<?php echo $out['bio'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div><button class="btn btn-primary" name="profileupdate">Update</button><button
                                        class="btn btn-light">Cancel</button></div>
                            </div>
                            <!----------Password Section------------>
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <h3 class="mb-4">Password Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Old password</label><input type="password"
                                                name="password" class="form-control"
                                                value="<?php echo $out['password'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>New password</label><input type="password"
                                                name="npassword" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Confirm new password</label><input
                                                type="password" name="namepassword" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Recovery</label><input type="text"
                                                class="form-control" name="recovery"
                                                value="<?php echo $out['recovery'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    name="two-fact-auth" value="<?php echo $out['two-fact-auth'];?>"
                                                    id="two-fact-auth"><label class="form-check-label"
                                                    for="two-fact-auth">Two Factor Authentication </label></div>
                                        </div>
                                    </div>
                                </div>
                                <div><button class="btn btn-primary" name="passwordupdate">Update</button><button
                                        class="btn btn-light">Cancel</button></div>
                            </div>
                            <!---------Featured Section-------------->
                            <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                <h3 class="mb-4">Featured</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Featured Skillset</label><input type="text"
                                                id="featured1" name="featured1" class="form-control"
                                                value="<?php echo $out['featured1'];?>"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Featured Experience</label><input type="text"
                                                id="featured2" name="featured2" class="form-control"
                                                value="<?php echo $out['featured2'];?>"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Featured Achievement</label><input type="text"
                                                id="featured3" name="featured3" class="form-control"
                                                value="<?php echo $out['featured3'];?>"></div>
                                    </div>
                                </div>
                                <div><button class="btn btn-primary" name="featuredupdate">Update</button><button
                                        class="btn btn-light">Cancel</button></div>
                            </div>
                            <!--------Skill Section------>
                            <div class="tab-pane fade" id="skill" role="tabpanel" aria-labelledby="skill-tab">
                                <h3 class="mb-4">Skillset</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Personal Skills</label>
                                            <select class="mul-select" multiple="true" id="skill1" name="skill1[]"
                                                value="<?php echo $out['skill1'];?>">
                                                <option value='COMPASSIONATE'>COMPASSIONATE</option>
                                                <option value='EFFECTIVE COMMUNICATOR'>EFFECTIVE COMMUNICATOR
                                                </option>
                                                <option value='LEADERSHIP'>LEADERSHIP</option>
                                                <option value='INSIGHTFUL'>INSIGHTFUL</option>
                                                <option value='PERCEPTIVE'>PERCEPTIVE</option>
                                                <option value='CREATIVE'>CREATIVE</option>
                                                <option value='FLEXIBLE'>FLEXIBLE</option>
                                                <option value='INNOVATIVE'>INNOVATIVE</option>
                                                <option value='LOGICAL THINKING'>LOGICAL THINKING</option>
                                                <option value='PROBLEM SOLVING'>PROBLEM SOLVING</option>
                                                <option value='SOCIABLE'>SOCIABLE</option>
                                                <option value='CONSISTENT'>CONSISTENT</option>
                                                <option value='MARKETING'>MARKETING</option>
                                                <option value='CRITICAL THINKING '>CRITICAL THINKING</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Technical Skills</label>
                                            <select class="mul-select" multiple="true" id="skill2" name="skill2[]"
                                                value="<?php echo $out['skill2'];?>">
                                                <option value='SQL'>SQL</option>
                                                <option value='JAVA'>JAVA</option>
                                                <option value='PYTHON'>PYTHON</option>
                                                <option value='LINUX'>LINUX</option>
                                                <option value='JAVA SCRIPT'>JAVA SCRIPT</option>
                                                <option value='AWS'>AWS</option>
                                                <option value='C++'>C++</option>
                                                <option value='C'>C</option>
                                                <option value='C#'>C#</option>
                                                <option value='NET'>NET</option>
                                                <option value='WEB DEVELOPMENT'>WEB DEVELOPMENT</option>
                                                <option value='APP DEVELOPMEN'>APP DEVELOPMENT</option>
                                                <option value='BLOCK CHAIN'>BLOCK CHAIN</option>
                                                <option value='BIG DATA ANALYSIS'>BIG DATA ANALYSIS</option>
                                                <option value='DATA SCIENCE '>DATA SCIENCE</option>
                                                <option value='3D PRINTING'>3D PRINTING</option>
                                                <option value='AR/VR'>AR/VR</option>
                                                <option value='GRAPHIC DISGINING'>GRAPHIC DISGINING</option>
                                                <option value='WEB ANALYSIS'>WEB ANALYSIS</option>
                                                <option value='FULL STACK DEVELOPMENT'>FULL STACK DEVELOPMENT
                                                </option>
                                                <option value='CLOUD COMPUTING'>CLOUD COMPUTING</option>
                                                <option value='ARTIFICIAL INTELLIGENCE'>ARTIFICIAL
                                                    INTELLIGENCE</option>
                                                <option value='ROBOTICS'>ROBOTICS</option>
                                                <option value='DIGITAL MARKETING'>DIGITAL MARKETING</option>
                                                <option value='IOT'>IOT</option>
                                                <option value='MACHINE LEARNING'>MACHINE LEARNING</option>
                                                <option value='AUTOCAD'>AUTOCAD</option>
                                                <option value='CREO'>CREO</option>
                                                <option value='WEB DESINGING'>WEB DESINGING</option>
                                                <option value='CYBER SECURITY'>CYBER SECURITY</option>
                                                <option value='ANIMATIONS'>ANIMATIONS</option>
                                                <option value='DATA VISUALIZATION'>DATA VISUALIZATION
                                                </option>
                                                <option value='BOOTSTRAP'>BOOTSTRAP</option>
                                                <option value='RUBY'>RUBY</option>
                                                <option value='REACT'>REACT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Miscellaneous Skills</label>
                                            <input type="text" id="skill3" class="form-control" name="skill3"
                                                value="<?php echo $out['skill3'];?>">
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" name="skillupdate">Update</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <!-----------------Theme section---------------------->
                            <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
                                <h3 class="mb-4">Theme and Display</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value="" id="app-check"><label class="form-check-label"
                                                    for="app-check">Dark
                                                </label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value="" id="defaultCheck2"><label class="form-check-label"
                                                    for="defaultCheck2">Light
                                                </label></div>
                                        </div>
                                    </div>
                                </div>
                                <div><button class="btn btn-primary">Update</button><button
                                        class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                            <!-----------------Notification Settings-------------->
                            <div class="tab-pane fade" id="notification" role="tabpanel"
                                aria-labelledby="notification-tab">
                                <h3 class="mb-4">Email notification preferences</h3>
                                <div class="form-group">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" value=""
                                            id="notification1"><label class="form-check-label" for="notification1">send
                                            daily updates. </label></div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" value=""
                                            id="notification2"><label class="form-check-label" for="notification2">Use
                                            quieter messaging (blocks notification prompts from
                                            interrupting you). </label></div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" value=""
                                            id="notification3"><label class="form-check-label"
                                            for="notification3">disable
                                            all notifications. </label></div>
                                </div>
                                <div><button class="btn btn-primary">Update</button><button
                                        class="btn btn-light">Cancel</button>
                                </div>
                            </div>

                            <!-----------------Accomplishment Settings-------------->
                            <div class="tab-pane fade" id="accomplishment" role="tabpanel"
                                aria-labelledby="notification-tab">
                                <h3 class="mb-4">Accomplishments & Certifications</h3>
                                <div class="form-group">
                                    <label>Add a new Accomplishment</label>
                                    <button id="newaccomplishment" name="newaccomplishment"
                                        class="btn btn-light">New</button>
                                </div>
                                <div class=" form-group">
                                    <label>Add a new Certification</label>
                                    <button id="newcertification" name="newcertification"
                                        class="btn btn-light">New</button>
                                </div>
                            </div>
                            <!-----------------Projects Settings-------------->
                            <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="notification-tab">
                                <h3 class="mb-4">Projects & Work Experience</h3>
                                <div class="form-group">
                                    <label>Add a new Project</label>
                                    <button id="newproject" name="newproject" class="btn btn-light">New</button>
                                </div>
                                <div class=" form-group">
                                    <label>Add a new Experience</label>
                                    <button id="newexperience" name="newexperience" class="btn btn-light">New</button>
                                </div>
                            </div>

                            <!------------------Communication Settings------------->
                            <div class="tab-pane fade" id="communication" role="tabpanel"
                                aria-labelledby="communication-tab">
                                <h3 class="mb-4">Communication</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Github
                                                url</label><input type="text" id="github" name="github"
                                                class="form-control" value="<?php echo $out['github'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Linkedin
                                                url</label><input type="text" id="linkedin" name="linkedin"
                                                class="form-control" value="<?php echo $out['linkedin'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Edumate
                                                url</label><input type="text" id="edumate" name="edumate"
                                                class="form-control" value="<?php echo $out['edumate'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Website
                                                url</label><input type="text" id="website" name="website"
                                                class="form-control" value="<?php echo $out['website'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div><button class="btn btn-primary" name="commupdate">Update</button><button
                                        class="btn btn-light">Cancel</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div id="footer"></div>

    <script>
    $(function() {
            $("#header").load("includes/navigation.html");
            $("#footer").load("includes/footer.html");
        }

    );
    </script>
    <script>
    $(document).ready(function() {
        $(".mul-select").select2({
            placeholder: "select ", //placeholder
            tags: true,
            tokenSeparators: ['/', ',', ';', " "]
        });
    })
    </script>
    <script>
    $(document).ready(function() {
        $(".mu-select").select2({
            placeholder: "select ", //placeholder
            tags: true,
            tokenSeparators: ['/', ',', ';', " "]
        });
    })
    </script>

</body>

</html>