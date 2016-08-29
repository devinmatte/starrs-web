<div class="col-md-6 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/system/view/<?=rawurlencode($sys->get_system_name());?>"><?=htmlentities($sys->get_system_name());?></a></h3>
		</div>
		<div class="panel-body">
			<? foreach($blades as $blade) {
				print "<div class=\"row\"><div class=\"well\">";
				foreach($blade->get_rows() as $rowNum) {
					print $blade->renderRow($rowNum);
				}
				print "</div></div>";
			} ?>
		</div>
	</div>
</div>
