<html>
<head>
<title>reimbursement form</title>
</head>

<body>
<form method = "POST" action = "insert_data_20171023.php">
<p>
	ID:<br />
	<input type = "number" name = "Postedid" size = "3" maxlength = "100">
</p><p>
	 name:<br />
	<input type = "text" name = "PostedName" size = "30" maxlength = "10">
</p>
<p>
	how much? (amount of money):<br />
	<input type = "number" name = "PostedMoney" size = "30" maxlength = "100">
</p>
<p>
	why? (the purpose of money used):<br />
	<input type = "text" name = "PostedPurpose" size = "30" maxlength = "100">
</p>
<p>
	where? (the place you bought it):<br />
	<input type = "text" name = "PostedPlace" size = "30" maxlength = "100">
</p>

<p>
	<input type = "submit" value = "登録" />
  </p>
</form>

</body>

</html>
