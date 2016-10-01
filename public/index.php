<?php
include '../app/config/database.php';
include '../public/view/header.php';
include '../app/functions/product.php';
?>

<?php
// 商品一覧データを取得
$products_data = fetch_products($mysqli);
foreach ($products_data as $product_data ) {
?>

<div class="col-xs-12">
	<h2><?php echo $product_data['product_name']; ?></h2>
	<p><?php echo $product_data['product_description']; ?></p>
	<a href="detail.php?id=<?php echo $product_data['product_id'] ?>">&raquo; 口コミを見る</a>
	<br><br>
</div>

<?php  } // End of foreach ?>
<?php
include '../public/view/footer.php';