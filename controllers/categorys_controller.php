<?php

  class CategorysController {

    /**
     * Description : route to all category
     */
    public function index() {
      // we store all the posts in a variable
      $categorys = Category::all();
      require_once('views/categorys/index.php');
    }

    /**
     * Description : route to show one category
     */
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $category = Category::find($_GET['id']);

      $sheetsCategory = Category::allSheetsCategory($_GET['id']);

      require_once('views/categorys/show.php');
    }

    /**
     * Description : route to show category form
     */
    public function create() {
      $id = null;
      if (isset($_GET['id'])){
        $id = $_GET['id'];
        $category = Category::find($id);
      }
      require_once('views/categorys/create.php');
    }

    /**
     * Description : route to delete category
     */
    public function delete(){
      $id = null;
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $id = $_GET['id'];
      $statusDelete = Category::delete($id);

      $this->index();
    }

    /**
     * Description : route to validate form category
     */
    public function validate(){

      $id = null;
      if (isset($_POST['id'])){
        $id = $_POST['id'];
      }

      $label = null;
      if (isset($_POST['label'])){
        $label = $_POST['label'];
      }

      if (!empty($label)){
        $category = Category::save($id, $label);
        $validate = true;
      }else{
        $validate = false;
      }

      require_once('views/categorys/create.php');
    }

    /**
   * Description : route to order categorys
   */
    public function order() {
      $categorys = Category::all();

      require_once('views/categorys/order.php');
    }

    /**
     * Description : route to update order categorys
     * @return bool
     */
    public function validateorder() {
      foreach( $_POST['category'] as $order => $id_category )
      {
        $category = Category::updateOrder($id_category, $order);
      }
      return true;
    }

  }
?>