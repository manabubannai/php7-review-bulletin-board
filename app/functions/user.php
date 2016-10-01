<?php

function save_user($user_name, $user_email, $user_password, $mysqli) {

	$user_name = $mysqli->real_escape_string($user_name);
	$user_email = $mysqli->real_escape_string($user_email);
	$user_password = password_hash($user_password, PASSWORD_DEFAULT);

	$query = "INSERT INTO
					users(
						user_name,
						user_email,
						user_password
					)
				VALUES(
					'$user_name',
					'$user_email',
					'$user_password'
				)";

	$result = $mysqli->query($query);
	echo "<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			会員登録が完了しました</div>";
}

function login_user($user_email, $user_password, $mysqli) {
	$user_email = $mysqli->real_escape_string($user_email);
	$user_password = $mysqli->real_escape_string($user_password);

	$query = "SELECT
					user_id,
					user_email,
					user_password
				FROM
					users
				WHERE
					user_email = '$user_email'";

	$result = $mysqli->query($query);

	// パスワード(暗号化済み）とユーザーIDの取り出し
	while ($row = $result->fetch_assoc()) {
		$db_hashed_pwd = $row['user_password'];
		$user_id = $row['user_id'];
	}

	// ハッシュ化されたパスワードがマッチするかどうかを確認
	if (password_verify($user_password, $db_hashed_pwd)) {
		$_SESSION['user'] = $user_id;
		echo "<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				ログインが完了しました</div>";
	} else {
		echo "エラーが発生しました";
	}

}
