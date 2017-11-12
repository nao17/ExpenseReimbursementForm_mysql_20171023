<!doctype html>
<html>
    <head>
            <meta charset="UTF-8" >
            <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form id="loginForm"  name="loginForm"  action="login_result_20171111.php"  method="POST" >
            <fieldset>
                <legend>ログインフォーム</legend>
                <div><font color="#ff0000" ><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="userid" >ユーザーID</label><input type="text"  id="userid"  name="userid"  placeholder="ユーザーIDを入力"   >
                <br>
                <label for="password" >パスワード</label><input type="password"  id="password"  name="password"    placeholder="パスワードを入力" >
                <br>
                <input type="submit"  id="login"  name="login"  value="ログイン" >
            </fieldset>
        </form>
        <br>
        <form action="signup_20171112.php" >
            <fieldset>
                <legend>新規登録フォーム</legend>
                <input type="submit"  value="新規登録" >
            </fieldset>
        </form>
    </body>
</html>
