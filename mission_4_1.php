
<!DOCTYPE html>
<html>
<head>
 <title>ただの掲示板</title>
 <meta http-equiv="content-type" charset="utf-8">
</head>
<body>
	<h1>ただの掲示板</h1>
  <form class="contact-form" action="mission_4_1.php" method="post">
   <p>各項目に記入して送信ボタンを押してください</p>
   <div class="item">
     <label class="label" for="name" name="name">名前</label>
     <input id="name" type="text" name="name">
   </div>
   <div class="item">
     <label class="label" for="password">パスワード</label>
     <input id="password" type="password" name="password">
   </div>
   <div class="item">
     <label class="label" for="comment">コメント&nbsp;&emsp;</label>
     <textarea rows="4" id="comment" placeholder="コメントを記入してください" name="comment"></textarea>
   </div>
   <div class="item no-label">
     <input type="submit">
   </div>
 </form>
 <form class="edit-form" action="mission_4_1.php" method="post">
  <p>投稿の変更または削除を行いたい場合はパスワードを入力して編集ボタンを押してください</p>
  <div class="item">
    <label class="label" for="editnum" name="editnum">編集番号&nbsp;&emsp;</label>
    <input id="editnum" type="text" name="editnum">
  </div>
  <div class="item">
    <label class="label" for="password">パスワード&nbsp;</label>
    <input id="password" type="password" name="edit_password">
  </div>
  <div class="item no-label">
    <input type="submit" value = "編集">
  </div>
</form>
<?php
session_start();
//投稿フォームから送られてくるデータ
$comment = $_POST['comment'];
$name = $_POST['name'];
$date = date("Y/m/d H:i:s");
$form_password = $_POST['password'];//フォームからのパスワード
$latest_id += 1;//投稿番号
$editnum = $_POST['editnum'];
$edit_password = $_POST['edit_password'];//フォームからのパスワード


//編集フォームから送られてくるデータ
$del_flug = $_POST['del_flug'];//編集フォームから送られてくる削除番号
$edit_comment = $_POST['edit_comment'];//編集フォームから送られてくるコメント
$edit_name = $_POST['edit_name'];//編集フォームから送られてくる名前
$edit_flug = $_POST['edit_flug'];//編集フォームから送られてくる編集番号

//データベース接続
$dsn='mysql:dbname=***;host=***';
$user = '***';
$password = '***';
$pdo = new PDO($dsn,$user,$password
		,  array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			)
		);


//データベース内にテーブル作成
$sql= "CREATE TABLE mission_4_3"
." ("
. "id INT,"
. "name char(32),"
. "comment TEXT,"
. "date TEXT,"
. "password TEXT"
.");";
$stmt = $pdo->query($sql);



//=============フォーム移動==================

if(preg_match('/^[0-9]+$/', $editnum)){
	$sql = 'SELECT * FROM mission_4_3';
	$results = $pdo -> query($sql);
	foreach ($results as $row){
		if($row['id'] == $editnum && $row['password'] == $edit_password){
			$_SESSION['editnum'] = $_POST['editnum'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['comment'] = $row['comment'];
			$_SESSION['password'] = $edit_password;
			header("location: mission_4_1_deleate.php");
		}
	}
	echo "<p class='error'>パスワードが違います</p>";
}
?>

 <style>
 h1{
position: relative;
padding: 0.5em;
background: #a6d3c8;
color: white;
}

h1::before {
position: absolute;
content: '';
top: 100%;
left: 0;
border: none;
border-bottom: solid 15px transparent;
border-right: solid 20px rgb(149, 158, 155);
}

.error {
	padding:12px;
	font-weight:850;
	color:#262626;
	background:#FFEBE8;
	border:2px solid #990000;
	position: relative;
	 bottom:225px;
	 left:30px;
	 max-width: 800px;
}

.success {
  padding:12px;
  font-weight:850;
  color:#262626;
  background:#CCFFCC;
  border:2px solid #00CC00;
  position: relative;
   bottom:225px;
   left:30px;
   max-width: 800px;
}

 .contact-form {
   max-width: 350px;
   border: 1px solid #ccc;
   padding: 10px;
   font-size: 15px;
   font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", YuGothic, "ヒラギノ角ゴ ProN W3", Hiragino Kaku Gothic ProN, Arial, "メイリオ", Meiryo, sans-serif;
   position: relative;
   	left:30px;

 }
 .contact-form .item {
   display: block;
   overflow: hidden;
   margin-bottom: 10px;
 }
 .contact-form .item.no-label {
   padding: 5px 0px 5px 60px;
 }
 .contact-form .item .label {
   float: left;
   padding: 5px;
   margin:0;
 }
 .contact-form .item input[type=text],
 .contact-form .item input[type=password],
 .contact-form .item textarea {
   display: block;
   margin-left: 80px;
   width: 130px;
   padding: 5px;
   border: 1px solid #ccc;
   box-sizing: border-box;
   font-size: 13px;
 }
 .contact-form .item ::placeholder {
   color: #ccc;
 }
 .contact-form .item textarea {
   outline: none;
   border: 1px solid #ccc;
   resize: vertical;
 }
 .contact-form .item.no-label input[type=submit] {
   border: none;
   outline: none;
   display: block;
   line-height: 30px;
   margin-left: 20px;
   width: 160px;
   text-align: center;
   font-size: 13px;
   color: #fff;
   background-color: #696;
   border-bottom: 4px solid #464;
   cursor:pointer;

   box-sizing: content-box;
   transition:0.1s ease all
 }
 input[type=submit]:hover{
   opacity:0.6;
 }


 .edit-form {
   max-width: 350px;
   border: 1px solid #ccc;
   padding: 10px;
   font-size: 15px;
   font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", YuGothic, "ヒラギノ角ゴ ProN W3", Hiragino Kaku Gothic ProN, Arial, "メイリオ", Meiryo, sans-serif;
   position: relative;
   	bottom:240px;
   	left:410px;

 }
 .edit-form .item {
   display: block;
   overflow: hidden;
   margin-bottom: 10px;
 }
 .edit-form .item.no-label {
   padding: 5px 0px 5px 60px;
 }
 .edit-form .item .label {
   float: left;
   padding: 5px;
   margin:0;
 }
 .edit-form .item input[type=password],
 .contact-form .item textarea {
   display: block;
   margin-left: 60px;
   width: 200px;
   padding: 5px;
   border: 1px solid #ccc;
   box-sizing: border-box;
   font-size: 13px;
 }
 .edit-form .item input[type=text],
 .edit-form .item textarea {
   display: block;
   margin-left: 60px;
   width: 50px;
   padding: 5px;
   border: 1px solid #ccc;
   box-sizing: border-box;
   font-size: 13px;
 }
 .edit-form .item ::placeholder {
   color: #ccc;
 }
 .edit-form .item textarea {
   outline: none;
   border: 1px solid #ccc;
   resize: vertical;
 }
 input[type=submit] {
   border: none;
   outline: none;
   display: block;
   line-height: 30px;
   margin-left: 20px;
   width: 80px;
   text-align: center;
   font-size: 13px;
   color: #fff;
   background-color: #c30;
   border-bottom: 4px solid #930;
   cursor:pointer;

   box-sizing: content-box;
   transition:0.1s ease all
 }
 input[type=submit]:hover{
   opacity:0.6;
 }
 </style>
</form>
</boby>
</html>




<?php




//=============削除処理==================

if(preg_match('/^[0-9]+$/', $del_flug)){
	$sql = "update mission_4_3 set id='0' where id = $del_flug"; //削除したいIDを「0」にすることで表示されないようにする。
	$result = $pdo->query($sql);
  echo "<p class='success'>"."$del_flug"."番の投稿を削除しました。</p>";
}



//=============編集処理==================

if(preg_match('/^[0-9]+$/', $edit_flug)){
	if (!(mb_ereg_match("^(\s|　)+$",$edit_comment) || $edit_comment == "" || mb_ereg_match("^(\s|　)+$",$edit_name) || $edit_name == "")){
		$sql = "update mission_4_3 set name='$edit_name',comment='$edit_comment',date='$date',password='$form_password' where id = $edit_flug";
		$result = $pdo->query($sql);
    echo "<p class='success'>"."$edit_flug"."番の投稿を編集しました。</p>";
	}else{
    	echo "<p class='error'>不正な入力です。</p>";
  }
}



//=============新規投稿処理==================

//IDのカウント処理
$sql = 'SELECT * FROM mission_4_3';
$results = $pdo -> query($sql);
foreach ($results as $row){
$latest_id += 1;
}


//テーブルに書き込み
if (!(mb_ereg_match("^(\s|　)+$",$comment) || $comment == "" || mb_ereg_match("^(\s|　)+$",$name) || $name == "")){
$sql = $pdo -> prepare("INSERT INTO mission_4_3 (id,name, comment,date,password) VALUES (:id,:name, :comment,:date,:password)");
$sql -> bindParam(':id', $id, PDO::PARAM_STR);
$sql -> bindParam(':name', $name, PDO::PARAM_STR);
$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
$sql -> bindParam(':date', $date, PDO::PARAM_STR);
$sql -> bindParam(':password', $form_password, PDO::PARAM_STR);
$id = $latest_id;
$date = date("Y/m/d H:i:s");
$sql -> execute();
echo "<p class='success'>投稿しました。</p>";
}elseif (!$form_password=="" && $edit_flug==""){
  echo "<p class='error'>不正な入力です。</p>";
}
?>


<!--=========表示動作=========-->
<html>
<head></head>
<body>
  <div id="show_table">
<p>
<?php
$sql = 'SELECT * FROM mission_4_3';
$results = $pdo -> query($sql);
foreach ($results as $row){
	if (!$row['id'] == '0'){
		echo $row['id'].'&emsp;';
		echo $row['name'].'&emsp;';
		echo $row['date'].'<br>';
		echo '&emsp;&nbsp;'.$row['comment'].'<br><br>';
	}
}
?>
</p>
</div>
<style>
#show_table {
	max-width: 1400px;
  position: relative;
  bottom: 210px;
  left: 30px;
	border: 1px solid #ccc;
	padding: 5px;
}

</style>
</body>
</html>
