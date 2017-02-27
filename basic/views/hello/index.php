<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<h1><?=Html::encode($data);?></h1>
<h1><?=HtmlPurifier::process($data);?></h1>
<?php $this->beginBlock('block1');?>
<h1>test test test</h1>
<?php $this->endBlock();?>