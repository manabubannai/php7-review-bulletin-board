<?php
include '../app/config/database.php';
include '../public/view/header.php';
include '../app/functions/user.php';
?>

<?php
//  送信ボタンが押された時に下記を実行
if ( $_POST ) {

	// 必須項目に情報が入っているかを確認する
	if (
		!empty( $_POST['user_name']) &&
		!empty( $_POST['user_email']) &&
		!empty( $_POST['user_password']) &&
		!empty( $_POST['user_pass_check'])
	 ) {

		// ２回入力したEmailがマッチしているかを確認する
		if ( $_POST['user_password'] === $_POST['user_pass_check']) {

			//  エラーがない場合
			$user_name = $_POST['user_name'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];

			// 会員登録する
			save_user($user_name, $user_email, $user_password, $mysqli);
		} else {
			echo "パスワードが一致しません";
		}

	} else {
		echo "エラーがあります";
	}

}
 ?>

 <div class="col-xs-6 col-xs-offset-3">
 	<h2>会員登録</h2>
	<form action="" method="post">
		<div class="form-group">
			<label for="user_name">名前</label>
			<input type="text" class="form-control" id="user_name" name="user_name">
		</div>
		<div class="form-group">
			<label for="user_email">Email</label>
			<input type="email" class="form-control" id="user_email" name="user_email">
		</div>
		<div class="form-group">
			<label for="user_password">パスワード</label>
			<input type="password" class="form-control" id="user_password" name="user_password">
		</div>
		<div class="form-group">
			<label for="user_pass_check">パスワードの確認</label>
			<input type="password" class="form-control" id="user_pass_check" name="user_pass_check">
		</div>
		<button type="submit" class="btn btn-default">登録する</button>
	</form>
 </div>


<?php
include '../public/view/footer.php';