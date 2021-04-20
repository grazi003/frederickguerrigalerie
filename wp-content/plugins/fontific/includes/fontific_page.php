<h1>Fontific</h1>

<div id="fontific-plugin-description">
	<ul>
		<li><?php _e('For more details about Google Web Fonts please visit', 'fontific')?> <a href="http://www.google.com/webfonts" title="<?php _e('Official Google Web Fonts website', 'fontific')?>"><?php _e('Google Fonts website', 'fontific')?></a></li>
		<li><?php _e('Need help? Please visit', 'fontific')?> <a href="http://kringapps.com/fontific" title="<?php _e('Official Fontific website', 'fontific')?>"><?php _e('official plugin website', 'fontific')?></a></li>
	</ul>
	
</div>

<div class="fontific-controls">
	<ul>
		<li><a href="javascript:void(0);" class="collapse-all"><?php _e('collapse all', 'fontific')?></a></li>
		<li><a href="javascript:void(0);" class="expand-all"><?php _e('expand all', 'fontific')?></a></li>
	</ul>
	<div class="save-all">
		<a href="javascript:void(0);"><span><?php _e('Save all changes', 'fontific')?></span></a>
	</div>
</div>

<div id="fontific-font-factory">
	<?php if( !empty( $rules ) ):?>
		<?php foreach( $rules as $k => $rule ): ?>
			<?php $rule['id'] = $k;?>
			<?php include('fontific_rule.php'); ?>
		<?php endforeach;?>
	<?php endif;?>
</div><!--#fontific-font-factory-->

<div class="fontific-controls">
	<ul>
		<li><a href="javascript:void(0);" class="collapse-all"><?php _e('collapse all', 'fontific')?></a></li>
		<li><a href="javascript:void(0);" class="expand-all"><?php _e('expand all', 'fontific')?></a></li>
	</ul>
	<div class="save-all">
		<a href="javascript:void(0);"><span><?php _e('Save all changes', 'fontific')?></span></a>
	</div>
</div>

<div id="fontific-add-rule">
	
	<a href="javascript:void(0);"><span><?php _e('New font rule', 'fontific')?></span></a>
	
</div>