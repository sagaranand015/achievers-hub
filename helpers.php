<?php 

// this is the file for all the helper functions in the contact us page.

//these are for the PHP Helper files
include 'headers/databaseConn.php';

// for mandrill mail sending API.
require_once 'mandrill/Mandrill.php'; 

// to get the back button 
function GetBackButton() {
	$resp = "";
	try {
		$resp .= "<h6 class='page-header'></h6>";
		$resp .= "<button class='btn btn-lg btn-primary btn-block btn-back'>Go Back</button>";
		return $resp;
	}
	catch(Exception $e) {
		$resp = "-1";
		return $resp;
	}
}

// to get the buttons for download and Go back
function GetDownloadButton($uid) {
	$resp = "";
	try {
		$resp .= "<button class='btn btn-lg btn-primary btn-block btn-download' data-id='" . $uid . "'>Download</button>";
		return $resp;
	}
	catch(Exception $e) {
		$resp = "-1";
		return $resp;
	}
}

// to get the HTML for showing the Mentee Details cert details
function GetCertificateDetails($name, $email, $mobile, $uid, $edition, $position, $course) {
	$resp = "";
	try {
		$resp .= "<div class='col-lg-4 col-md-4'>";
		$resp .= "<a href='http://mentored-research.com/get/mycert/" . $uid . ".pdf' class='thumbnail cert-thumbnail'><img class='img-cert' src='http://thumbnail.datalogics-cloud.com/?inputURL=http://mentored-research.com/get/mycert/" . $uid . ".pdf' alt='Certificate: " . $uid . "' /></a>";
		$resp .= "</div>";

		$resp .= "<div class='col-lg-8 col-md-8 text-cert'>";
		$resp .= "<h2>" . $course . " | " . $edition .  "</h2>";
		$resp .= "</div>";

		return $resp;
	}
	catch(Exception $e) {
		$resp = "-1";
		return $resp;
	}
}

// check if the user has been certified or not
function CheckCertification($val) {
	$resp = "-1";
	try {
		if($val == "0") {
			$resp = "0";
		} else if($val == "1") {
			$resp = "1";
		} else {
			$resp = "-2";
		}
		return $resp;
	}
	catch(Exception $e) {
		$resp = "-1";
		return $resp;
	}
}

?>