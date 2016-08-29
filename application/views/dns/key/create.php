<form method="POST" id="create-form">
	<div class="form-group has-feedback">
		<label class="control-label">Key Name</label>
		<input type="text" class="form-control" name="keyname" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Key</label>
		<input type="text" class="form-control" name="key" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Encryption Algorithm</label>
		<input type="text" class="form-control" name="enctype" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Comment</label>
		<input type="text" class="form-control" name="comment" />
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" class="form-control" name="owner" <?=($user->isAdmin())?"":"readonly disabled";?> value="<?=htmlentities($user->get_user_name());?>" />
	</div>
</form>
