<?php
$this->breadcrumbs=array(
	'Warranties'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Warranty', 'url'=>array('index')),
	array('label'=>'Create Warranty', 'url'=>array('create')),
	array('label'=>'View Warranty', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Warranty', 'url'=>array('admin')),
);
?>

<h1>Update Warranty <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>