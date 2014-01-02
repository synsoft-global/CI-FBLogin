<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Facebook login</title>
</head>
<body>
<?php 
$result = $this->session->userdata('username');
echo "!!!Login Success !!!</br>";
echo "!!Hello ".$result."!!"; 
?>
</html>