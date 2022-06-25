<?php get_header();
?>
    <div id="top-container">
        <img src="<?php echo get_template_directory_uri() ?>/assets/pomona.jpg" alt="Pomona College logo"
             style="width: 100px">
        <h1 style="font-size: 36px">
            Student ethnographies @ Pomona
        </h1>
        <p style="margin: 16px 0; font-size: 20px">
            Archives of student work from the anthropology department at Pomona College
        </p>
    </div>
    <div class="item-grid">
		<?php
		$args  = array(
			'post_type' => 'Student work',
            'posts_per_page' => 10,
		);
		$items = new WP_Query( $args );
		if ( $items->have_posts() ) :
			while ( $items->have_posts() ) : $items->the_post();
				?>
                <h2><?php the_title(); ?></h2>
			<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
    </div>
<?php
get_footer();