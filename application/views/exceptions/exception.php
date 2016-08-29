<div class="col-md-<?=(isset($span))?$span:6;?> col-sm-12">
	<div class="alert alert-danger">
		<h4>Uh oh, something went wrong...</h4>
		<p>Message: <?=htmlentities($exception->getMessage());?></p>
		<p>Type: <?=get_class($exception);?></p>
	</div>
</div>
