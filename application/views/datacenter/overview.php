<div class="col-md-6 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($dc->get_datacenter());?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 well">
					<h3>Datacenter</h3>
					<dl class="dl-horizontal">
						<dt>Date Created</dt>
						<dd><?=htmlentities($dc->get_date_created());?></dd>
						<dt>Date Modified</dt>
						<dd><?=htmlentities($dc->get_date_modified());?></dd>
						<dt>Last Modifier</dt>
						<dd><?=htmlentities($dc->get_last_modifier());?></dd>
						<dt>Comment</dt>
						<dd><?=htmlentities($dc->get_comment());?>&nbsp;</dd>
					</dl>
				</div>
				<div class="col-md-6 well">
					<h3>Availability Zones</h3>
					<br />
					<ul>
						<?php
						foreach($azs as $az) {
							if($az->get_comment()) {
								print "<li><a href=\"/availabilityzone/view/".rawurlencode($az->get_datacenter())."/".rawurlencode($az->get_zone())."\">".htmlentities($az->get_zone())."</a> (".htmlentities($az->get_comment()).")</li>";
							}
							else {					
								print "<li><a href=\"/availabilityzone/view/".rawurlencode($az->get_datacenter())."/".rawurlencode($az->get_zone())."\">".htmlentities($az->get_zone())."</a></li>";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
