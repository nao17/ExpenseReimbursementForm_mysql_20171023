<html>
<head>
<title>reimbursement form</title>
<link rel="stylesheet" type="text/css" href="display_style.css">
</head>

<h1>Reimbursement system</h1>
<h2>Edit register screen</h2>

<?php
echo "Connecting to database... </br>";
try {
$pdo = new PDO('mysql:host=localhost;dbname=AccountingDB;charset=utf8','root','root',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>

<?php
$sql = "SELECT * FROM AccountingDataTb2";
$stmh = $pdo->prepare($sql);
$stmh->execute();
//$rows = $stmh->fetchAll();
echo "<table>";
echo "<tr>";

$ArrayDisplay= array('id', 'name', 'amount of money', 'purpose', 'place to purchase', 'purchase date', 'purchase month', 'registered date');
$NumArrayDisplay = count($ArrayDisplay);
/*使うまで放置
$NumDispay = 20;
echo "最新$NumDispay 件の申請を表示します。";*/
for ($i=0; $i < $NumArrayDisplay  ; $i++) {

	echo "<td>$ArrayDisplay[$i]</td>";
}
echo "</tr>";

while($rows = $stmh->fetch(PDO::FETCH_ASSOC)){

echo "<tr>";
	foreach ($rows as $key) {
		echo "<td>$key</td>";
		# code...
	}
echo "</tr>";
}
?>

<?php

if (isset($_POST["Edit"])){

  $StoredEName = $_POST['EditedName'];
  $storedEMoney = $_POST['EditedMoney'];
  $storedEPurpose = $_POST['EditedPurpose'];
  $StoredEPlace = $_POST['EditedPlace'];
  $StoredEDate = $_POST['EditedDate'];
  $StoredEMonth = $_POST['EditedMonth'];

echo "if文と格納チェック：$StoredEName";

  $sql2 =  "update AccountingDataTb2 set name =:edit_name, money =:edit_money, purpose = :edit_purpose, place = :edit_place, month= :edit_month, date=:edit_date where id = 1" ;

$ArrayPDOedit = array(':edit_name' =>$StoredEName, ':edit_money' => $storedEMoney ,':edit_purpose' => $storedEPurpose, 'edit_place' => $StoredEPlace, ':edit_month' =>  $StoredEMonth, 'edit_date' => $StoredEDate);

var_dump($ArrayPDOedit);
  $stmt = $pdo -> prepare($sql2);


/*
  $stmt->bindValue(":edit_name", "$StoredEName");
  $stmt->bindValue(":edit_money", "$storedEMoney");
  $stmt->bindValue(":edit_purpose", "$storedEPurpose");
  $stmt->bindValue(":edit_place", "$StoredEPlace");
  $stmt->bindValue(":edit_month", "$StoredEDate");
  $stmt->bindValue(":edit_date", "$StoredEMonth");
echo "stmt文のexcute前チェック$stmt";*/

  $stmt->execute($ArrayPDOedit );

}

?>

<form method = "POST" action = "">
<p>
	 Name:<br />
	<input type = "text" name = "EditedName" size = "30" maxlength = "200">
</p>
<p>
	How much? :<br />
	<input type = "number" name = "EditedMoney" size = "30" maxlength = "100">
	YEN
</p>
<p>
	For what?:<br />
	<input type = "text" name = "EditedPurpose" size = "100" maxlength = "1000">
</p>
<p>
	Where? :<br />
	<input type = "text" name = "EditedPlace" size = "100" maxlength = "1000">
</p>

<p>
	The purchase date:
	<input type = "date" name = "EditedDate" size = "3" maxlength = "200">
</p>

<p>
	The purchase month:
<select name="EditedMonth">
<option value=1>Jan</option>
<option value=2>Feb</option>
<option value=3>Mac</option>
<option value=4>Apr</option>
<option value=5>May</option>
<option value=6>Jun</option>
<option value=7>July</option>
<option value=8>Aug</option>
<option value=9>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
</p>

<p>
	<input type = "submit" value = " Edit" name = "Edit">
  </p>
</form>
continue from here
<a href="http://localhost/ReimbursementForm/RegistrationForm_20171023.php">こちら</a>