<?php foreach ($product['additions'] as $index => $addition):?>
    <tr class="table-success">
        <td></td>
        <td><?= $addition['title'] ?></td>
        <td><?= $addition['price'] ?><b>$</b></td>
        <td><?= $addition['quantity'] ?></td>
        <td><?= $addition['total']?><b>$</b></td>
        <td>
            <form action="/" method="POST">
                <input type="hidden" name="type" value="remove_product_from_cart">
                <input type="hidden" name="product_position" value="<?= $key ?>" />
                <input type="hidden" name="addition_position" value="<?= $index ?>" />
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>