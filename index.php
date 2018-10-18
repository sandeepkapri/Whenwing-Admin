<?php $path = require $_SERVER['DOCUMENT_ROOT'] . '/ww-admin/config/config-path.php';
if (isset($_GET['v1']) && isset($_GET['v2']) && isset($_GET['v3'])) {
  $post_get_v1 = $_GET['v1'];
  $post_get_v2 = $_GET['v2'];
  $post_get_v3 = $_GET['v3'];
  switch ($post_get_v1) {
    case 'handlers':
    if ($post_get_v2 == 'formhandle' && $post_get_v3 == 'become-provider') {
      require $path['root'] . '/handlers/formhandle/become-provider/index.php';
    } elseif ($post_get_v2 == 'formhandle' && $post_get_v3 == 'order') {
      require $path['root'] . '/handlers/formhandle/order/index.php';
    }
    break;
    default:require $path['pages'] . '/404.php';
  }
} elseif (isset($_GET['v1']) && isset($_GET['v2'])) {
  $post_get_v1 = $_GET['v1'];
  switch ($post_get_v1) {
    case 'orders':
    switch ($_GET['v2']) {
      case 'fulfilled':
      $post_get_v2 = 'fulfilled';
      break;
      case 'new':
      $post_get_v2 = 'new';
      break;
      case 'pending':
      $post_get_v2 = 'pending';
      break;
      default:$post_get_v2 = 'all';
    }
    require $path['admin_pages'] . '/view-order.php';
    break;
    case 'customers':
    $post_get_v2 = $_GET['v2'];
    require $path['admin_pages'] . '/view-customers.php';
    break;
    case 'providers':
    $post_get_v2 = $_GET['v2'];
    require $path['admin_pages'] . '/view-providers.php';
    break;
    
    case 'provider-details':
    $post_get_v2 = $_GET['v2'];
    require $path['admin_pages'] . '/provider-details.php';
    break;
    //Dont delete following line
    //Handles calling of form handle
    case 'handlers':
    if ($post_get_v2 == 'formhandle') {
      require $path['root'] . '/handlers/formhandle/index.php';
    }

    break;

    default:require $path['pages'] . '/404.php';
  }
} elseif (isset($_GET['v1'])) {

  $post_get = $_GET['v1'];
  switch ($post_get) {
    case 'cancellation':
    require $path['admin_pages'] . '/cancellation.php';
    break;
    case 'login':
    require $path['admin_pages'] . '/admin-login.php';
    break;
    case 'logout':
    require $path['admin_pages'] . '/logout.php';
    break;
    case 'orders':
    $post_get_v2 = 'all';
    require $path['admin_pages'] . '/view-order.php';
    break;
    case 'providers':
    $post_get_v2 = 'all';
    require $path['admin_pages'] . '/view-providers.php';
    break;
    case 'services':
    require $path['admin_pages'] . '/view-services.php';
    break;
    case 'users':
    $post_get_v2 = 'all';
    require $path['admin_pages'] . '/view-users.php';
    break;

    default:require $path['admin_pages'] . '/404.php';
  }
} else {
  require $path['admin_pages'] . '/home.php';
}
