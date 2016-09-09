<form class="form-horizontal" id="modify-form">
	<fieldset>
		<div class="form-group">
			<label class="control-label">Hostname: </label>
			<input type="text" name="hostname" value="<?=htmlentities($aRec->get_hostname())?>" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
		</div>
		<div class="form-group">
			<label class="control-label">Zone: </label>
			<select name="zone" class="form-control">
				<?php
				foreach($zones as $zone) {
					print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label class="control-label">Address: </label>
			<select name="address" class="form-control">
				<?php
				foreach($intAddrs as $intAddr) {
					if($intAddr->get_address() == $aRec->get_address()) {
						print "<option value=\"".htmlentities($intAddr->get_address())."\" selected>".htmlentities($intAddr->get_address())."</option>";
					}
					else {
						print "<option value=\"".htmlentities($intAddr->get_address())."\">".htmlentities($intAddr->get_address())."</option>";
					}
				}
				?>
			</select>
		</div>
		<div class="form-group warning">
			<label class="control-label">TTL: </label>
			<input type="text" name="ttl" value="<?=htmlentities($aRec->get_ttl())?>"></input>
		</div>
		<div class="form-group">
			<label class="control-label">Owner: </label>
			<input type="text" name="owner" value="<?=htmlentities($aRec->get_owner());?>" <?=($user->isAdmin())?"":"readonly"?>></input>
		</div>
	</fieldset>
</form>
