<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
        break;
      case 'categorys':
        require_once('models/category.php');
        $controller = new CategorysController();
        break;
      case 'sheets':
        require_once('models/sheet.php');
        $controller = new SheetsController();
        break;
    }
    $controller->{ $action }();
  }

  // entry for the new controller and its actions
  $controllers = array('pages' => ['error'],
                       'categorys' => ['index', 'show', 'create', 'validate','delete', 'order', 'validateorder'],
                       'sheets' => ['index', 'show', 'create', 'validate','delete']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>