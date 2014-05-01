<?php
	if (isset($_POST["from"]))
	{
		$from = $_POST["from"]; // sender
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$message = wordwrap($message, 70);
		mail("programmaniaks@gmail.com",$subject,$message,"From: $from\n");
		echo "Thank you. We will respond you early";
	}