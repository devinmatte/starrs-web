<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Groups</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered imp-dnstable">
							<tr>
								<th>Group</th>
								<th style="width: 162px">Actions</th>
							</tr>
							<?
							foreach($groups as $g) {
								print "<tr><td>{$g->get_group()}</td><td><a href=\"/groupmember/remove/".rawurlencode($g->get_group())."/".rawurlencode($user)."\"><button class=\"btn btn-sm btn-danger\">Remove</button></a></td></tr>";
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Systems</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered imp-dnstable">
							<tr>
								<th>System</th>
								<th style="width: 162px">Actions</th>
							</tr>
							<?
							foreach($systems as $sys) {
								print "<tr><td><a href=\"/system/view/".rawurlencode($sys->get_system_name())."\">{$sys->get_system_name()}<a/></td><td><a href=\"/system/remove/".rawurlencode($sys->get_system_name())."\"><button class=\"btn btn-sm btn-danger\">Remove</button></a></td></tr>";
							}?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
