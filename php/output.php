<?php
	session_start();

if(isset($_SESSION["name"]))
{
///Variables to store session data
    $name = $_SESSION["name"];
    $gender = $_SESSION["gender"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $skills = $_SESSION["skills"];
    $photo = $_SESSION["profile_pic"];
    $about = $_SESSION["about"];
    $address = $_SESSION["addr"];
    $education = $_SESSION["education"];
    $linkedin = $_SESSION["linkedin"];
    $github = $_SESSION["github"];

    $db_skills = '';

/// Variable to connect to the database
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "myDB";    


///Displaying the data entered by the user using session data
    echo "Your inputs:". "<br />";
	echo "-------------------------------------". "<br />";
	echo "Name: " . $name . "<br />";
	echo "Gender:";
	if ($gender=='m') {
		echo "Male" . "<br/>";
	}
	else{
		echo "Female" . "<br/>";
	}
	echo "Email: " . $email . "<br />";
	echo "Phone: " . $phone . "<br />";
	echo "Skill: " ;
	foreach ($skills as $key => $value) {
		echo  $value .", ";
		$db_skills = $db_skills . $value . ', ';
	}
	echo "<br/>";
	echo "Photo: " . $photo ."<br/>";
	echo '<img src="../upload/'.$photo .'" alt="Random image" />'."<br /><br />";
	echo "About: " . $about . "<br />";
	echo "Address: " . $address . "<br />";
	echo "Education Qualification: " . $education . "<br />";
	echo "Linkedin url: ". $linkedin. "<br/>";
	echo "Github url: ". $github. "<br/>";



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

	$sql = "INSERT INTO resume_data (id, name, gender, email, contact_number, skills, photo, about, address, edu_qualification, linkedin, github) VALUES (NULL, '$name', '$gender', '$email', '$phone', '$db_skills', '$photo', '$about', '$address', '$education', '$linkedin', '$github')";

	if ($conn->query($sql) === TRUE) {
		
/// Successfull insertion of data
	  echo "New record created successfully";
	} 

	else {

/// Error inserting data
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


// Destroying session
	session_unset();
	session_destroy();
}

else{
	echo "session ended or session not initialized.";
}


?>