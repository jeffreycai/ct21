<?php
require_once "BaseMenu.class.php";

class Menu extends BaseMenu {
  
  public function getRootItem($level = 1, $display = null) {
    $item = MenuItem::findById($this->getRootMenuItemId());
    $item->populateChildren($level = 1, $display = null);
    return $item;
  }
  
  static function findByName($name) {
    global $mysqli;
    $query = 'SELECT * FROM menu WHERE name=' . DBObject::prepare_val_for_sql($name);
    $result = $mysqli->query($query);
        _debug($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new Menu();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
}
