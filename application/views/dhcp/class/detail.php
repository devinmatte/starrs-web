<div class="col-md-6 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<h4><?=htmlentities($c->get_class());?></h4>
			<dl class="dl-horizontal">
				<dt>Date Created</dt>
				<dd><?=htmlentities($c->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($c->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($c->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($c->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>
