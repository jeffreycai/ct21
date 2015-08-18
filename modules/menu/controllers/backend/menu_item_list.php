<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (!preg_match('/^\d+$/', $page)) {
  dispatch('core/backend/404');
  exit;
}


$objects = MenuItem::findAll();


$html = new HTML();

$html->renderOut('core/backend/html_header', array('title' => i18n(array(
  'en' => 'Menu item',
  'zh' => '菜单项目',
  ))), true);
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');

$perpage = 50;
$total = MenuItem::countAll();
$total_page = ceil($total / $perpage);
$html->renderOut('menu/backend/menu_item_list', array(
    'objects' => MenuItem::findAllWithPage($page, $perpage),
    'current_page' => $page,
    'total_page' => $total_page,
    'total' => $total,
    'pager' => $html->render('core/components/pagination', array('total' => $total_page, 'page' => $page)),
    'start_entry' => ($page - 1)*$perpage + 1,
    'end_entry' => min(array($total, $page*$perpage))
), true);

$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

