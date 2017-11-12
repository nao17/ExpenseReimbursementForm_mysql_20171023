<?php
session_start();



 ?>
 <html>
 <head>
 <title>メイン画面</title>
 <link rel="stylesheet" type="text/css" href="display_style.css">
 <meta http-equiv="content-type" charset="utf-8">
 </head>

     <body>
         <h1>マイページ</h1>
         <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
         <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->

         <ul>
             <li><a href="RegistrationForm_20171023.php">経費の新規申請フォーム</a></li>

             <li><a href="edit_data_20171030.php">経費の編集フォーム</a></li>
         </ul>


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
      ?>



         <ul>
             <li><a href="logout_20171112.php">ログアウト</a></li>
         </ul>
     </body>
 </html>
