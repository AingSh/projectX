<?php

$additions = dbSelect(
    Tables::Products,
    columns: "id, title, price, quantity",
    conditions: "is_option = TRUE AND quantity > 0",
    order: "price"
);

//dd($additions);
?>


<div class="modal fade w-100" id="productBuy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog w-50" style="max-width: 50%;">
        <div class="modal-content">
            <form action="/" method="POST" id="buy-form">
                <input type="hidden" value="add_to_cart" name="type">
                <input type="hidden"  name="product_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Купи что-то</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Продукт</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Кол-во</th>
                                <th scope="col">total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product-name">Чай</td>
                                <td class="product-price"><span class="price"></span><span>$</span></td>
                                <td class="product-qnty">
                                    <input type="number" name="quantity" class="quantity-field" min="1" value="1">
                                </td>
                                <td class="product-total"><span class="total"></span><span>$</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <hr>
                        <h3 class="product-modal-info">Доп. услуги</h3>
                        <?php foreach ($additions as $addition): ?>
                            <div class="col-6 form-check form-switch">
                                <input type="checkbox"
                                       class="form-check-input additions-check"
                                       role="switch"
                                       name="additions[]"
                                       id="addition-<?= $addition['id'] ?>"
                                       value="<?= $addition['id'] ?>"
                                >
                                <label class="form-check-label"
                                       for="addition-<?= $addition['id'] ?>"
                                ><?= $addition['title'] ?>
                                    - <b class="price"><?= $addition['price'] ?></b><b>$</b>
                                    <span class="additions-total-wrapper invisible">
                                        - <b class="additions-total"></b><b>$</b>
                                    </span>
                                </label>
                                <input type="number"
                                       min="0"
                                       value="0"
                                       max="<?= $addition['quantity'] ?>"
                                       class="form-control additions-qnty"
                                       name="additions_qnty[]"
                                       disabled
                                >
                            </div>
                        <?php endforeach; ?>
                        <div class="col-12 final-price-all" style="text-align: center;">
                            Total: <b class="final-price"></b><b>$</b>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button-63">Add to cart</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--btn btn-outline-dark-->