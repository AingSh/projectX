<?php
const DB_HOST = 'localhost';
const DB_TABLE = 'coffee_shop';
const DB_USER = 'root';
const DB_PASS = 'root';
const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_TABLE;

const CONFIG_DIR = ROOT_DIR . '/config';
const APP_DIR = ROOT_DIR . '/app';
const VIEWS_DIR = ROOT_DIR . '/views';
const PAGES_DIR = VIEWS_DIR . '/pages';
const PARTS_DIR = VIEWS_DIR . '/parts';

define('DOMAIN', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

const ASSETS_URI = DOMAIN . '/assets';
const IMAGES_URI = ASSETS_URI . '/images/';


enum Tables: string
{
    case Content = 'content';
    case OrderProducts = 'order_products';
    case Orders = 'orders';
    case Products = 'products';
    case Users = 'users';
}


enum SocialFAIcons: string
{
    case Instagram = 'fa-brands fa-instagram';
    case Facebook = 'fa-brands fa-facebook';
    case Twitch = 'fa-brands fa-twitch';
    case Vk = 'fa-brands fa-vk';
    case Twitter = 'fa-brands fa-twitter';

    public static function byName(string $name)
    {
        return constant("self::$name");
    }
}

