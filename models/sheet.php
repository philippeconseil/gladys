<?php
  class Sheet {

    public $id;
    public $label;
    public $description;

    public $listCategories;

    public function __construct($id, $label, $description) {
      $this->id      = $id;
      $this->label  =  $label;
      $this->description  =  $description;
    }

    /**
     * Description : list of the sheet
     * @return array
     */
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM sheet');

      foreach($req->fetchAll() as $sheet) {
        $list[] = new Sheet($sheet['id'], $sheet['label'], $sheet['description']);
      }

      return $list;
    }

    /**
     * Description : find one sheet
     * @param $id
     * @return Sheet
     */
    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);

      $req = $db->prepare('SELECT * FROM sheet WHERE id = :id');
      $req->execute(array('id' => $id));
      $sheet = $req->fetch();

      return new Sheet($sheet['id'], $sheet['label'], $sheet['description']);
    }

    /**
     * Description : save sheet
     * @param null $id
     * @param null $label
     * @param null $description
     * @param null $categorys
     * @return Sheet
     */
    public static function save($id = null, $label = null, $description = null, $categorys = null) {
      $db = Db::getInstance();

      if (!empty($id)){
        $id = intval($id);
        $req = $db->prepare('UPDATE sheet SET label = :label, description = :description  WHERE id = :id');
        $req->execute(array('id' => $id, 'label' => $label, 'description' => $description));

        // delete all relation between sheet and categories
        $req = $db->prepare('DELETE FROM sheet_category  WHERE id_sheet = :id_sheet');
        $req->execute(array('id_sheet' => $id));

        foreach($categorys as $key => $category){
          $req = $db->prepare('INSERT INTO sheet_category(id_sheet, id_category) VALUES (:id_sheet, :id_category)');
          $req->bindValue('id_sheet', $id, PDO::PARAM_INT);
          $req->bindValue('id_category', $category, PDO::PARAM_INT);
          $req->execute();
        }

        $req = $db->prepare('SELECT * FROM sheet WHERE id = :id');
        $req->execute(array('id' => $id));
        $sheet = $req->fetch();

        return new Sheet($sheet['id'], $sheet['label'], $sheet['description']);
      }else{
        $req = $db->prepare('INSERT INTO sheet(label, description) VALUES (:label, :description)');
        $req->bindValue('label', $label, PDO::PARAM_STR);
        $req->bindValue('description', $description, PDO::PARAM_STR);
        $req->execute();

        $lastId = $db->lastInsertId();

        foreach($categorys as $category){
          $req = $db->prepare('INSERT INTO sheet_category(id_sheet, id_category) VALUES (:id_sheet, :id_category)');
          $req->bindValue('id_sheet', $lastId, PDO::PARAM_INT);
          $req->bindValue('id_category', $category, PDO::PARAM_INT);
          $req->execute();
        }

        $req = $db->prepare('SELECT * FROM sheet WHERE id = :id');
        $req->execute(array('id' => $lastId));
        $sheet = $req->fetch();

        return new Sheet($sheet['id'], $sheet['label'], $sheet['description']);
      }
    }

    /**
     * Description : delete relation betwwen sheet and category
     * @param $id_sheet
     * @param $id_category
     * @return bool
     */
    public static function delete($id_sheet, $id_category) {

      $db = Db::getInstance();

      $id_sheet = intval($id_sheet);
      $id_category = intval($id_category);

      $req = $db->prepare('DELETE FROM sheet_category  WHERE id_sheet = :id_sheet AND id_category = :id_category ');
      $req->execute(array('id_sheet' => $id_sheet, 'id_category' => $id_category));

      return true;
    }

    /**
     * Description : delete sheet if no more relation between sheet and category
     * @param $id_sheet
     * @return bool
     */
    public static function deleteSheet($id_sheet) {

      $db = Db::getInstance();

      $id_sheet = intval($id_sheet);

      $req = $db->prepare('SELECT * FROM sheet_category WHERE id_sheet = :id_sheet');
      $req->execute(array('id_sheet' => $id_sheet));

      if ($req->rowCount() == 0){
        $req = $db->prepare('DELETE FROM sheet  WHERE id = :id_sheet');
        $req->execute(array('id_sheet' => $id_sheet));
      }

      return true;
    }

    /**
     * Description : list of all category
     * @return array
     */
    public static function allCategorys() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM category');

      foreach($req->fetchAll() as $category) {
        $list[$category['id']] = $category['label'];
      }

      return $list;
    }

    /**
     * Description : list of all category for one sheet
     * @param $id
     * @return array
     */
    public static function allSheetsCategorys($id) {
      $list = [];
      $id = intval($id);
      $db = Db::getInstance();
      $req = $db->prepare('SELECT * FROM category INNER JOIN sheet_category ON category.id = sheet_category.id_category WHERE id_sheet = :id_sheet ');

      $req->execute(array('id_sheet' => $id));

      foreach($req->fetchAll() as $sheetCategory) {
        $list[$sheetCategory['id_category']] = array("label" => $sheetCategory['label']);
      }

      return $list;
    }


  }
?>