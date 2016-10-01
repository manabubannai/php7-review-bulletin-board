<?php

function fetch_reviews($product_id, $mysqli) {
	$product_id = $mysqli->real_escape_string($product_id);

	// reviewsとusersのDBを選択する
	$query ="SELECT
					reviews.review_comment,
					reviews.review_date,
					reviews.review_product_id,
					reviews.review_user_id,

					users.user_id,
					users.user_name
				FROM
					reviews
				LEFT JOIN
					users
				ON
					reviews.review_user_id = users.user_id
				WHERE
					reviews.review_product_id = $product_id";

	$result = $mysqli->query($query);

	if( !$result ) {
		// エラーが発生した場合
		exit;
	} else {
		if( mysqli_num_rows($result) == 0 ){
			// 口コミが存在しない場合
			return false;
		}else {
			// エラーがない場合
			// 連想配列にデータを格納する
			$reviews_data = array();
			while ($row = $result->fetch_assoc()) {
				$reviews_data[] = $row;
			}

			return $reviews_data;
		}
	}

}


// 口コミを投稿する
function add_review($product_id, $add_review, $mysqli) {
	$product_id = $mysqli->real_escape_string($product_id);
	$add_review = $mysqli->real_escape_string($add_review);
	$user_id = $_SESSION['user'];

	$query = "INSERT INTO
					reviews(
						review_comment,
						review_date,
						review_product_id,
						review_user_id
					)
				VALUES (
					'$add_review',
					NOW(),
					$product_id,
					$user_id
				)";

	$result = $mysqli->query($query);

	if(!$result) {
		echo 'エラーが発生しました。';
	} else {
		echo "口コミを投稿しました。";
	}

}
