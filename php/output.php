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

	$sql_resume_fetch = "SELECT id FROM resume WHERE email = '$email'";

	if ($resume_record = $conn->query($sql_resume_fetch) === TRUE) {

 /// Successfull insertion of data
		echo "Record fetched successfully from resume table";
	} 

	else 
	{

 /// Error fetching data
		echo "Error: " . $sql_resume_fetch . "<br>" . $conn->error;
	}

	$user_id = $resume_record->fetch_assoc()['id'];


	$sql_ouput = "SELECT * FROM resume WHERE email = '$email' ";

	if ($resume = $conn->query($sql_ouput) === TRUE) {

  /// Successfull insertion of data
		echo "Record fetched successfully";

	} 

	else {

  /// Error inserting data
		echo "Error: " . $sql_output . "<br>" . $conn->error;
	}


	$sql_skills = "SELECT user_skills.user_id , user_skills.skill_id, skills.skill FROM user_skills INNER JOIN skills ON user_skills.skill_id = skills.id WHERE user_skills.user_id = '$user_id' ";

	if ($skills = $conn->query($sql_ouput) === TRUE) {

  /// Successfull insertion of data
		echo "Record fetched successfully";

	} 

	else {

  /// Error inserting data
		echo "Error: " . $sql_skills . "<br>" . $conn->error;
	}

	if ($resume->num_rows > 0 && $skills->num_rows > 0) 
	{
		$resume_row = $resume->fetch_assoc();

///Displaying the data entered by the user using session data
		echo "Your inputs:". "<br />";
		echo "-------------------------------------". "<br />";
		echo "Name: " . $resume_row['name'] . "<br />";
		echo "Gender:";
		if ($resume_row['gender']==='m') {
			echo "Male" . "<br/>";
		}
		else{
			echo "Female" . "<br/>";
		}
		echo "Email: " . $resume_row['email'] . "<br />";
		echo "Phone: " . $resume_row['contact_number'] . "<br />";
		echo "Skill: " ;
		while($row= $skills->fetch_assoc())
		{
			$row['skill'] . ", ";
		}
		echo "<br/>";
		echo "Photo: " . $resume_row['photo'] ."<br/>";
		echo '<img src="../upload/'.$resume_row['photo'] .'" alt="Random image" />'."<br /><br />";
		echo "About: " . $resume_row['about'] . "<br />";
		echo "Address: " . $resume_row['address'] . "<br />";
		echo "Education Qualification: " . $resume_row['edu_qualification'] . "<br />";
		echo "Linkedin url: ". $resume_row['linkedin']. "<br/>";
		echo "Github url: ". $resume_row['github']. "<br/>";

	}



	$conn->close();


// // Destroying session
// 	session_unset();
// 	session_destroy();
}

else{
	echo "session ended or session not initialized.";
}


?>