<?php
$this->breadcrumbs=array(
	'Zipdatas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zipdata', 'url'=>array('index')),
	array('label'=>'Create Zipdata', 'url'=>array('create')),
	array('label'=>'View Zipdata', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Zipdata', 'url'=>array('admin')),
);
?>

<h1>Update Zipdata <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>