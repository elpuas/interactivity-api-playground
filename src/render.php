<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

// Generate unique id for aria-controls.
$unique_id = wp_unique_id( 'p-' );

?>

<div
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive="elpuasdigitalcrafts"
	data-wp-context='{ "isOpen": false }'
	data-wp-watch="callbacks.logIsOpen"
>
	<button
		data-wp-on--click="actions.toggle"
		data-wp-bind--aria-expanded="context.isOpen"
		aria-controls="<?php echo esc_attr( $unique_id ); ?>"
	>
		<?php esc_html_e( 'Toggle', 'elpuasdigitalcrafts' ); ?>
	</button>

	<p
		id="<?php echo esc_attr( $unique_id ); ?>"
		data-wp-bind--hidden="!context.isOpen"
	>
		<?php
			esc_html_e( 'Example Interactive - hello from an interactive block!', 'elpuasdigitalcrafts' );
		?>
	</p>
</div>

<div
	data-wp-interactive="elpuasdigitalcrafts"
	data-wp-context='{ "post": { "id": <?php echo get_the_ID(); ?> } }' 
	>
	<button data-wp-on--click="actions.logId">Logs Post ID</button>
</div>

<div
	class="printed"
	data-wp-interactive="elpuasdigitalcrafts"
	data-wp-context='{ "postTitle": { "title": <?php echo json_encode( get_the_title( get_the_ID() ) ); ?> } }' 
	>
	<button data-wp-on--click="actions.printed">Where I'm?</button>
</div>
