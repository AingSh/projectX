<?php

switch (getRequestType()) {
    case 'register':
        register(getRegisterParams());
        break;
    case 'login':
        login(getLoginParams());
        break;
    case 'add_to_cart':
        addToCart(addToCartHelper());
        break;
    case 'remove_product_from_cart':
        removeProductfromCart(removeProductHelper());
        break;
    case 'create_order':
        createOrder(createOrderHelper());
        break;
    case 'update_account':
        updateAccount(getAccountParams());
        break;
    case 'update_password':
        updatePassword(getAccountPasswordParams());
        break;
    default:
        redirect();
}

