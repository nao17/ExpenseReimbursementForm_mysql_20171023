<?php

// セッション開始
session_start();

if (isset($_POST["login" ])) {

  if (empty($_POST["userid" ])) {  // emptyは値が空のとき
      $errorMessage ="ユーザーIDが未入力です。" ;
      echo "$errorMessage";
  } else if (empty($_POST["password" ])) {
      $errorMessage = "パスワードが未入力です" ;
      echo "$errorMessage";
  }

///PDO接続
try {
$pdo = new PDO('mysql:host=localhost;dbname=loginManagement;charset=utf8','root','root',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<?php
$userid = $_POST["userid" ];
$password = $_POST["password" ];

$sql_pass_login= 'select * from userData where name =:login_id';
$Array_userid = array(':login_id'=>$userid );
$stmt_pass_login = $pdo -> prepare($sql_pass_login);
$stmt_pass_login -> execute($Array_userid);

while($rows_pass_login = $stmt_pass_login->fetch(PDO::FETCH_ASSOC)){
  //var_dump($rows_pass_login);
  if (password_verify($password,  $rows_pass_login['password' ])) {
    $_SESSION["NAME" ]  =  $rows_pass_login['name'] ;

  //  var_dump($rows_pass_login['password']);

    header("Location: main.php");

    exit();

  }else {
    echo "認証に失敗しました。";
  }


  foreach ($rows_pass_login as $key_pass_login) {
/*pdo passwordの仕組みを調べる
    var_dump( $key_pass_login);
    var_dump($key_pass_login[0]);
    var_dump($key_pass_login[1]);
    */

		}
  }
 }



 ?>
