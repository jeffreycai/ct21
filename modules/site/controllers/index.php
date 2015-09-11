<?php

// get youtube video url from block
$block = Block::findByName('Youtube video');
$matches = array();
preg_match('/\/\/www.youtube.com\/embed\/[^\<]+/', $block, $matches);
$youtube_url = $matches[0];


$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $settings['sitename'],
    'body_class' => 'home page page-id-115 page-template-default has-toolbar'
));

$html->output('<div id="page-container">');
$html->renderOut('site/components/toptoolbar');
$html->renderOut('site/components/header');
$html->renderOut('site/components/slider', array(
    'carousels' => Carousel::findAll()
));
$html->renderOut('site/components/latest_news', array(
    'youtube_url' => $youtube_url,
));
$html->renderOut('site/components/countries_block', array(
    'title' => 'Apply for oversea study',
    'countries' => Country::findAll()
));
$html->renderOut('site/components/testimonial');
$html->renderOut('site/components/footer');
$html->output('</div>');
$html->renderOut('site/components/page_footer');

$html->renderOut('site/components/html_footer');