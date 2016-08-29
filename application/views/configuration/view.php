<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Site Configuration</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered imp-dnstable">
				<tr>
					<th>Option</th>
					<th>Value</th>
					<th style="width: 220px;">Actions</th>
				</tr>
				<?
				foreach($confs as $c) {
					print "<tr><td>".htmlentities($c->get_option())."</td><td>".
						 htmlentities($c->get_value())."</td><td>
						 <a href=\"/configuration/view/".rawurlencode($c->get_option()).
						 "\"><button class=\"btn btn-sm btn-info\">Detail</button></a>
						 <a href=\"/configuration/modify/".rawurlencode($c->get_option()).
						 "\"><button class=\"btn btn-sm btn-warning\">Modify</button></a>
						 <a href=\"/configuration/remove/".rawurlencode($c->get_option()).
						 "\"><button class=\"btn btn-sm btn-danger\">Remove</button></a>
						 </td></tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>
