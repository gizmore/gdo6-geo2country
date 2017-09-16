<?php
use GDO\Maps\GDT_Position;
?>
HI
<div ng-controller="G2CApiCtrl">
  <md-button ng-click="tryUserLocation()"><?= t('btn_your_location'); ?></md-button>
  <?= GDT_Position::make('pick_position')->renderForm(); ?>
  <md-button ng-click="tryPickedLocation()"><?= t('picked_location'); ?></md-button>
</div>
<?php
