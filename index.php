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
    <div id="item-grid">
		<?php
		$args  = array(
			'post_type' => 'Student work',
            'posts_per_page' => 10,
		);
		$items = new WP_Query( $args );
		if ( $items->have_posts() ) :
			while ( $items->have_posts() ) : $items->the_post();
                $cats = get_the_category();
                $is_embed = has_category('StoryMap');
				?>
                <a class="item" href="<?php echo get_post_meta(get_the_ID(), 'url', TRUE); ?>">
                    <div class="item-top-bar">
                        <?php
                            foreach ($cats as $cat) {
                                ?>
                                    <button class="item-category"><span><?php echo $cat->name?></span></button>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                    if ($is_embed) {
                        ?>
                        <iframe src="<?php echo get_post_meta(get_the_ID(), 'url', TRUE); ?>" class="item-embed"></iframe>
                        <?php
                    } else {
	                    ?>
                        <h2><?php the_title(); ?></h2>
	                    <?php
                    }
                    ?>
                    <div class="item-bottom-bar">
                        <?php echo get_post_meta(get_the_ID(), 'author', TRUE); ?>
                    </div>
                </a>
			<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
    </div>
<?php
get_footer();