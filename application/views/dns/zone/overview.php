<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Zone: <?=htmlentities($zone->get_zone());?></h3>
		</div>
		<div class="panel-body">
			<?=$zoneInfo;?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">NS Records</h3>
		</div>
		<div class="panel-body">
			<?=$nRecTable;?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">A/AAAA Records</h3>
		</div>
		<div class="panel-body">
			<?=$aRecTable;?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">TXT Records</h3>
		</div>
		<div class="panel-body">
			<?=$tRecTable;?>
		</div>
	</div>
</div>
