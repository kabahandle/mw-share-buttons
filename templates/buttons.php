<div id="mw-share-buttons-<?php the_ID(); ?>" class="mw-share-buttons" data-mw-share-buttons-title="<?php echo esc_attr( $title ); ?>" data-mw-share-buttons-url="<?php echo esc_attr( $permalink ); ?>" data-mw-share-buttons-postid="<?php the_ID(); ?>">
	<ul class="mw-share-buttons__list">
		<li class="mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_facebook type="<?php echo esc_attr( $type ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_twitter type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_hatena type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_pocket type="<?php echo esc_attr( $type ); ?>" title="<?php echo esc_attr( $title ); ?>" permalink="<?php echo esc_attr( $permalink ); ?>"]
		</li>
		<li class="mw-share-buttons__item">
			[<?php echo esc_html( \MwShareButtons\Setup\Config::KEY ); ?>_feedly type="<?php echo esc_attr( $type ); ?>"]
		</li>
	</ul>
</div>
