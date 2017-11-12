
<?php

if (isset($_POST["signUp"])) {
  $s_username= $_POST['username'];
  $s_password = $_POST['password'];
  $s_password2 = $_POST['password2'];
echo "$s_username";


    if (empty($s_username)) {  // emptyは値が空のとき
        $errorMessageN ="ユーザーIDが未入力です。" ;
        echo "$errorMessageN";
    }

    if (empty($s_password)) {
        $errorMessageP = "パスワードが未入力です" ;
        echo "$errorMessageP";
    }

    if (empty($s_password2)) {
        $errorMessageP2 = "確認パスワードが未入力です" ;
        echo "$errorMessageP2";
    }

  ///PDO接続
  try {
  $pdo = new PDO('mysql:host=localhost;dbname=loginManagement;charset=utf8','root','root',
  array(PDO::ATTR_EMULATE_PREPARES => false));
  } catch (PDOException $e) {
   exit('データベース接続失敗。'.$e->getMessage());
 }


  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if (isset($s_username)) {
if ($s_password == $s_password2) {
  echo "パスワードが一致しました。";


//$ArrayPDOeditID = array(':id' => $StoredEid);
  $sql = "INSERT INTO userData(name, password) VALUES(:name, :password)";

  //暗号化
  $hash = password_hash($s_password, PASSWORD_DEFAULT);
  //格納
  $ArrayPDOpass = array(':name' =>$s_username, ':password' => $hash);
      //先に型を準備
      $stmh = $pdo->prepare($sql);
      //型に中身を入れる
      $stmh->execute($ArrayPDOpass);
      echo "あなたのuserIDは". $s_username. "です。またパスワードは". $s_password. "です。";
      echo '<a href="login_manage_20171111.php">ログインフォーム</a>からログインしてください。';
      ?>



<?
}else {
  echo "パスワードが一致しません。再度入力してください。";
}
}


}

 ?>


<!doctype html>
<html>
    <head>
            <meta charset="UTF-8" >
            <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm"  name="loginForm"  action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>

                <label for="username" >ユーザー名</label><input type="text"  id="username"  name="username"  placeholder="ユーザー名を入力"  value="<?php if (!empty($_POST["username" ])) {echo htmlspecialchars($_POST["username" ], ENT_QUOTES);} ?>" >
                <br>
                <label for="password" >パスワード</label><input type="password"  id="password"  name="password"  value="" placeholder="パスワードを入力" >
                <br>
                <label for="password2" >パスワード(確認用)</label><input type="password"  id="password2"  name="password2"  value="" placeholder="再度パスワードを入力" >
                <br>
                <input type="submit"  id="signUp"  name="signUp"  value="新規登録" >
            </fieldset>
        </form>
        <br>
        <form action="login_manage_20171111.php" >
            <input type="submit"  value="" >
        </form>
    </body>
</html>
