<?php
session_start();

$skills = array();

/// Connecting database
$servername = "localhost";
$username = "root";
$password = "mindfire";
$dbname = "user_resume";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch the id's of all the skills
$sql = "SELECT id, skill FROM skills";

$skills = $conn->query($sql);

if ($skills->num_rows < 1) {

// Error fetching records
    echo "0 rows selected";
} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!--Bootstrap css-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


	<!-- Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Registration Page</title>



</head>
<body>
	<div class="container-fluid" id="main_container">
		<br>
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<!--Header-->      
					<header class="card-header">
						<a href class="float-right btn btn-outline-primary mt-1">Log In</a>
						<h4 class="card-title mt-2">Registration</h4>
					</header>
					<article class="card-body">
						<!--Form Body-->       
						<form  id="signup" class="form" method="post" enctype="multipart/form-data" >

							<!--Name Field-->       
							<div class="row form-group">
								<div class="col">
									<label  for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_POST['name'])? $_POST['name']: '' ;?>">
									<span class="error" id="error_name">This field is required</span>
								</div>                                                      
							</div>

							<!--Gender Field-->     
							<div class="form-group">
								<label>Gender</label>
								<div>
									<label><input type="radio" name="gender" value="m"> Male</label>
								</div>
								<div>
									<label><input type="radio" name="gender" value="f"> Female</label>
								</div>
								<span class="error" id="error_gender">Please select your gender</span>
							</div>

							<!--Email Field-->      
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email'])? $_POST['email']: '' ;?>">
								<span class="error" id="error_email">A valid email address is required</span>
							</div>

							<!--Contact Number Field-->     
							<div class="form-group">
								<label for="phone">Contact Number</label>
								<input type="text" class="form-control"  name="phone" id="phone" value="<?php echo isset($_POST['phone'])? $_POST['phone']: '' ;?>">
								<span class="error" id="error_phone">This field is required</span>
							</div>

							<!--Skills Field-->     
							<div class="form-group">
								<label>Skills</label>
							</div>
							<div class="form-group" id="skill_checkbox">
								<label class="checkbox-inline" for="c++"><input type="checkbox" name="skills[]" class="checkboxvar" value="<?php echo $skills->fetch_assoc()['id']; ?>" id="c++"> C++ </label>
								<label class="checkbox-inline" for="java"><input type="checkbox" name="skills[]" class="checkboxvar" value="<?php echo $skills->fetch_assoc()['id']; ?>" id="java"> Java </label>
								<label class="checkbox-inline" for="python"><input type="checkbox" name="skills[]" class="checkboxvar" value="<?php echo $skills->fetch_assoc()['id']; ?>" id="python"> Python </label>
								<label class="checkbox-inline" for="html"><input type="checkbox" name="skills[]" class="checkboxvar" value="<?php echo $skills->fetch_assoc()['id']; ?>" id="html"> HTML </label>
								<label class="checkbox-inline" for="php"><input type="checkbox" name="skills[]" class="checkboxvar" value="<?php echo $skills->fetch_assoc()['id']; ?>" id="php"> PHP</label>
								<br>
								<span class="error" id="error_skills">Please select atleast one skill</span>
							</div> 

							<!--Profile Picture Field-->        
							<div class="form-group">
								<label for="profile_pic">Upload Profile Photo:</label>
								<input type="file" class="form-control" name="profile_pic" id="profile_pic" value="<?php echo isset($_POST['profile_pic'])? $_POST['profile_pic']: '' ;?>">

								<input type="button" class="mt-2" name="upload" value="Upload" id="upload">
								<span class="error">Please upload a profile photo</span>
							</div>

							<!--User About Field-->     
							<div class="form-group">
								<label for="about">About</label>
								<textarea class="form-control" rows="3" name="about" id="about" placeholder="Enter something about yourself" value="<?php echo isset($_POST['name'])? $_POST['name']: '';?>"></textarea>
								<span class="error" id="error_about">This field is required</span>
							</div>
							<div class="form-group">
								<label for="addr">Address</label>
								<input type="text" class="form-control" id="addr" name="addr" value="<?php echo isset($_POST['addr'])? $_POST['addr']: '' ;?>">
								<span class="error" id="error_address">This field is required</span>
							</div>

							<!--Educational Qualification Field-->      
							<div class="form-group">
								<label for="education">Educational Qualification</label>
								<div class="dropdown" id="drop_education" name="drop_education">
									<select id="education" class="form-control" name="education">
										<option value="0">Select</option>
										<option value="metric">Metric</option>
										<option value="higher_secondary">Higher Secondary</option>
										<option value="graduate">Graduate</option>
										<option value="post_graduate">Post Graduate</option>
									</select>
									<span class="error" id="error_edu">Please select a option</span>    
								</div>
							</div>

							<!--Professional Links Field-->     
							<div class="form-group">
								<label for="links">Professional Links:</label>
								<br>
								<input type="text" class="form-control" name="linkedin" placeholder="LinkedIn link" id="linkedin" value="<?php echo isset($_POST['linkedin'])? $_POST['linkedin']: '' ;?>">
								<span class="error" id="error_linkedin">This field is required</span>
								<br>
								<input type="text" class="form-control" name="github" placeholder="Github" id="github" value="<?php echo isset($_POST['github'])? $_POST['github']: '' ;?>">
								<span class="error" id="error_github">This field is required</span>
							</div>

							<!--Register button-->      
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="register" id="register">Register</button>

							</div>
						</form>
						<div>

							<!--Server Side validation--> 

							<!-- To check if the server side validation is working or not please comment out line number 395 which includes "js/register.js" as scipt -->   

							<?php

							if(isset($_POST["register"]))
							{

                            // Declaring variables to store form data and to validate
								$name = $_POST["name"];
								$gender = '';
								$email = $_POST["email"];
								$phone = $_POST["phone"];
								$skills = '';
								$photo = '';
								$about = $_POST["about"];
								$address = $_POST["addr"];
								$education = $_POST["education"];
								$linkedin = $_POST["linkedin"];
								$github = $_POST["github"];

								$error = false;

                                // Name Validation
								if ( empty($name))
								{
									echo "Please enter your name" . "<br />";
									$error = true;
								} 

								elseif (!preg_match('/^[A-Za-z ]+$/', $name)) {
									echo "Your name should only contain alphabets" . "<br />";
									$error = true;
								}

								elseif (strlen($name) < 3) {
									echo "Your name should be more than 3 characters" . "<br />";
									$error = true;
								}

                                // Gender Validation
								if (empty($_POST["gender"])) {
									echo "Please choose your gender". "<br />";
									$error = true;
								}
								else{
									$gender = $_POST["gender"];
								}


                                // Skills validation
								if (empty($_POST["skills"])) {
									echo "Please choose atleast one skill" . "<br/>";
									$error = true;
								}
								else{
									$skills = $_POST['skills'];
								}


                                //Email Validation
								if (empty($email)) {

									echo "Please enter your email" . "<br />";
									$error = true;
								}

								elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

									echo "Please enter a valid email address" . "<br />";
									$error = true;
								}

                                // Contact Number Validation
								if (empty($phone)) {
									echo "Please enter your contact number" . "<br />";
									$error = true;
								}

								elseif (!preg_match('/^[0-9]+$/', $phone)) {
									echo "There should be only numbers" . "<br />";
									$error = true;
								}

								if (strlen($phone) != 10) {
									echo "Your phone number should be 10 digits long" . "<br />";
									$error = true;
								}

                                //File validation    
								if(!empty($_FILES["profile_pic"]["name"]))
								{

                                //user has browsed a file to upload
									if($_FILES["profile_pic"]["error"] == 0)
									{

                                //no errors with the file

                                //alloweed file type array
										$allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");

										if((in_array($_FILES["profile_pic"]["type"], $allowed_types)))
										{
                                            //correct file type

                                            //get the dot position
											$dot_pos = strrpos($_FILES["profile_pic"]["name"], ".");

                                            //from dot position to the end is the extension
											$extension = substr($_FILES["profile_pic"]["name"], $dot_pos);

                                            //use date function to get random number
											$random_name = date("YmdHis");

                                            //add date function value with extension to get unique new file name
											$new_name = $random_name . $extension;


											if($_FILES["profile_pic"]["size"] < 200000)
											{
												$uploaded = move_uploaded_file($_FILES["profile_pic"]["tmp_name"],
													"upload/" . $new_name);

												if($uploaded)
												{
													$photo = $new_name;

												}
												else
												{
													echo "File could not be uploaded". "<br />";
													$error = true;
												}   
											}
											else
											{
												echo "File should be less than 20KB " . "<br />" . "Your file size: " . $_FILES["profile_pic"]["size"]. "<br />";
												$error = true;
											}
										}
										else
										{
                                         //invalid file type
											echo "Please upload JPG or PNG files". "<br />";
											$error = true;
										}
									}
									else
									{
                                    //error with the file uploading
										echo "There are some errors with the file". "<br />";
										$error = true;
									}
								}
								else
								{
                                //error message for not selecting any file
									echo "Please browse a file to upload". "<br />";
									$error = true;
								}

                            // About Validation
								if (empty($about)) {
									echo "Please enter something about yourself" . "<br />";
									$error = true;
								}

								elseif (strlen($about) < 10) {
									echo "About section should be more than 10 characters" . "<br />";
									$error = true;
								}

                            // Address Validation
								if (empty($address)) {
									echo "Address field should not be empty" . "<br />";
									$error = true;
								}

								elseif (strlen($address) < 8) {
									echo "Address section should be more than 8 characters" . "<br />";
									$error = true;
								}

                            // Education Validation
								if ($education == '0') {
									echo "Please choose your educational qualification" . "<br />";
									$error = true;
								}

                            // Professional link validation
								if (empty($linkedin)) {
									echo "Please enter your Linkedin url". "<br/>";
									$error = true;
								}

								else{
									if (!preg_match("/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)+[a-zA-Z]*/i",$linkedin)) {
										echo "Please enter a valid url". "<br/>";
										$error = 'true';
									}
								}

								if (empty($github)) {
									echo "Please enter your Github url" . "<br/>";
									$error = true;
								}
								else{
									if (!preg_match("/((https?:\/\/)?((www|\w\w)\.)?github\.com\/)+[a-zA-Z]*/i",$github)) {
										echo "Please enter a valid url". "<br/>";
										$error = true;
									}
								}

								if(!$error)
								{

                            /// Connecting database

									$sql_error = FALSE;

                            // Create connection
									
									$sql_resume = "INSERT INTO resume (id, name, gender, email, contact_number, photo, about, address, edu_qualification, linkedin, github) VALUES (NULL, '$name', '$gender', '$email', '$phone', '$photo', '$about', '$address', '$education', '$linkedin', '$github')";

									if ($conn->query($sql_resume) === TRUE) {

                            /// Successfull insertion of data
										echo "New record created successfully for resume table";
									} 

									else 
									{

                            /// Error inserting data
										$sql_error =TRUE;
										echo "Error: " . $sql_resume . "<br>" . $conn->error;
									}

									$sql_resume_fetch = "SELECT id FROM resume WHERE email = '$email'";

									$resume_record = $conn->query($sql_resume_fetch);

									if ($resume_record->num_rows > 0) {

                            /// Successfull insertion of data
										echo "Record fetched successfully from resume table";

										$user_id = $resume_record->fetch_assoc()['id'];

										echo "user_id completed";


										foreach ($_POST["skills"] as $key => $skill_id) {

											$sql_skills = "INSERT INTO user_skills (user_id, skill_id) VALUES ($user_id, $skill_id) ";

											if ($conn->query($sql_skills) === TRUE) {

                            /// Successfull insertion of data
												echo "New record created successfully for skills table";

											} 

											else {

                            /// Error inserting data
												$sql_error =TRUE;
												echo "Error: " . $sql_skills . "<br>" . $conn->error;
											}
										}

									} 

									else 
									{

                            /// Error fetching data
										$sql_error =TRUE;
										echo "Error: " . $sql_resume_fetch . "<br>" . $conn->error;
									}



									if ($sql_error === FALSE) {

                            /// Successfull insertion of data
										echo "NO ERROR";

                                /// Creating session variables
										$_SESSION["email"] = $email;

										$conn->close();

										echo "<script>location.href='php/output.php';</script>";
									} 

									else {

                            /// Error inserting data
										echo "Errors somewhere";
									}

									$conn->close();

								}
							}
							?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>

	<!--Script to use jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Script for client side validation -->
	<script src="js/client_validation.js"></script>

</body>
</html>