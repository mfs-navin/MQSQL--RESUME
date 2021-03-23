<?php
session_start();

if(isset($_SESSION["email"]))
{

	$email = $_SESSION["email"];

/// Connecting database
	$servername = "localhost";
	$username = "root";
	$password = "mindfire";
	$dbname = "user_resume";

  // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

// SQL query to fetch the resume details for the user who filled the form
	$sql_resume_fetch = "SELECT * FROM resume WHERE email = '$email'";

	$resume = $conn->query($sql_resume_fetch);

 /// Error fetching user's resume data
	if ($resume->num_rows < 1)
		echo "Error: " . $sql_resume_fetch . "<br>" . $conn->error;	 


	$resume_record = $resume->fetch_assoc();
	$user_id = $resume_record['id'];


// SQL query to fetch all user skills
	$sql_skills = "SELECT skills.skill FROM user_skills INNER JOIN skills ON user_skills.skill_id = skills.id WHERE user_skills.user_id = $user_id ";

	$skills = $conn->query($sql_skills);

/// Error fetching user skills data
	if ($skills->num_rows < 1)
		echo "Error: " . $sql_skills . "<br>" . $conn->error;


	if ($resume->num_rows > 0 && $skills->num_rows > 0) 
	{

///Displaying the data entered by the user using session data
		echo "Your inputs:". "<br />";
		echo "-------------------------------------". "<br />";
		echo "Name: " . $resume_record['name'] . "<br />";
		echo "Gender:";
		if ($resume_record['gender']==='m') {
			echo "Male" . "<br/>";
		}
		else{
			echo "Female" . "<br/>";
		}
		echo "Email: " . $resume_record['email'] . "<br />";
		echo "Phone: " . $resume_record['contact_number'] . "<br />";
		echo "Skill: " ;
		while($row= $skills->fetch_assoc())
		{
			echo $row['skill'] . ", ";
		}
		echo "<br/>";
		echo "Photo: " . $resume_record['photo'] ."<br/>";
		echo '<img src="../upload/'.$resume_record['photo'] .'" alt="Random image" />'."<br /><br />";
		echo "About: " . $resume_record['about'] . "<br />";
		echo "Address: " . $resume_record['address'] . "<br />";
		echo "Education Qualification: " . $resume_record['edu_qualification'] . "<br />";
		echo "Linkedin url: ". $resume_record['linkedin']. "<br/>";
		echo "Github url: ". $resume_record['github']. "<br/>";

	}

	else{
		echo "Error fetching the records";
	}


// Closing connection with database
	$conn->close();

// Destroying session
	session_unset();
	session_destroy();
}

else{
	echo "session ended or session not initialized.";
}


?>