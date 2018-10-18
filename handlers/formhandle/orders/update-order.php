<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = require $_SERVER['DOCUMENT_ROOT'].'/ww-admin/config/config-path.php';
    include_once $path['root'].'/ww-admin/includes/connect.inc.php';
    $order_status = htmlspecialchars($_POST['order_status']);
    $order_id = htmlspecialchars($_POST['order_id']);
    $db = new DB();

    $db->query('UPDATE `ww_customer_order` SET `order_status`= :order_status  WHERE `order_id` = :order_id');
    $db->bind(':order_status', $order_status);
    $db->bind(':order_id', $order_id);
    $exeRes = $db->execute();
    if ($exeRes) {
        echo 'Successfully Updated';
        $db->terminate();
    }
}
