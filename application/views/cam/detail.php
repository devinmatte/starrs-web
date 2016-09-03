<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2><a href="/system/view/<?=rawurlencode($sys->get_system_name());?>"><?=htmlentities($sys->get_system_name());?></a>
			<small><?=($cam)?$cam[0]->get_date_created():"No CAM data";?></small></h2>
			<div class="table-responsive">
				<table class="table table-bordered table-striped imp-dnstable" id="camtable">
					<tr><th>MAC Address</th><th>Port Name</th><th>VLAN</th></tr>
					<?
					foreach($cam as $c) {
						print "<tr><td><a href=\"/interface/view/".rawurlencode($c->get_mac())."\">{$c->get_mac()}</a></td><td><a class=\"switchport-link\" href=\"/network/switchport/view/".rawurlencode($sys->get_system_name())."/".rawurlencode($c->get_switchport()->get_index())."\">{$c->get_switchport()->get_name()}</a></td><td><a href=\"/network/vlan/view/".rawurlencode($sys->get_datacenter())."/".rawurlencode($c->get_switchport()->get_vlan())."\">{$c->get_switchport()->get_vlan()}</a></td></tr>";
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>
