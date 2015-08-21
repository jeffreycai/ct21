<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';
$settings = Vars::getSettings();

if (is_cli()) {
  // --------- footer left
  $block = new Block();
  $block->setName('Footer Left');
  $block->setContent('<p>Established in 1995, Century 21 Student Service Centre is a professional, well-established and highly reputable education consulting & student service company. </p><p><a href="/about">Learn more</a></p>');
  $block->save();
  
  // --------- footer right
  $block = new Block();
  $block->setName('Footer Right');
  $block->setContent('
<p>You can contact us by email or phone:<br>
<strong>Phone</strong>: +61 2 9267 6047<br>
<strong>Email</strong>: info@ct21.com.au</p>
<p><strong>Address:</strong>: Suite 1003, 370 Pitt St. Sydney, NSW 2000, Australia</p>
<p><strong>Business Hours:</strong><br>
Monday-Friday: 9AM to 5PM<br>
Saturday-Sunday: 9AM to 1PM</p>
');
  $block->save();
  
  // --------- get in touch
  $block = new Block();
  $block->setName('Get in Touch');
  $block->setContent('
<h3>Get in Touch</h3>
<p>You can contact us by email or phone:<br>
<strong>Phone</strong>: +61 2 9267 6047<br>
<strong>Email</strong>: info@ct21.com.au</p>
<p><strong>Address</strong>: Suite 1003, 370 Pitt St. Sydney, NSW 2000, Australia</p>
<p><strong>Business Hours:</strong><br>
Monday-Friday: 9AM to 5PM<br>
Saturday-Sunday: 9AM to 1PM</p>

');
  $block->save();
  
  // ------------ contact
  $block = new Block();
  $block->setName('Contact page');
  $block->setContent('
<h3>'.$settings['sitename'].'</h3>
          <p>Our headquarter is located in Sydney CBD with easy access by public transportation. We open Monday to Friday from 9AM to 5PM, Saturday to Sunday from 9AM to 1PM. We are present on all business hours on phone. You can also reach us by email or filling up the contact form below.</p>
');
  $block->save();
  
  
}