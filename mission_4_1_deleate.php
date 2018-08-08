<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>編集フォーム</title>
 <meta http-equiv="content-type" charset="utf-8">
</head>
<body>
	<h1>編集フォーム</h1>
  <form class="contact-form" action="mission_4_1.php" method="post">
   <p>各項目に記入して送信ボタンを押してください<br>
     削除したい場合は削除ボタンを押してください</p>
   <div class="item">
     <label class="label" for="name" name="name">名前</label>
     <input id="name" type="text" name = "edit_name", "text" value = "<?php echo $_SESSION['name'];?>">
   </div>
   <div class="item">
     <label class="label" for="password">パスワード</label>
     <input id="password" type="password" name = "password", "text" value = "<?php echo $_SESSION['password'];?>">
   </div>
   <div class="item">
     <label class="label" for="comment">コメント&nbsp;&emsp;</label>
     <textarea rows="4" id="comment" placeholder="コメントを記入してください" name = "edit_comment"><?php echo $_SESSION['comment'];?></textarea>
   </div>
   <input type="hidden" name="edit_flug" value= "<?php echo $_SESSION['editnum'];?>">

   <div class="item no-label">
     <input type="submit">
   </div>
 </form>
 <form class="edit-form" action="mission_4_1.php" method="post">
  <p></p>
  <input type="hidden" name="del_flug" value= "<?php echo $_SESSION['editnum'];?>">
  <div class="item no-label">
    <input type="submit" value = "削除">
  </div>
</form>


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
   width: 115px;
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
   font-size: 15px;
   font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", YuGothic, "ヒラギノ角ゴ ProN W3", Hiragino Kaku Gothic ProN, Arial, "メイリオ", Meiryo, sans-serif;
   position: relative;
   	bottom:81px;
   	left:245px;

 }
 .edit-form .item {
   display: block;
   overflow: hidden;
   margin-bottom: 10px;
 }
 .edit-form .item.no-label {
   padding: 5px 0px 5px 0px;
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
   width: 60px;
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
