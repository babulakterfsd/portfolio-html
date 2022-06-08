<?php
// get all inputs from user
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// email address of admin
$to ='xpawal@gmail.com';
// email subject
$subject = 'Message from Babulakter.com by '.$name.' ('.$email.')';
// form validation
if(!isset($name) || !isset($email) || !isset($message)) {
		$result = 'Please fill all inputs';
} else {
	if (strlen($name) < 3) {
		$result = 'Your name is too short';
	} elseif (strlen($name) > 20) {
		$result = 'Your name) is too long';
	} elseif (strlen($message) < 10) {
		$result = 'Your message is too short';
	} elseif (strlen($message) > 1000) {
		$result = 'Your message is too long';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = 'Invalid email address. Please input your email address correctly.';
	} else {
			if(mail($to,$subject,$message)) {
				// successfull
				$result = 'Your message was sent successfully. I will reply you soon';
			} else {
				// mail was not sent somehow
				$result = 'Sorry, something went wrong. Please send an email to '.$to.' from your email or text/call me directly on my mobile';
			}
	}
}
// let user know the result and redirect to the form page
//coded with love by babul Akter
echo '<script>
alert(\''.$result.'\');
</script>
<meta http-equiv="refresh" content="1; url=index.html">';
?>