<?php

function createOrder(array $data)

{

    $cart = retrieveProducts();
    $total = $cart['total'];
    unset($cart['total']);
    $user = dbFind(Tables::Users , $_SESSION['user']['id']);



    if ($total > $user['balance']) {
        alert('danger','Недостаточно денег');
        redirect('/checkout');
    }

    try {
        DB::connect() -> beginTransaction();
        $orderId = insertOrder($data, $total);
        setProductsToOrder($orderId, $cart);
        updateUserBalance($user['id'] , $total);
        DB::connect() -> commit();


        unset($_SESSION['cart']);
        
        alert('success','Оно работает , Шок');
        redirect();
    } catch (PDOException $exception)  {
        DB::connect() -> rollBack();
        alert('danger','не работает форма заказа');
        redirect();
    }

}


function  updateUserBalance (int $id , float $total) {
    $sql = "UPDATE ". Tables::Users->value . " SET balance = (balance - :total) WHERE id = :id";

    $query = DB::connect()->prepare($sql);

    $query -> bindParam('total',$total);
    $query -> bindParam('id',$id, PDO::PARAM_INT);

    $query ->execute();

}


function updateProduct (int $id, int $quantity){
    $sql = "UPDATE ". Tables::Products->value . " SET quantity = (quantity - :quantity) WHERE id = :id";

    $query = DB::connect()->prepare($sql);

    $query ->bindParam('id',$id, PDO::PARAM_INT);
    $query ->bindParam('quantity',$quantity, PDO::PARAM_INT);

}




function setProductsToOrder(int $orderId, array $cart) {
        $sql = "INSERT INTO ". Tables::OrderProducts->value . "  (order_id, product_id, quantity, price , options) VALUES (:order_id, :product_id, :quantity, :price , :options)";

        $query = DB::connect()->prepare($sql);

        foreach ($cart as $item) {
            $data = [
                'order_id' => $orderId,
                'product_id' =>$item['product_id'],
                'quantity' =>$item['quantity'],
                'price' =>$item['price']
            ];
            updateProduct($item['product_id'],$item['quantity']);
            if (!empty($item['additions'])) {
                $data['options'] = json_encode($item['additions']);
                foreach ($item['additions'] as $addition) {
                    updateProduct($addition['product_id'],$addition['quantity']);
                }


            }
            $query->execute($data);
        }
}

function insertOrder(array $checkoutData, float $total) : int
{
    $query = "INSERT INTO ". Tables::Orders->value . "  (user_id, address, delivery_time, total) VALUES (:user_id, :address, :delivery_time, :total)";
    $query = DB::connect()->prepare($query);

    $query -> bindParam('user_id',$_SESSION['user']['id'], PDO::PARAM_INT);
    $query -> bindParam('address',$checkoutData['address']);
    $query -> bindParam('delivery_time',$checkoutData['delivery']);
    $query -> bindParam('total',$total);

    $query -> execute();

    return (int)DB::connect()->lastInsertId();
}