<div style="margin: 20px">
	<?php if ($has_credentials ) { ?>
		<h6>Database instances diff</h6>
		<pre class="database_instances_diff"><?php echo $instances_diff; ?></pre>
	<?php } else { ?>
		<div class="alert alert-danger">
			This operation cannot proceed without database credentials.
		    <a data-link-type="input_credentials" href="<?php echo site_url().'?action=input_credentials' ?>">Submit your database credentials here</a>.
		</div>
	<?php } ?>
</div>		
