<?php
session_start(); ?>

 <html>
 <head>
 <title>メイン画面</title>
 <link rel="stylesheet" type="text/css" href="display_style.css">
 <meta http-equiv="content-type" charset="utf-8">
 </head>

 <header>
	<h1>Reimbursement system</h1>
 		<p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんとしてログインしています。</p>
 <ul>
 		<li><a href="main.php">マイページ</a>に戻る</li>
 </ul>

 </header>

<h3>DELETE / EDIT YOUR POST　</h3>
<h4>（投稿の削除 / 編集)</h4>

<form method="post" action="delete_data_20171030.php">
     Delete the seleted post：<br />
     <input type="number" name="NumberDel"> <input type="submit" name="delete" value="DELETE">
   </form>
