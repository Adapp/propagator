<div style="margin: 20px">
	<h6>Database role</h6>
	<?php { $this->view("database_role_table", array("database_roles" => array($database_role))); } ?>
</div>


<?php if(!empty($instances)) { ?>
<form action="index.php" method="get" class="form-inline" id="compare_role_form">
	<input type="hidden" name="action" value="compare_role_instances">
	<input type="hidden" id="source_database_instance_id" name="source_database_instance_id" value="">
	<input type="hidden" id="target_database_instance_id" name="target_database_instance_id" value="">
	<div style="margin: 20px">
		<div class="input-group">
			<div class="btn-group input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="select_source_instance">
					Choose source instance <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<?php foreach ($instances as $instance)  { ?>
						<li><a href="#" data-type="source_database_instance" data-value="<?php echo $instance['database_instance_id'] ?>" data-description="<?php echo $instance['host'].':'.$instance['port']; ?>">
							<?php echo $instance['host'].':'.$instance['port']; ?>
						</a></li>
					<?php } ?>
				</ul>
			</div>
			<input type="text" id="source_database_instance_description" name="source_database_instance_description" value="" class="form-control input-large" disabled="disabled" placeholder="Source instance (cannot be empty)"/>
		</div>
	</div>
	<div style="margin: 20px">
		<div class="input-group">
			<div class="btn-group input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="select_target_instance">
					Choose target instance <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<?php foreach ($instances as $instance)  { ?>
						<li><a href="#" data-type="target_database_instance" data-value="<?php echo $instance['database_instance_id'] ?>" data-description="<?php echo $instance['host'].':'.$instance['port']; ?>">
							<?php echo $instance['host'].':'.$instance['port']; ?>
						</a></li>
					<?php } ?>
				</ul>
			</div>
			<input type="text" id="target_database_instance_description" name="target_database_instance_description" value="" class="form-control" disabled="disabled" placeholder="Target instance (cannot be empty)"/>
		</div>
	</div>
	<center>
		<div>
			<button class="btn btn-primary btn-small" type="button" id="compare_role_form_submit">Compare</button>
		</div>
	</center>
	</form>
<?php } ?>


<script lang="JavaScript">
	$(document).ready(function() {
		function setFormSubmitEnabledStatus() {
			var enabled = true;
			if ($("#source_database_instance_description").val() == "" || $("#target_database_instance_description").val() == "") {
				enabled = false;
			}
			if ($("#source_database_instance_description").val() == $("#target_database_instance_description").val()) {
				enabled = false;
			}
			if (enabled) {
				$('#compare_role_form_submit').removeAttr('disabled');
			}
			else {
				$('#compare_role_form_submit').attr('disabled','disabled');
			}
		}

		$("#compare_role_form_submit").click(function() {
			$("#compare_role_form").submit();
		});

		$('[data-type="source_database_instance"]').click(function() {
			$("#source_database_instance_id").val($(this).attr("data-value"));
			$("#source_database_instance_description").val($(this).attr("data-description"));
			setFormSubmitEnabledStatus();
		});
		$('[data-type="target_database_instance"]').click(function() {
			$("#target_database_instance_id").val($(this).attr("data-value"));
			$("#target_database_instance_description").val($(this).attr("data-description"));
			setFormSubmitEnabledStatus();
		});
		setFormSubmitEnabledStatus();
});
</script>
