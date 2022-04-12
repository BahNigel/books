<!-- Shopping shop section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete'])){
            $deletedrecord = $Shop->deleteShop($_POST['item_id']);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['change'])){
            $change_storck = $Shop->change($_POST['item_stock'], $_POST['stock_id']);
        }
    }
?>


<section id="shop" class="py-3 mb-5">
    <div class="container-fluid w-75">
    <?php
    foreach ($Shop->ShopeName($_SESSION['id']) as $item) {
        echo '<h5 class="font-baloo font-size-20">Shop name: '.$item['shop_name'].'</h5>';
        }
    ?>

        <!--  shopping shop items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData() as $item) :
                        if($item['user_id'] == $_SESSION['id']):
                ?>
                <!-- shop item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="shop1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                        <form method="post">
                                <input type="number"  name="item_stock" placeholder="<?php echo $item['item_stork'] ?>">
                                <input type="hidden" value="<?php echo $item['item_id'] ?>" name = "stock_id">
                                <button type="submit" name="change" class="btn btn-secondary">Submit</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <a href="./editBook.php?item_id=<?php echo $item['item_id'];?>" type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Edit</a>
                            </form>
 

                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            <?php
                                if($item['item_stork'] <= 0){
                                    echo '<span style="color:red" class="product_price" data-id="">Out of Stock</span>';
                                }else{
                                    echo '<span style="color:green" class="product_price" data-id="">In Stock</span>';
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                
                <?php
                  endif;
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
            <a href="newBooks.php" class="font-baloo font-size-20 btn btn-primary">Add New Book</a>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping shop items   -->
    </div>
                        </div>y
</section>