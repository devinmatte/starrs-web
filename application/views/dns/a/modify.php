<form class="form-horizontal" id="modify-form">
	<fieldset>
		<div class="control-group">
			<label class="control-label">Hostname: </label>
			<div class="controls">
				<input type="text" name="hostname" value="<?=$aRec->get_hostname()?>" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Zone: </label>
			<div class="controls">
				<select name="zone">
					<?php
					foreach($zones as $zone) {
						print "<option value=\"{$zone->get_zone()}\">{$zone->get_zone()}</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Address: </label>
			<div class="controls">
				<select name="address">
					<?php
					foreach($intAddrs as $intAddr) {
						if($intAddr->get_address() == $aRec->get_address()) {
							print "<option value=\"{$intAddr->get_address()}\" selected>{$intAddr->get_address()}</option>";
						}
						else {
							print "<option value=\"{$intAddr->get_address()}\">{$intAddr->get_address()}</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="control-group warning">
			<label class="control-label">TTL: </label>
			<div class="controls">
				<input type="text" name="ttl" value="<?=$aRec->get_ttl()?>"></input>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Owner: </label>
			<div class="controls">
				<input type="text" name="owner" value="<?=$aRec->get_owner();?>" <?=($user->isAdmin())?"":"disabled"?>></input>
			</div>
		</div>
	</fieldset>
</form>