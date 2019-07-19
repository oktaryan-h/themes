<?php get_header(); ?>

<div class="row">
	<div class="span8">

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>

			<h1><?php the_title(); ?></h1>
			<p><em><?php the_time('l, F jS, Y'); ?></em></p>

			<?php the_content(); ?>

			This is single post type for Team Members.

			<?php
			echo '<li>'.get_the_title().'</li>';
			echo '<li><strong>'.get_post_meta(get_the_ID(),'mb-position',true).'</strong></li>';
			echo '<li>'.get_post_meta(get_the_ID(),'mb-email',true).'</li>' ;
			echo '<li>'.get_post_meta(get_the_ID(),'mb-phone',true).'</li>';
			echo '<li>'.get_post_meta(get_the_ID(),'mb-website',true).'</li>' ;
			$image_attachment_id = get_post_meta( get_the_ID(), 'mb-image', true);
			echo '<li><img src="' . wp_get_attachment_url( $image_attachment_id ) . '"></li>' ;
			?>

			<hr>
			<?php comments_template(); ?>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

</div>
<div class="span4">
	<?php get_sidebar(); ?>  	
</div>
</div>

<?php get_footer(); ?>