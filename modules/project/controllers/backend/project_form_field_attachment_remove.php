<?php

require_once __DIR__ .'/../../../../bootstrap.php';

if (!User::getInstance()->isLogin()) {
  $rtn->error = i18n(array('en' => 'Authorisation required.', 'zh' => '抱歉，您没有权限进行此操作'));
  echo json_encode($rtn);
  exit;
}

$file = strip_tags($_POST['path']);
$file_path = is_file(CACHE_DIR . DS . $file) ? (CACHE_DIR . DS . $file) : (WEBROOT . DS . $file);
$rtn = new stdClass();

if (is_file($file_path)) {
  if (unlink($file_path)) {
    $rtn->success = 1;
    $rtn->id = strip_tags($_POST['id']);
  } else {
    $rtn->error = i18n(array('en' => 'Failed to delete file.', 'zh' => '删除文件失败'));
  }
} else {
  $rtn->error = i18n(array('en' => 'Failed to delete file', 'zh' => '删除文件失败'));
}

echo json_encode($rtn);
exit;