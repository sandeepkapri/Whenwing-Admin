<?php
switch ($post_get_v2) {
    // 0 Inactive
    // 1 Active
    // 2 Blocked
    case 'new': $where_cond = '`reg_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)';
        break;
    case 'blocked': $where_cond = '`active_status` = 2';
        break;
    case 'inactive': $where_cond = '`active_status` = 0';
        break;
    default: $where_cond = '1';

}
$db = new DB();

$db->query('SELECT `id`, `fullname`, `email`, `mobile`, `reg_date` FROM `ww_customers` WHERE'.$where_cond);
$exeRes = $db->resultset();
if ($exeRes) {
    foreach ($exeRes as $value) {
        echo '<tr>
                <td>'.$value['id'].'</td>
                <td>'.$value['fullname'].'</td>
                <td>'.$value['email'].'</td>
                <td>'.$value['mobile'].'</td>
                <td>'.$value['reg_date'].'</td>
                <td><div class="btn-group">
                <button type="button" class="btn bg-purple">Action</button>
                <button type="button" class="btn bg-purple dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" class="block-customer">Block</a></li>
                  <li><a href="#" class="unblock-customer">Unblock</a></li>
                </ul>
              </div></td>
		    </tr>';
    }
    $db->terminate();
}
