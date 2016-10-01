<?php

function fetch_products($mysqli) {

	// productsのDBを選択する
	 $query = "SELECT
					 product_id,
					 product_name,
					 product_description
	 			FROM
	 				products";

	$result = $mysqli->query($query);

	if( !$result ) {
		// エラーが発生した場合
		exit;
	} else {
		// カテゴリーが存在しない場合
		if( mysqli_num_rows($result) == 0 ){
			exit;
		}else {
			// エラーがない場合
			// 連想配列にデータを格納する
			$products_data = array();
			while ($row = $result->fetch_assoc()) {
				$products_data[] = $row;
			}

			return $products_data;
		}
	}

}
