<?php
$this->breadcrumbs=array(
	'Warranties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Warranty', 'url'=>array('index')),
	array('label'=>'Manage Warranty', 'url'=>array('admin')),
);
?>

<h1>Create Warranty</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>