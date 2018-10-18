<?php
switch ($post_get_v2) {
    //0 Pending
    //1 Fulfilled
    //2 cancelled
    case 'new': $where_cond = '`order_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)';
        break;
    case 'pending': $where_cond = '`order_status` = 0';
        break;
    case 'fulfilled': $where_cond = '`order_status` = 1';
        break;
    default: $where_cond = '1';

}
$db = new DB();

$db->query('SELECT `order_id`, `customer_id`, `provider_id`, `ord_category1`, `ord_category2`, `order_type1`, `order_type2`, `order_date` FROM `ww_customer_order` WHERE'. $where_cond);
$exeRes = $db->resultset();
if ($exeRes) {
    foreach ($exeRes as $value) {
      $date = new DateTime($value['order_date']);
      $dateVal = $date->format('d-m-Y');

        echo '<tr>
                <td>'.$value['order_id'].'</td>
                <td>'.$value['customer_id'].'</td>
                <td>'.$value['provider_id'].'</td>
                <td>'.$value['ord_category1'].'</td>
                <td>'.$value['ord_category2'].'</td>
                <td>'.$value['order_type1'].'</td>
                <td>'.$value['order_type2'].'</td>
                <td>'.$dateVal.'</td>
                <td><div class="btn-group">
                <button type="button" class="btn btn-info">Action</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" class="fulfilled">Fulfilled</a></li>
                  <li><a href="#" class="pending">Pending</a></li>

                </ul>
              </div></td>
		    </tr>';
    }
    $db->terminate();
}
