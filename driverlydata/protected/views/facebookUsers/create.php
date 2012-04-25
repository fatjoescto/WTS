<?php
$this->breadcrumbs=array(
	'Facebook Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FacebookUsers', 'url'=>array('index')),
	array('label'=>'Manage FacebookUsers', 'url'=>array('admin')),
);
?>

<h1>Create FacebookUsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>