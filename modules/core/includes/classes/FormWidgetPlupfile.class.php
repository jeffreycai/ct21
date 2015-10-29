<?php
require_once 'FormWidget.class.php';

class FormWidgetPlupfile extends FormWidget {
  private $name;
  private $required;
  private $max_file_number;
  private $max_file_size;
  private $extensions;
  
  public function __construct($name, $conf) {
    parent::__construct($conf);
    $this->name = $name;
    $this->required = isset($conf['required']) ? $conf['required'] : 0;
    $this->max_file_number = isset($conf['max_file_number']) ? $conf['max_file_number'] : 0;
    $this->max_file_size = isset($conf['max_file_size']) ? $conf['max_file_size'] : 2; // default to 2 MB
    $this->extensions = isset($conf['extensions']) ? $conf['extensions'] : 'jpg,png,gif';
  }
  
  static function bootstrap() {
    // include libs
    $whichend = is_backend() ? 'backend' : 'frontend';
    // jquery-ui
    if (!Asset::checkAssetAdded('jquery-ui', 'js', $whichend)) {
      $js = "<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js'></script>";
      Asset::addDynamicAsset('jquery-ui', 'js', $whichend, $js);
    }
    // plupload
    if (!Asset::checkAssetAdded('plupload', 'js', $whichend)) {
      $js = "<script type='text/javascript' src='".uri('libraries/plupload/js/plupload.full.min.js', false)."'></script>";
      Asset::addDynamicAsset('plupload', 'js', $whichend, $js);
    }
    // plupload queue js
    if (!Asset::checkAssetAdded('plupload_queue', 'js', $whichend)) {
      $js = "<script type='text/javascript' src='".uri('libraries/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js', false)."'></script>";
      Asset::addDynamicAsset('plupload_queue', 'js', $whichend, $js);
    }
    // plupload queue css
    if (!Asset::checkAssetAdded('plupload_queue', 'css', $whichend)) {
      $css = "<link type='text/css' rel='stylesheet' href='".uri('libraries/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css')."' media='screen' />";
      Asset::addDynamicAsset('plupload_queue', 'css', $whichend, $css);
    }
    // plupload language js
    if (!Asset::checkAssetAdded('plupload_i18n', 'js', $whichend)) {
      $js = "<script type='text/javascript' src='".uri('libraries/plupload')."/js/i18n/".(get_language() == 'zh' ? 'zh_CN' : 'en').".js'></script>";
      Asset::addDynamicAsset('plupload_queue', 'css', $whichend, $js);
    }
  }
  
  public function render($module, $model) {
    $rtn = "";

    
    $rtn = "";
    

    return $rtn;
  }
  
  public function validate() {
    $rtn = "\n  // validation for $".$this->name."\n";
    $rtn .= '  $'.$this->name.' = isset($_POST["'.$this->name.'"]) ? strip_tags(trim($_POST["'.$this->name.'"])) : null;';
    if ($this->required) {
      $rtn .= '
  if (empty($'.$this->name.')) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "'.$this->name.' is required.", "zh" => "请填写'.$this->name.'"))));
    $error_flag = true;
  }
';
    }
    return $rtn;
  }
  
  public function proceed() {
    $rtn = "\n  // proceed for $".$this->name."\n";
    $rtn .= '  $object->set'.format_as_class_name($this->name).'($'.$this->name.');
';
    return $rtn;
  }
}