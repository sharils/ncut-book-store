<?php
require_once 'models/shopbook/ShopBook.php';
$status = Router::resource('1');
$active= [
    '' => '',
    'on' => '',
    'off' => '',
];
$active[$status] = 'active';
$shop_books = ShopBook::find();
$shopbooks = [];
$shelf = ($status === 'on') ? TRUE : FALSE;

if ($status !== '') {
    foreach ($shop_books as $v) {
        if ($v->shelf() === $shelf) {
            $shopbooks[] = $v;
        }
    }
} else {
    $shopbooks = $shop_books;
}
$shopbooks = Page::getLimit($shopbooks);
