<?php
$this->breadcrumbs=array(
	'Zipdatas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Zipdata', 'url'=>array('index')),
	array('label'=>'Create Zipdata', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('zipdata-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Zipdatas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zipdata-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'ZipCode',
		'ZipCodeType',
		'City',
		'State',
		'LocationType',
		/*
		'Latitude',
		'Longitude',
		'Location',
		'Decommisioned',
		'TaxReturnsFiled',
		'EstimatedPopulation',
		'TotalWages',
		'IsTireTough',
		'IsConvertible',
		'is4x4',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
