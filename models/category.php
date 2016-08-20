<?php
  class Category {

    public $id;
    public $label;
    public $image;

    public function __construct($id, $label, $image) {
      $this->id      = $id;
      $this->label  =  $label;
      $this->image  =  $image;
    }

    /**
     * Description : all the categorys
     * @return array
     */
    public static function all() {

      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM category ORDER BY position_order');

      foreach($req->fetchAll() as $category) {
        $list[] = new Category($category['id'], $category['label'], $category['image']);
      }

      return $list;
    }

    /**
     * Description : find one category
     * @param $id
     * @return Category
     */
    public static function find($id) {

      $db = Db::getInstance();

      $id = intval($id);

      $req = $db->prepare('SELECT * FROM category WHERE id = :id');
      $req->execute(array('id' => $id));
      $category = $req->fetch();

      return new Category($category['id'], $category['label'], $category['image']);
    }

    /**
     * Description : delete one category and relation between sheet and category
     * @param $id
     * @return bool
     */
    public static function delete($id) {

      $db = Db::getInstance();

      $id = intval($id);

      $req = $db->prepare('DELETE FROM sheet_category  WHERE id_category = :id_category');
      $req->execute(array('id_category' => $id));
      $req = $db->prepare('DELETE FROM category  WHERE id = :id_category');
      $req->execute(array('id_category' => $id));

      return true;
    }

    /**
     * Description : save category
     * @param null $id
     * @param null $label
     * @return Category
     */
    public static function save($id = null, $label = null) {
      $db = Db::getInstance();
      if (!empty($id)){

        $id = intval($id);
        $req = $db->prepare("UPDATE category SET label = :label WHERE id = :id");
        $req->bindParam(":label", $label, PDO::PARAM_STR);
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $req = $db->prepare('SELECT * FROM category WHERE id = :id');
        $req->execute(array('id' => $id));
        $category = $req->fetch();

        return new Category($category['id'], $category['label'], $category['image']);
      }else{

        $req = $db->prepare('INSERT INTO category(label, image) VALUES (:label, :image)');
        $req->bindValue('label', $label, PDO::PARAM_STR);
        $req->bindValue('image', getImgRandom(), PDO::PARAM_STR);

        $req->execute();

        $lastId = $db->lastInsertId();
        $req = $db->prepare('SELECT * FROM category WHERE id = :id');
        $req->execute(array('id' => $lastId));
        $category = $req->fetch();

        return new Category($category['id'], $category['label'], $category['image']);
      }

    }

    /**
     * Description : list of all category for one sheet
     * @param $id
     * @return array
     */
    public static function allSheetsCategory($id) {

      $list = [];
      $id = intval($id);
      $db = Db::getInstance();
      $req = $db->prepare('SELECT * FROM sheet INNER JOIN sheet_category ON sheet.id = sheet_category.id_sheet WHERE id_category = :id_category ');
      $req->execute(array('id_category' => $id));

      foreach($req->fetchAll() as $sheetCategory) {
        $list[$sheetCategory['id_sheet']] = array("label" => $sheetCategory['label'],"description" => $sheetCategory['description']);
      }

      return $list;

    }

    /**
     * Description : update position of category
     * @param $id
     * @param $order
     */
    public static function updateOrder($id, $order){
      $db = Db::getInstance();

      $id = intval($id);

      $req = $db->prepare("UPDATE category SET position_order = :position_order WHERE id = :id");
      $req->bindParam(":position_order", $order, PDO::PARAM_STR);
      $req->bindParam(":id", $id, PDO::PARAM_INT);
      $req->execute();
    }
  }
?>