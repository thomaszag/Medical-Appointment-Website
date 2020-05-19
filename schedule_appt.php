<!-- File: IS448 Project D4| schedule.html
	 Authors: Thomas Zhang, Muhsina Hel
	 Overview: This file shows the appointment information after a time is confirmed. It is styled using confirmation.css -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- should reference confirmation.css file in Julia's directory --> 
		<link rel="stylesheet" href="https://swe.umbc.edu/~thomasz1/is448/GProject/D5/confirmation.css" type="text/css"/>
	<title>Appointment Confirmation</title>
</head>
	
	
	 
<?php
 
	$valueT = $_POST['timeA'];
	$userName = $_POST['uname'];
	$passWord = $_POST['password'];
	
	$apptClosed = 0;
	$currPatient = 0;
	
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","thomasz1","thomasz1","thomasz1");

	if (mysqli_connect_errno())
		exit("Error - could not connect to MySQL"); 

	$patientT = "SELECT first_name from patient where '$userName' = u_name and '$passWord' = pass_word";
	
    $results = mysqli_query($db, $patientT);
	
	
	
	if(mysqli_num_rows($results)==0)
	{
	  
	  header("Location: https://swe.umbc.edu/~thomasz1/is448/GProject/D6/schedule_appt.html");
	  /*
	   $error = mysqli_error($db);
	   print $error;
	*/
	}
    /*else
	{
		$row = mysqli_fetch_assoc($results); 
		foreach($row as $value)
		{ 
			//echo "Welcome: " .$value; 
		}
		
	}
*/
	
	if(isset($_POST['Submit']))
	{
			//updates appointment table, sets patient_id in appointment to correct patient and changes open_appt to a closed appointment
			$updateP = "UPDATE patient, appointment SET appointment.patient_id = patient.patient_id, open_appt=$apptClosed  
			WHERE time_appt = '$valueT' and '$userName' = patient.u_name and '$passWord' = patient.pass_word";
			
			//Checks error
			/*
			if (mysqli_query($db, $updateP)) 
			{
				echo "Record updated successfully";
			} 
			else 
			{
				echo "Error updating record: " . mysqli_error($db);
			} 
			print(" ");
		*/	
			
	}
		
?>
  		
<body>

	<!-- navigation bar --> 
	<div class="title">
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/home/home.html">
		<!-- img src should point to logo.png in Julia's directory --> 
		<img class = "logo" src="https://swe.umbc.edu/~jsint1/is448/JMMT/logo.png" alt="logo"> </a> 
	</div>

	<div class="dropbar"> 
	<button class="dropbutton">Contact</button>
		<div class="content">
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/contact_us/contact_us">Contact Us</a>
		</div>
	</div>

	<div class="dropbar"> 
	<button class="dropbutton">Appointments</button>
		<div class="content">
		<a href="#">Appointment History</a>
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/schedule/schedule_appt.html">Schedule Appointment</a>
		</div>
	</div>

	<div class="dropbar">
	<button class="dropbutton">Account</button>
		<div class="content">
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/create_account/create_account.html">Create New Account</a>
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/sign_in.htm">Profile</a>
		</div>
	</div>

	<div class="dropbar">
	<button class="dropbutton">About</button>
		<div class="content">
		<a href="https://swe.umbc.edu/~jsint1/is448/JMMT/about.htm">About Us</a>
		</div>
	</div>
 
	<br/><br/>
 
	<!-- Confirmation content -->
	

	
	


    <br><br>

<div class = "main">
	
		<h3> Your Apppointment Has Been Confirmed!  </h3>
		<br>
		
		<h3> <?php echo "Appointment Date: 03/16/2020". '<br>'. "Time: " .$valueT; ?> </h3>
		<br>
		
		<form method="GET" action="https://swe.umbc.edu/~jsint1/is448/JMMT/schedule/viewAppt.html">

			<h4> Please state the reason for your visit:<br/> 
			<textarea rows="7" cols="80" name="reason" id="reason"> 
				</textarea> </h4>
			
			<!-- submitting form will retrieve info from DB once we develop php code, this page will later
				 reiterate the appointment information on this page --> 
			<br/> 
			<h4> Reminder: </h4>
			<p>Please arrive at least 15 minutes prior to your scheduled appointment. <br/>
			Bring your insurance card and a valid form of ID. </p>
	  
			<br><br>
			
			<div class = "home"> 
				<!-- links to schedule appointment page --> 
				<a href="https://swe.umbc.edu/~jsint1/is448/JMMT5/home/home.html"> Back to Home Page </a> 
			</div>
	 
		</form>  
</div>


 
</body>
</html>

  
  
  