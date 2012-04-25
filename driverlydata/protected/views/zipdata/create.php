<?php
$this->breadcrumbs=array(
	'Zipdatas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zipdata', 'url'=>array('index')),
	array('label'=>'Manage Zipdata', 'url'=>array('admin')),
);
?>

<h1>Create Zipdata</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>