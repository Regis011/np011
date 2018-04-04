<?php
/**
 * Right sidebar check.
 *
 * @package np011
 */
?>

<?php $sidebar_pos = get_theme_mod( 'np011_sidebar_position' ); ?>

<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

  <?php get_sidebar( 'right' ); ?>

<?php endif; ?>
