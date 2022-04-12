<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Shop->getShopId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">books</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use($in_cart){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <?php
                        if($item['item_stork'] <= 0){
                            echo '<a style="color: red">Out of Stock</a>';
                        }else{
                            echo '<a style="color: green">In Stock</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
