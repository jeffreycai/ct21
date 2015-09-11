<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $weight = 0;
  
  $menu = new Menu();$menu->setName('主菜单');$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('root');    $menu_item->setParentId(null);    $menu_item->setUri('');$menu_item->save();
  $root_id = $menu_item->getId();$menu->setRootMenuItemId($root_id);$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('HOME');        $menu_item->setParentId($root_id);$menu_item->setUri('');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('NEWS');        $menu_item->setParentId($root_id);$menu_item->setUri('news');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('OUR SERVICES');$menu_item->setParentId($root_id);$menu_item->setUri('services');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('ABOUT US');    $menu_item->setParentId($root_id);$menu_item->setUri('about');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('CONTACT');     $menu_item->setParentId($root_id);$menu_item->setUri('contact');$menu_item->save();
  
  $menu = new Menu();$menu->setName('底部LINKS');$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('root');    $menu_item->setParentId(null);    $menu_item->setUri('');$menu_item->save();
  $root_id = $menu_item->getId();$menu->setRootMenuItemId($root_id);$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('HOME');        $menu_item->setParentId($root_id);$menu_item->setUri('');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('NEWS');        $menu_item->setParentId($root_id);$menu_item->setUri('news');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('OUR SERVICES');$menu_item->setParentId($root_id);$menu_item->setUri('services');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('ABOUT US');    $menu_item->setParentId($root_id);$menu_item->setUri('about');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('CONTACT');     $menu_item->setParentId($root_id);$menu_item->setUri('contact');$menu_item->save();
  
  $menu = new Menu();$menu->setName('页脚底部菜单');$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('root');    $menu_item->setParentId(null);    $menu_item->setUri('');$menu_item->save();
  $root_id = $menu_item->getId();$menu->setRootMenuItemId($root_id);$menu->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('HOME');        $menu_item->setParentId($root_id);$menu_item->setUri('');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('NEWS');        $menu_item->setParentId($root_id);$menu_item->setUri('news');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('OUR SERVICES');$menu_item->setParentId($root_id);$menu_item->setUri('services');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('ABOUT US');    $menu_item->setParentId($root_id);$menu_item->setUri('about');$menu_item->save();
  $menu_item = new MenuItem();$menu_item->setWeight($weight++);$menu_item->setMenuId($menu->getId());$menu_item->setName('CONTACT');     $menu_item->setParentId($root_id);$menu_item->setUri('contact');$menu_item->save();
  
}