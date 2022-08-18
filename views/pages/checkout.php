<?php
$cart = retrieveProducts();
?>

<section id="checkout" style="padding: 70px 0;">
    <div class="container">
        <div class="row">


        <div class="col-12">
            <h2>Checkout</h2>
        </div>
        </div>
        <div class="row">
            <div class="col-8">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="create_order">
                    <div class="mb-3">
                        <label for="address" class="form-label">Адресс</label>
                        <input type="text"
                               name="address"
                               class="form-control"
                               id="address"
                               value="<?= $_SESSION['checkout']['fields']['address'] ?? null ?>">
                        <?= formError($_SESSION['checkout']['errors']['address'] ?? null ) ?>
                    </div>
                    <div class="mb-3">
                        <label for="delivery" class="form-label">Дата доставки</label>
                        <input type="date"
                               name="delivery"
                               class="form-control"
                               id="delivery"
                               min="<?= date('Y-m-d') ?>"
                               value="<?= $_SESSION['checkout']['fields']['delivery'] ?? null ?>">
                        <?= formError($_SESSION['checkout']['errors']['delivery'] ?? null ) ?>
                    </div>
                    <button type="submit" class="btn btn-outline-success">
                        Создать Заказ
                    </button>
                </form>
            </div>
            <div class="col-4">
                    <h3>Total: <?= $cart['total']?> $</h3>
            </div>
        </div>
    </div>
</section>