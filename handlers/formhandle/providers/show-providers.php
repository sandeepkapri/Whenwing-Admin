<?php
switch ($post_get_v2) {
    // 1 Active
    // 2 Blocked
    case 'new': $where_cond = '`reg_date` >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)';
        break;
    case 'blocked': $where_cond = '`is_active` = 2';
        break;
    default: $where_cond = '1';

}
$db = new DB();

$db->query('SELECT `prov_id`, `prov_name`, `prov_dob`, `prov_contact`, `email_id`, `prov_field`, `prov_service`, `prov_state` FROM `ww_provider` WHERE '.$where_cond);
$exeRes = $db->resultset();
if ($exeRes) {
    foreach ($exeRes as $value) {
      $dob = new DateTime($value['prov_dob']);
      $today = new DateTime('today');
        echo '<tr>
                <td>'.$value['prov_id'].'</td>
                <td>'.$value['prov_name'].'</td>
                <td>'.$dob->diff($today)->y.'</td>
                <td>'.$value['prov_contact'].'</td>
                <td>'.$value['email_id'].'</td>
                <td>'.$value['prov_field'].'</td>
                <td>'.$value['prov_service'].'</td>
                <td>'.$value['prov_state'].'</td>
                <td><div class="btn-group">
                <button type="button" class="btn bg-maroon dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/ww-admin/provider-details/'.$value['prov_id'].'">Detail View</a></li>
                  <li><a href="#" class="block-provider">Block</a></li>
                  <li><a href="#" class="unblock-provider">Unblock</a></li>
                </ul>
              </div></td>
		    </tr>';
    }
    $db->terminate();
}
