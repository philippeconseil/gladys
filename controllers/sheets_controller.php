<?php

  class SheetsController{

    /**
     * Description : route to index sheet
     */
    public function index() {
      $sheets = Sheet::all();
      require_once('views/sheets/index.php');
    }

    /**
     * Description : route to show sheet
     */
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $idCategory = null;
      if (isset($_GET['idcategory']))
        $idCategory = $_GET['idcategory'];

      $sheet = Sheet::find($_GET['id']);
      require_once('views/sheets/show.php');
    }

    /**
     * Description : route to edit sheet
     */
    public function create() {
      $id_sheet = null;
      $id_category = null;
      if (isset($_GET['id_sheet'])){
        $id_sheet = $_GET['id_sheet'];
        $sheet = Sheet::find($id_sheet);
        $sheetsCategorys = Sheet::allSheetsCategorys($id_sheet);
      }

      if (isset($_GET['idcategory'])){
        $id_category = $_GET['idcategory'];
      }


      $categorys = Sheet::allCategorys();
      require_once('views/sheets/create.php');
    }

    /**
     * Description : route to validate sheet form
     */
    public function validate(){

      $id = null;
      if (isset($_POST['id'])){
        $id = $_POST['id'];
      }
      $label = null;
      if (isset($_POST['name'])){
        $label = $_POST['name'];
      }
      $description = null;
      if (isset($_POST['description'])){
        $description = $_POST['description'];
      }
      $categorys = null;
      if (isset($_POST['categorys'])){
        $categorys = $_POST['categorys'];
      }

      if (!empty($label)){
        $sheet = Sheet::save($id, $label, $description, $categorys);
        $sheetsCategorys = Sheet::allSheetsCategorys($sheet->id);
        $validate = true;
      }else{
        $validate = false;
      }

      $categorys = Sheet::allCategorys();

      require_once('views/sheets/create.php');
    }

    /**
     * Description : route to delete sheet
     */
    public function delete(){
      $id_sheet = null;
      $id_category = null;

      if (!isset($_GET['id_sheet']))
        return call('pages', 'error');
      if (!isset($_GET['id_category']))
        return call('pages', 'error');

      $id_sheet = $_GET['id_sheet'];
      $id_category = $_GET['id_category'];

      $statusDelete = Sheet::delete($id_sheet, $id_category);

      Sheet::deleteSheet($id_sheet);

      $idCategory = $id_category;

      require_once('views/sheets/show.php');

    }

  }
?>