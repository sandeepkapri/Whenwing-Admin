<?php
if (isset($post_get_v2)) {
  $path = require $_SERVER['DOCUMENT_ROOT'].'/ww-admin/config/config-path.php';
  include_once $path['root'].'/ww-admin/includes/connect.inc.php';
  $db = new DB();
  $prov_id = htmlspecialchars($post_get_v2);
  $db->query('SELECT `prov_id`, `prov_name`, `prov_contact`, `email_id`, `prov_dob`, `prov_gender`, `prov_addr`, `prov_pincode`, `prov_state`, `prov_field`, `prov_service`, `prov_specialities`, `prov_workexp`, `prov_record`, `prov_about`, `prov_id_front`, `prov_id_bk`, `prov_hash`, `reg_date`, `is_active` FROM `ww_provider` WHERE  `prov_id` = :prov_id');
  $db->bind(':prov_id', $prov_id);
  $exeRes = $db->resultset();
  if ($exeRes) {
    foreach ($exeRes as $value) {
      $dob = new DateTime($value['prov_dob']);
      $today = new DateTime('today');
      echo '<tr>
      <td>Provider Id</td>
      <td>'.$value['prov_id'].'</td>
      </tr>
      <tr>
      <td>Name</td>
      <td>'.$value['prov_name'].'</td>
      </tr>
      <tr>
      <td>Contact</td>
      <td>'.$value['prov_contact'].'</td>
      </tr>
      <tr>
      <td>Email</td>
      <td>'.$value['email_id'].'</td>
      </tr>
      <tr>
      <td>Provider DOB/Age</td>
      <td>'.$dob->format('d-m-Y').' / '.$dob->diff($today)->y.' Years</td>
      </tr>
      <tr>
      <td>Gender</td>
      <td>'.$value['prov_gender'].'</td>
      </tr>
      <tr>
      <td>Address</td>
      <td>'.$value['prov_addr'].'</td>
      </tr>
      <tr>
      <td>Pincode</td>
      <td>'.$value['prov_pincode'].'</td>
      </tr>
      <tr>
      <td>State</td>
      <td>'.$value['prov_state'].'</td>
      </tr>
      <tr>
      <td>Field</td>
      <td>'.$value['prov_field'].'</td>
      </tr>
      <tr>
      <td>Service</td>
      <td>'.$value['prov_service'].'</td>
      </tr>';
      if(isset($value['prov_field'])){
        if(strtolower($value['prov_field']) == 'transport' || strtolower($value['prov_field']) == 'education'){
          $db->query('SELECT `f1`, `f2`, `f3_pic` FROM `ww_prov_extra` WHERE `prov_hash` = :prov_hash');
          $db->bind(':prov_hash', $value['prov_hash']);
          $exeResIn = $db->resultset();
          if ($exeResIn) {
            foreach ($exeResIn as $valueIn) {
              echo '<tr>
              <td>Field 1</td>
              <td>'.$valueIn['f1'].'</td>
              </tr>
              <tr>
              <td>Field 2</td>
              <td>'.$valueIn['f2'].'</td>
              </tr>
              <tr>
              <td>Document</td>
              <td><img src="/images/provider-images/'.$valueIn['f3_pic'].'" width="200" height="200">
              <a href="/images/provider-images/'.$valueIn['f3_pic'].'" target="_blank">View Enlarged Image</a>
              </td>
              </tr>
              ';
            }
          }
        }
      }
      echo '<tr>
      <td>Specialities</td>
      <td>'.$value['prov_specialities'].'</td>
      </tr>
      <tr>
      <td>Work Experience</td>
      <td>'.$value['prov_workexp'].'</td>
      </tr>
      <tr>
      <td>Record</td>
      <td>'.$value['prov_record'].'</td>
      </tr>
      <tr>
      <td>About</td>
      <td>'.$value['prov_about'].'</td>
      </tr>
      <tr>
      <td>Id Proof Front</td>
      <td><img src="/images/provider-images/'.$value['prov_id_front'].'" width="200" height="200">
      <a href="/images/provider-images/'.$value['prov_id_front'].'" target="_blank">View Enlarged Image</a>
      </td>
      </tr>
      <tr>
      <td>Id Proof Back</td>
      <td><img src="/images/provider-images/'.$value['prov_id_bk'].'" width="200" height="200">
      <a href="/images/provider-images/'.$value['prov_id_bk'].'" target="_blank">View Enlarged Image</a>
      </td>
      </tr>
      <tr>
      <td>Registration Date</td>
      <td>'.$value['reg_date'].'</td>
      </tr>
      ';
      $db->terminate();
    }
  }
}
?>
