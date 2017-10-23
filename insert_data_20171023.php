<?php
echo "mysqlDBに接続します...";
echo "STEP A";

$storedid = $_POST['Postedid'];
$StoredName = $_POST['PostedName'];
$storedMoney = $_POST['PostedMoney'];
$storedPurpose = $_POST['PostedPurpose'];
$StoredPlace = $_POST['PostedPlace'];



    //DBに接続
try {
$pdo = new PDO('mysql:host=localhost;dbname=AccountingDB;charset=utf8','root','root',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

echo "STEP B";

$sql = "SELECT * FROM AccountingDataTb";
$stmh = $pdo->prepare($sql);
$stmh->execute();
$rows = $stmh->fetchAll();
var_dump ($rows);



$sql = "INSERT INTO AccountingDataTb(id, name, money, purpose, place ) VALUES(:id, :name, :money, :purpose, :place)";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(":id", $storedid);
    $stmh->bindValue(":name", "$StoredName");
    $stmh->bindValue(":money", "$storedMoney");
    $stmh->bindValue(":purpose", "$storedPurpose");
    $stmh->bindValue(":place", "$StoredPlace");
    //以下略...
    $stmh->execute();


/*動かなかったやつ

require "DB_Manage.php";
try{

	$db = getDb();
	$stt = $db->prepare('INSERT INTO personal(ID, NAME)VALUES(:id,:name)');

  $stt -> bindValue(':id',$_POST['Postedid']);
  $stt -> bindValue(':name',$_POST['PostedName']);

  $stt -> execute();
	$db = NULL;
}catch(PDOException $e){
die("error:{$e->getMessage()}");
}*/
?>
<html>
<head>
<title>ok</title>
</head>
<body>
登録完了！
</body>
</html>
