<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $block = new Block();
  $block->setName('Footer About Us');
  $block->setContent('<p>Established in 1995, Century 21 Student Service Centre is a professional, well-established and highly reputable education consulting & student service company. </p>');
  $block->save();
}