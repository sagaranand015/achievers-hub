<?php 

// this is the file for all the AJAX Requests from the contact us page.

//these are for the PHP Helper files
include ('headers/databaseConn.php');
include('helpers.php');

if(isset($_GET["no"]) && $_GET["no"] == "1") {  // for getting the certificate from the db
	GetCertificate($_GET["data"]);
}

// for getting the certificate from the db
// returns html on success, 0 if does not exists, -1 on error, -2 invalid value in db
function GetCertificate($id) {
	$resp = "-1";
	$name = "";
	try {
		$query = "select * from fall2015eri where Email='$id' or UID='$id';";
		$rs = mysql_query($query);
		if(!$rs) {
			$resp = "-1";
		} else {
			if(mysql_num_rows($rs) > 0) {
				$resp = "";

				// for the name as the header
				$resp .= "<div class='col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 cert-main'>";
				$resp .= "<h1 class='page-header header-cert'></h1>";
				while ($res = mysql_fetch_array($rs)) {
					$isCertified = CheckCertification($res["Eligible"]);
					$name = $res["Name"];

					if($isCertified == "0") {  // not certified case



					} else if($isCertified == "1") {  // certified case

						$resp .= GetCertificateDetails($res["Name"], $res["Email"], $res["Mobile"], $res["UID"], $res["Edition"], $res["Position"], $res["Course"]);
						$resp .= GetDownloadButton($res["UID"]);

					} else {
						$resp = "-2";
					}
				}
				$resp .= GetBackButton();
				$resp .= "</div>";  // end of the main div
			} else {
				$resp = "0";
			}
		}
		echo $resp . " ~~ " . $name;
	}
	catch(Exception $e) {
		$resp = "-1";
		echo $resp;
	}
}

?>