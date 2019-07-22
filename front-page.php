<?php get_header(); ?>

<?php 

$wploop = new WP_Query(
	array(
		'meta_query' => array(
			'meta_key' => 'mb-position',
			'meta_value' => 'Owner',
		)
	)
);

?>

<div class="hero-unit">

	<?php

	if ( $wploop->have_posts() ) : while ( $wploop->have_posts() ) : $wploop->the_post();

		?>

		<h1><?php $wploop->the_title(); ?></h1>
		<?php $wploop->the_content(); ?>

		<ul>

		<?php
		echo '<li><strong>'.get_post_meta(get_the_ID(),'mb-position',true).'</strong></li>';
		echo '<li>'.$wploop->get_post_meta(get_the_ID(),'mb-email',true).'</li>' ;
		echo '<li>'.$wploop->get_post_meta(get_the_ID(),'mb-phone',true).'</li>';
		echo '<li>'.$wploop->get_post_meta(get_the_ID(),'mb-website',true).'</li>' ;
		$image_attachment_id = $wploop->get_post_meta( get_the_ID(), 'mb-image', true);
		echo '<li><img src="' . $wploop->wp_get_attachment_url( $image_attachment_id ) . '"></li>' ;
		?>

		</ul>

		<a class="btn btn-primary btn-large">View Details »</a>

</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<!-- Example row of columns -->
<div class="row">
	<div class="span4">
		<h2>Heading</h2>
		Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.

		<a class="btn" href="#">View details »</a>

	</div>
</div>

<?php get_footer(); ?>