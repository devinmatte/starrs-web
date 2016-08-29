<form method="POST" id="modify-form">
	<div class="form-group has-feedback">
		<label class="control-label">Key Name</label>
		<input type="text" class="form-control" name="keyname" value="<?=$key->get_keyname();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Key</label>
		<input type="text" class="form-control" name="key" value="<?=$key->get_key();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Encryption Algorithm</label>
		<input type="text" class="form-control" name="enctype" value="<?=$key->get_enctype();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Comment</label>
		<input type="text" class="form-control" name="comment" value="<?=$key->get_comment();?>" />
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" class="form-control" name="owner" <?=($isAdmin)?"":"readonly disabled";?> value="<?=$key->get_owner();?>" />
	</div>
</form>
