<div class="wrap">
	<h1>Last.fm Connector</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
			settings_fields( 'lastfm_connector_options_group' );
			do_settings_sections( 'lastfm_connector' );
			submit_button();
		?>
	</form>
	
</div>
