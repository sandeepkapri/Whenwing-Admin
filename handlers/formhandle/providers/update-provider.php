<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = require $_SERVER['DOCUMENT_ROOT'].'/ww-admin/config/config-path.php';
    include_once $path['root'].'/ww-admin/includes/connect.inc.php';
    $active_status = htmlspecialchars($_POST['active_status']);
    $customer_id = htmlspecialchars($_POST['customer_id']);
    $db = new DB();

    $db->query('UPDATE `ww_provider` SET `is_active`= :active_status  WHERE `prov_id` = :customer_id');
    $db->bind(':active_status', $active_status);
    $db->bind(':customer_id', $customer_id);
    $exeRes = $db->execute();
    if ($exeRes) {
        echo 'Successfully Updated';
        $db->terminate();
    }
}
