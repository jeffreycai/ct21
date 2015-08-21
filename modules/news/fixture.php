<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $news = new News();
  $news->setTitle('Free consultation for Australia immigration');
  $news->setContent('<p>Century 21 Student Service has a free consultation for oversea students ...</p>');
  $news->setThumbnail('files/fixture/thumbnail/consultation-education-flagship_940.jpg');
  $news->setImage('files/fixture/image/consultation-education-flagship_812.jpg');
  $news->setDate(1439215200);
  $news->save();
  
  $news = new News();
  $news->setTitle('News Year bonus program for $300 dollars');
  $news->setContent('<p>We are giving away $300 dollars free credit for students applying for Australian colleges...</p>');
  $news->setThumbnail('files/fixture/thumbnail/bonus_815.jpg');
  $news->setImage('files/fixture/image/bonus_711.jpg');
  $news->setDate(1439733600);
  $news->save();
  
  $news = new News();
  $news->setTitle('UNSW orientation program is on now!');
  $news->setContent('<p>From 3rd Sept to 5th Sept, Century 21 Student service will hold a special orientation session for future students who are planning to study in UNSW.</p>');
  $news->setThumbnail('files/fixture/thumbnail/unsw_via_stargate_940.jpg');
  $news->setImage('files/fixture/image/unsw_via_stargate_252.jpg');
  $news->setDate(1440079200);
  $news->save();
  
  $news = new News();
  $news->setTitle('Introduction to CT21 VIP program');
  $news->setContent('<p>Century 21 Student Service has a new VIP program just announced this Friday.</p>');
  $news->setThumbnail('files/fixture/thumbnail/maxresdefault_655.jpg');
  $news->setImage('files/fixture/image/maxresdefault_169.jpg');
  $news->setDate(1440079200);
  $news->save();
}