<?php
require_once 'models/database/Database.php';
require_once 'models/studentorderdetail/StudentOrderDetail.php';
Database::initialise('localhost', 'root', '123456', 'ncut');

foreach ($_POST['number'] as $value) {
    if ($value <= 0) {
        $url = Notice::addTo('送出失敗：數量不可小於等於零！','home/order/cart');
        $redirect_url = Router::toUrl($url);
        Router::redirect($redirect_url);
        exit;
    }
}

if (empty($_POST['delete'])) {
    foreach ($_POST['number'] as $key => $value) {
        $detail = StudentOrderDetail::from($key);
        $detail->number($value);
        $detail->update();
    }
    $id = $detail->student_order()->id();
    $url = Router::toUrl("home/order/ok/$id");
} else {
    $detail = StudentOrderDetail::from($_POST['delete'][0]);
    $detail->delete();
    $url = Router::toUrl('home/order/cart');
}
Router::redirect($url);
