<html>
<head>
<title>reimbursement system</title>
<link rel="stylesheet" type="text/css" href="display_style.css">
</head>

<h1>Reimbursement system</h1>
<h2>Register form 2017</h2>

<body>
<form method = "POST" action = "insert_data_20171023.php">
<p>
	 Name:<br />
	<input type = "text" name = "PostedName" size = "30" maxlength = "10">
</p>
<p>
	How much? :<br />
	<input type = "number" name = "PostedMoney" size = "30" maxlength = "100">
	YEN
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
	<input type = "submit" value = " submit" />
  </p>
</form>

<h2>今までに申請された経費は以下の通りです。</h2>
<?php

$DataBase = 'mysql:host=localhost;dbname=AccountingDB;charset=utf8';
$user = "root";
$password = "root";
/*try内でやる
$mysql_INfO = new PDO ($DataBase, $user, $password );
 */
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
//$rows = $stmh->fetchAll();
echo "<table>";
echo "<tr>";

$ArrayDisplay= array('id', 'name', 'amount of money', 'purpose', 'place to purchase', 'purchase date', 'purchase month', 'regestered date');
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

/*なぜか二重に取得されるのでわかるまで放置。
for ($i=0; $i < $NumArrayDisplay  ; $i++) {

	echo "<td>$ArrayDisplay[$i]</td>";
}
echo "</tr>";

echo "<tr>";
foreach ($rows as $key) {


	foreach ($key as $key2) {

		echo "$key2";

	}
}
*/
echo "</tr>";
echo "</table>";


 ?>
 <h2>DELETE / EDIT YOUR POST</h2>
 <?php /*遷移先で処理する
 echo "申請の削除はこちらから。</br>";

 $sql_del = 'delete from AccountingDataTb2 where id = :delete_id';
     $stmt_del = $pdo->prepare($sql_del);
		 $params = array(':delete_id'=>2);
     $flag = $stmt_del->execute($params);

 if ($flag){
			 print('データの削除に成功しました<br>');
	 }else{
			 print("データの削除に失敗しました<br> ");
	 }
*/
  ?>
	  <form action="delete_data_20171030.php" method="post">
			<h3>DELETE / EDIT YOUR POST　</h3>
<h4>（投稿の削除 / 編集)</h4>

<form method="post" action="">
           Delete the seleted id：<br />
           <input type="number" name="NumberDel"> <input type="submit" name="delete" value="DELETE">
       </form>
       <br />

</body>

</html>
