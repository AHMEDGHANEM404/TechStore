<?php require_once "inc/header.php";?>
<?php
use TechStore\Classes\Models\Product;
if ($request->getHas('id')) {
    $id = $request->get('id');
    # code...
    echo $id;
} else {
    $id = 1;
}
	

$pr = new Product;
$pap = $pr->selectID($id ,"products.id AS prodId,products.name AS prodNAme,`desc`,price,img,cats.name  AS catName");

?>
<?php if (!empty($pap)): ?>

	<div class="single_product">

		<div class="container">
			<div class="row">
				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img src="<?=URL . "uploads/" . $pap['img']?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description"><?=$pap['catName']?></div>
						<div class="product_name"><?=$pap['prodNAme']?></div>
						<div class="product_text"><p><?=$pap['desc']?></p></div>
						<div class="order_info d-flex flex-row">
							<form method="POST" action="<?=URL;?>handlers/app-cart.php">
								<div class="clearfix" style="z-index: 1000;">
									<input type="hidden" name="name" value="<?=$pap['prodNAme']?>">
									<input type="hidden" name="id" value="<?=$pap['prodId']?>">
									<input type="hidden" name="price" value="<?=$pap['price']?>">
									<input type="hidden" name="img" value="<?=$pap['img']?>">


									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="number" name="qty" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button"  class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                                    <div class="product_price">$<?=$pap['price']?></div>

								</div>
	<?php if (! $cart->has($pap['prodId'])) :?>
								<div class="button_container">
									<button type="submit" name="submit" class="button cart_button">Add to Cart</button>
								</div>
	<?php endif; ?>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="single_product m-auto font-weight-bold active" style="height: 20vh; width: 300px;">
		No Product !
		</div>
	<?php endif;?>
	<!-- Copyright -->
	<?php require_once "inc/footer.php";?>
