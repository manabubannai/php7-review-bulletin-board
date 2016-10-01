<?php
include '../app/config/database.php';
include '../public/view/header.php';
include '../app/functions/user.php';
?>

<?php
//  ログインボタンが押された時に下記を実行
if ( $_POST ) {

	// 必須項目に情報が入っているかを確認する
	if (
		!empty( $_POST['user_email']) &&
		!empty( $_POST['user_password'])
	 ) {

		//  エラーがない場合
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];

		// ログインする
		login_user($user_email, $user_password, $mysqli);
	} else {
		echo "エラーがあります";
	}

}
 ?>

 <div class="col-xs-6 col-xs-offset-3">
 	<h2>ログイン</h2>
	<form action="" method="post">
		<div class="form-group">
			<label for="user_email">Email</label>
			<input type="email" class="form-control" id="user_email" name="user_email">
		</div>
		<div class="form-group">
			<label for="user_password">パスワード</label>
			<input type="password" class="form-control" id="user_password" name="user_password">
		</div>
		<button type="submit" class="btn btn-default">ログイン</button>
	</form>
 </div>

<?php
include '../public/view/footer.php';