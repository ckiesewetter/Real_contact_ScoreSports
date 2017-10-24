<?php

if(isset($_POST['Email_Address'])) {

	include 'freecontactformsettings.php';

	function died($error) {
		echo "Sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}

	if(!isset($_POST['Full_Name']) ||
		!isset($_POST['Email_Address']) ||
		!isset($_POST['Telephone_Number']) ||
		!isset($_POST['Your_Message']) ||
		!isset($_POST['AntiSpam'])
		) {
		died('Sorry, there appears to be a problem with your form submission.');
	}
// President Info sent back
	$full_name = $_POST['Full_Name']; // required
	$account = $_POST['Account']; // required
	$email_from = $_POST['Email_Address']; // required
	$billing = $_POST['Billing']; // required
	$organization = $_POST['Organization']; // required
	$telephone = $_POST['Telephone_Number']; // not required
	$rep = $_POST['Rep']; // required
	$comments = $_POST['Your_Message']; // required
	$antispam = $_POST['AntiSpam']; // required
// Treasure Info Sent
	$full_name2 = $_POST['Full_Name']; // required
	$account2 = $_POST['Account']; // required
	$email_from2 = $_POST['Email_Address']; // required
	$billing2 = $_POST['Billing']; // required
	$organization2 = $_POST['Organization']; // required
	$telephone2 = $_POST['Telephone_Number']; // not required
	$rep2 = $_POST['Rep']; // required
// Main Purchaser
  $full_name3 = $_POST['Full_Name']; // required
	$account3 = $_POST['Account']; // required
	$email_from3 = $_POST['Email_Address']; // required
	$billing3 = $_POST['Billing']; // required
	$organization3 = $_POST['Organization']; // required
	$telephone3 = $_POST['Telephone_Number']; // not required
	$rep3 = $_POST['Rep']; // required




	$error_message = "";

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(preg_match($email_exp,$email_from)==0) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($full_name) < 2) {
  	$error_message .= 'Your Name does not appear to be valid.<br />';
  }
  // if(strlen($comments) < 2) {
  // 	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  // }

  if($antispam <> $antispam_answer) {
	$error_message .= 'The Anti-Spam answer you entered is not correct.<br />';
  }

  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\r\n";

	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}
// President
	$email_message .= "President/Commissioner Full Name: ".clean_string($full_name)."\r\n";
	$email_message .= "President/Commissioner Account Number: ".clean_string($account)."\r\n";
	$email_message .= "President/Commissioner Email: ".clean_string($email_from)."\r\n";
	$email_message .= "President/Commissioner Billing Address: ".clean_string($billing)."\r\n";
	$email_message .= "President/Commissioner Organization: ".clean_string($organization)."\r\n";
	$email_message .= "President/Commissioner Telephone: ".clean_string($telephone)."\r\n";
	$email_message .= "President/Commissioner Rep: ".clean_string($rep)."\r\n";
	$email_message .= "President/Commissioner Message: ".clean_string($comments)."\r\n";
// Treasurer
	$email_message .= "Treasurer Bill To Full Name: ".clean_string($full_name2)."\r\n";
	$email_message .= "Treasurer Bill To Account Number: ".clean_string($account2)."\r\n";
	$email_message .= "Treasurer Bill To Email: ".clean_string($email_from2)."\r\n";
	$email_message .= "Treasurer Bill To Billing Address: ".clean_string($billing2)."\r\n";
	$email_message .= "Treasurer Bill To Organization: ".clean_string($organization2)."\r\n";
	$email_message .= "Treasurer Bill To Telephone: ".clean_string($telephone2)."\r\n";
	$email_message .= "Treasurer Bill To Rep: ".clean_string($rep2)."\r\n";
 //Main Purchaser
	 $email_message .= "Main Purchaser Full Name: ".clean_string($full_name3)."\r\n";
	 $email_message .= "Main Purchaser Account Number: ".clean_string($account3)."\r\n";
	 $email_message .= "Main Purchaser Email: ".clean_string($email_from3)."\r\n";
	 $email_message .= "Main Purchaser Billing Address: ".clean_string($billing3)."\r\n";
	 $email_message .= "Main Purchaser Organization: ".clean_string($organization3)."\r\n";
	 $email_message .= "Main Purchaser Telephone: ".clean_string($telephone3)."\r\n";
	 $email_message .= "Main Purchaser Rep: ".clean_string($rep3)."\r\n";



$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
header("Location: $thankyou");
?>
<script>location.replace('<?php echo $thankyou;?>')</script>
<?php
}
die();
?>
