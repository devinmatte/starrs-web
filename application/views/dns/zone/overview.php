<div class="col-md-6 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($zone->get_zone());?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<?=$zoneInfo;?>
			</div>
			<div class="row">
				<a name="ns"></a>
				<?=$nRecInfo;?>
			</div>
			<div class="row">
				<a name="a"></a>
				<?=$aRecInfo;?>
			</div>
			<div class="row">
				<a name="txt"></a>
				<?=$tRecInfo;?>
			</div>
		</div>
	</div>
</div>
