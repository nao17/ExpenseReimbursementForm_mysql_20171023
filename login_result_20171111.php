<?php

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
    $key_pass_login_name =  $key_pass_login['name'] ;
  //  var_dump($rows_pass_login['password']);

    header("Location: RegistrationForm_20171023.php");

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
/*

stmt = $pdo->prepare('SELECT * FROM userData WHERE name = ?' );
$stmt->execute(array($userid));

if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (password_verify($password, $row['password' ])) {


        // 入力したIDのユーザー名を取得 $id = $row['name' ];
        $sql = "SELECT * FROM userData WHERE name = $userid" ;  //入力したIDからユーザー名を取得
        $stmt = $pdo->query($sql);
        foreach ($stmt as $row) {
            $row['name' ];  // ユーザー名
        }
        $userid = $row['name' ];
        echo "一致しました";
      //  header("Location: Main.php" );  // メイン画面へ遷移
        exit();  // 処理終了
*/ }



 ?>
