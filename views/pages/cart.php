<?php $cart = retrieveProducts();
 $total = 0;
?>
<section id="cart" style="padding: 70px 0;">
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive">
                <h2>Твой продуктовый набор</h2>
                <hr>
                <?php if (empty($cart)): ?>
                    <p>Продуктов нет =(</p>
                <?php else: ?>

                <table class="table">
                    <thead>
                    <tr  class="table-dark">
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart as $key => $product): ?>
                    <?php if(is_array($product)): ?>
                        <tr class="table-light">
                            <td><?= ($key + 1) ?></td>
                            <td><?= $product['title'] ?></td>
                            <td><?= $product['price'] ?><span>$</span></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['total']  ?><span>$</span></td>
                            <td>
                                <form action="/" method="POST">
                                    <input type="hidden" name="type" value="remove_product_from_cart">
                                    <input type="hidden" name="product_position" value="<?= $key ?>">
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-skull"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php if (!empty($product['additions'])){
                        include  PARTS_DIR . '/cart/additions.php';
                        } ?>
                        <?php else: ?>
                            <tr class="table-light">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Всего:</b></td>
                                <td><?= $product ?><span>$</span></td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                    <a href="<?= DOMAIN . '/checkout'?>" class="btn btn-outline-info">ОФОРМИТЬ</a>
                    <?php endif; ?>
            </div>

        </div>
        <div class="col-2">
        </div>
    </div>
</div>
</section>