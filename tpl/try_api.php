<?php
use GDO\Maps\GDT_Position;
use GDO\Template\GDT_Box;
use GDO\UI\GDT_Link;
use GDO\Template\GDT_Panel;

$example_href = href('Geo2Country', 'Api', "&lat=50.0&lng=10.0");
$link = GDT_Link::make('geoapi_link_example')->href($example_href);

echo GDT_Box::make()->label(t('geoapi_info_title'))->html(t('geoapi_info_text', [$link]));

$btn1 = t('btn_your_location');
$btn2 = t('btn_picked_location');
$pick = GDT_Position::make('pick_position')->renderForm();
$paneContent = <<<EOP
<div ng-controller="G2CApiCtrl">
  <md-button ng-click="tryUserLocation()">$btn1</md-button>
  $pick
  <md-button ng-click="tryPickedLocation()">$btn2</md-button>
</div>
EOP;

echo GDT_Panel::make()->html($paneContent);
