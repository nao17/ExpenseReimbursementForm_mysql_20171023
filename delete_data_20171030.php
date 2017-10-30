<?php

$StoredNumberDel = $_POST['NumberDel'];


if (isset($_POST['delete']))
{ /*あとで実装
  echo "Do you really want to delete the post No.$StoredNumberDel?<br>";
  echo "本当に削除しても構いませんか？<br>";}
*/
  ?>

  <?php
  echo "Connecting to database </br>";
  try {
  $pdo = new PDO('mysql:host=localhost;dbname=AccountingDB;charset=utf8','root','root',
  array(PDO::ATTR_EMULATE_PREPARES => false));
  } catch (PDOException $e) {
   exit('データベース接続失敗。'.$e->getMessage());
  }

    echo "deleting the post </br>";
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql_del = 'delete from AccountingDataTb2 where id = :delete_id';
      $stmt_del = $pdo->prepare($sql_del);
 		 $params = array(':delete_id'=>$StoredNumberDel);
      $flag = $stmt_del->execute($params);

  if ($flag){
 			 print('データの削除に成功しました<br>');
 	 }else{
 			 print("データの削除に失敗しました<br> ");
 	 }}

   ?>

<?php  /*
<html lang="ja">
<body>
  <div>
  <form action="" method="post">
<input type="hidden" name="idDelPwConf" value="<?= $_POST['delno'] ?>">
     Password: <br />
     <input type="password" name="PwConfirmDel" size="30" maxlength="30">  <br />
       <br />
     <input type="submit" name = "registerConfirmDel" value="Register">
     <br />

 </form>
 </div>

 */?>

 登録完了！

 経費申請を続ける場合は<a href="http://localhost/ReimbursementForm/RegistrationForm_20171023.php">こちら</a>
 
 </body>
 </html>
