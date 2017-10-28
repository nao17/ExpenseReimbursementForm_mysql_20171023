<html>
<head>
<title>reimbursement form</title>
</head>

<h1>Reimbursement form 2017</h1>

<body>
<form method = "POST" action = "insert_data_20171023.php">
<p>
	 Name:<br />
	<input type = "text" name = "PostedName" size = "30" maxlength = "10">
</p>
<p>
	How much? :<br />
	<input type = "number" name = "PostedMoney" size = "30" maxlength = "100">
</p>
<p>
	For what?:<br />
	<input type = "text" name = "PostedPurpose" size = "100" maxlength = "1000">
</p>
<p>
	Where? :<br />
	<input type = "text" name = "PostedPlace" size = "100" maxlength = "1000">
</p>

<p>
	The purchase date:
	<input type = "date" name = "PostedDate" size = "3" maxlength = "10">
</p>

<p>
	The purchase month:
<select name="PostedMonth">
<option value=1>Jan</option>
<option value=2>Feb</option>
<option value=3>Mac</option>
<option value=4>Apr</option>
<option value=5>Feb</option>
<option value=6>Mac</option>
<option value=7>Jan</option>
<option value=8>Aug</option>
<option value=9>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
</p>

<p>
	<input type = "submit" value = " submit" />
  </p>
</form>

<h2>今までに申請された経費は以下の通りです。</h2>
<?php
try {
$pdo = new PDO('mysql:host=localhost;dbname=AccountingDB;charset=utf8','root','root',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM AccountingDataTb2";
$stmh = $pdo->prepare($sql);
$stmh->execute();
$rows = $stmh->fetchAll();
for ($i=0; $i < 5 ; $i++) {
	# code...
	echo "$rows[$i]";
}
var_dump ($rows);
 ?>
</body>

</html>
