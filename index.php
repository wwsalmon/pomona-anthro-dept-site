<?php get_header();
?>
    <div id="top-container">
        <img src="<?php echo get_template_directory_uri() ?>/assets/pomona.jpg" alt="Pomona College logo"
             style="width: 100px">
        <h1 style="font-size: 36px">
            Student ethnographies @ Pomona
        </h1>
        <p style="margin: 16px 0; font-size: 20px">
            Archives of student work from the Anthropology Department at Pomona College
        </p>
    </div>
    <div id="items-bar">
        <div id="category-bar">
            <span style="margin-right: 8px;">Filter by category</span>
			<?php wp_dropdown_categories( array(
				'show_option_none' => 'All items'
			) ); ?>
        </div>
        <div id="search-bar">
            <input type="text" id="search-input" placeholder="Search by title or author">
            <button id="search-button">Search</button>
        </div>
        <script type="text/javascript">
            const dropdown = document.getElementById("cat");

            function onCatChange() {
                if (dropdown.options[dropdown.selectedIndex].value > 0) {
                    location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat=" + dropdown.options[dropdown.selectedIndex].value;
                } else {
                    location.href = "<?php echo esc_url( home_url( '/' ) ); ?>";
                }
            }

            dropdown.onchange = onCatChange;

            const searchButton = document.getElementById("search-button");
            const searchInput = document.getElementById("search-input");

            function onSearchButtonClick() {
                location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?s=" + searchInput.value;
            }

            searchButton.onclick = onSearchButtonClick;
        </script>
    </div>
<?php
if ( is_search() ) {
	?>
    <div id="search-banner">
        <div id="search-banner-inner">
            <span>Showing search results for <b><?php echo get_search_query( false ) ?></b>. <a
                        href="<?php echo esc_url( home_url( '/' ) ); ?>" style="text-decoration: underline">Return to all posts</a></span>
        </div>
    </div>
	<?php
}
?>
    <div id="item-grid">
		<?php
		$cat_id       = get_query_var( 'cat' );
		$search_query = get_search_query( false );
		$page         = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args         = array(
			'post_type'      => 'Student work',
			'posts_per_page' => 12,
			'cat'            => $cat_id,
			's'              => $search_query,
			'paged'          => $page,
		);
		$items        = new WP_Query( $args );
		if ( $items->have_posts() ) :
			while ( $items->have_posts() ) : $items->the_post();
				$cats     = get_the_category();
				$is_embed = has_category( 'StoryMap' );
				?>
                <a class="item" href="<?php echo get_post_meta( get_the_ID(), 'url', true ); ?>">
                    <div class="item-top-bar">
						<?php
						foreach ( $cats as $cat ) {
							?>
                            <button class="item-category"><span><?php echo $cat->name ?></span></button>
							<?php
						}
						?>
                    </div>
                    <?php
					if ( $is_embed ) {
						?>
                        <h3><?php the_title(); ?></h3>
                        <iframe src="<?php echo get_post_meta( get_the_ID(), 'url', true ); ?>"
                                class="item-embed" onload="this.style.visibility='visible';"></iframe>
                        <button class="item-link-button"
                                onclick="location.href='<?php echo get_post_meta( get_the_ID(), 'url', true ); ?>'">
                            ⧉
                        </button>
						<?php
					} else {
						?>
                        <h2><?php the_title(); ?></h2>
						<?php
					}
					?>
                    <div class="item-bottom-bar">
						<?php echo get_post_meta( get_the_ID(), 'author', true ); ?>
                    </div>
                </a>
			<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
    </div>
    <div id="pagination">
        <?php
        $big = 999999999;
        echo paginate_links( array(
	        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'format'  => '?paged=%#%',
	        'current' => max( 1, get_query_var( 'paged' ) ),
	        'total'   => $items->max_num_pages,
        ) );
        ?>
    </div>
<?php
get_footer();