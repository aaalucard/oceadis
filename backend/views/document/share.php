<?php
	use yii\helpers\Html;
	use yii\widgets\DetailView;
?>
<p>
	<?= Html::a('<i class="glyphicon glyphicon-share-alt"></i> '.Yii::t('app', 'Return'), ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
</p>
<div class="sections">
<?php
	foreach ($sections as $section) {
?>
	<fieldset>
		    <legend class="scheduler-border"><?= $section->name ?></legend>
		    <?php 
				foreach ($departments as $department) {
				  $class = 'btn-primary';
				  $action = 'fastshare';
				  foreach ($department->departmenDocuments as $document) {
				  	if ($section->id == $document->section->id && $department->id == $document->departmen->id && $model->id == $document->document->id) {
				  		$class = 'btn-success';
				  		$action = 'removeshare';
				  	}
				  }
			?>
					<a class="section btn <?= $class ?>" data-url="<?= $action ?>" data-urlend="?section=<?= $section->id ?>&department=<?= $department->id ?>&document=<?= $model->id ?>" href="javascript:void(0)"> <?= $department->name ?> </a>
			<?php
				}
			?>
	</fieldset>
<?php
	}
?>
</div>
<script type="text/javascript">
	$('.section').on('click',function(event){
		event.preventDefault();
		$div = $(this);
		$url = $(this).attr('data-url')+$(this).attr('data-urlend');
		$.ajax({
			url: $url,
			type: 'POST',
			dataType: 'json',
			cache : false,
			//data: {param1: 'value1'},
		})
		.done(function(data) {
			if(data.status == 'successshare'){
				$div.removeClass('btn-primary').addClass('btn-success');
				$div.attr('data-url','removeshare');
			}
			if(data.status == 'successremoveshare'){
				$div.attr('data-url','fastshare');
				$div.removeClass('btn-success').addClass('btn-primary');
			}
			else{
				console.log('error');
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	return false;	
	});
</script>