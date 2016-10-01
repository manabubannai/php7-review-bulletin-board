<?php
include '../app/config/database.php';
include '../public/view/header.php';
include '../app//functions/review.php';
?>

<div class="col-xs-12">
	<h2>モテるようになる薬</h2>
	<p>この薬を飲むと、美女からモテます。すごい薬です。モテるだけじゃなく健康にもなります。すごいです。すごいです。すごいです。すごいです。すごいです。すごいです。すごいです。</p>
	<hr>
</div>

<?php
// 口コミデータをそのデータに紐づくユーザー情報を取得する
$product_id = $_GET['id'];
$reviews_data = fetch_reviews($product_id, $mysqli);

// 口コミがある場合はループ処理を実行する
if ( $reviews_data !== false ) {
	foreach ($reviews_data as $review_data ) {
	?>

	<div class="col-xs-12">
		<h4>
			名前：<?php echo $review_data['user_name']; ?>さん
			（<?php echo $review_data['review_date']; ?>）
		</h4>
		<p><?php echo $review_data['review_comment']; ?></p>
	</div>

	<?php } // End of foreach ?>

<?php } // End of if ?>

<?php
// 口コミの投稿
if ($_POST) {

	// 必須項目に情報が入っているかを確認する
	if ( !empty( $_POST['add_review'] )) {
		$add_review = $_POST['add_review'];
		add_review($product_id, $add_review, $mysqli);
	} else {
		echo "口コミを入力してください";
	}
}
 ?>

<div class="container">
	<div class="row">
		 <div class="col-xs-12">
		 	<h3>口コミを投稿する</h3>
			<form action="" method="post">
				<textarea name="add_review" class="form-control" placeholder="口コミを記入してください。"></textarea>
				<button type="submit" class="btn btn-default">投稿する</button>
			</form>
		 </div>
	</div>
</div>

<?php
include '../public/view/footer.php';