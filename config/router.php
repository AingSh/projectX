<?php

switch (getUrl()) {
    case "":
        require_once PAGES_DIR . '/main.php';
        break;
    case "login":
        if (isLogged()){
            redirect('/account');
        }
        require_once PAGES_DIR . '/auth/login.php';
        break;
    case "register":
        if (isLogged()){
            redirect('/account');
        }
        require_once PAGES_DIR . '/auth/register.php';
        break;
    case "account":
        if (!isLogged()){
            redirect('/login');
        }
        $user = dbFind(Tables::Users, $_SESSION['user']['id']);
        require_once PAGES_DIR . '/account/index.php';
        break;
    case "account/reset-password":
        if (!isLogged()){
            redirect('/login');
        }
        require_once PAGES_DIR . '/account/reset-password.php';
        break;

    case "logout":
        removeUser();
        redirect();
        require_once PAGES_DIR . '/cart.php';
        break;
    case "cart":
        if (!isLogged()){
            redirect('/login');
        }
        require_once PAGES_DIR . '/cart.php';
        break;
    case "checkout":
        if (!isLogged()){
            redirect('/login');
        }
        if (empty($_SESSION['cart'])){
            alert('info','Корзина пустая!');
            redirect();
        }
        require_once PAGES_DIR . '/checkout.php';
        break;
    default:
        dd(getUrl());
}