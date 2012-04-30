<?php
$this->breadcrumbs=array(
	'Warranties',
);

$this->menu=array(
	array('label'=>'Create Warranty', 'url'=>array('create')),
	array('label'=>'Manage Warranty', 'url'=>array('admin')),
);
?>

<h1>Warranties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
