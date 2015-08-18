<?php

$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $settings['sitename'],
    'body_class' => 'home page page-id-115 page-template-default has-toolbar'
));

$html->output('<div id="page-container">');
$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/components/slider');
$html->renderOut('site/components/countries_block', array(
    'title' => 'Apply for oversea study',
    'countries' => Country::findAll()
));
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');