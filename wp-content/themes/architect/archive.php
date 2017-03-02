<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div id="page">
	<div class="container">
		<div class="<?php mts_article_class(); ?>">
			<div id="content_box">
				<h1 class="postsby">
					<?php if (is_category()) { ?>
						<span><?php single_cat_title(); ?></span>
					<?php } elseif (is_tag()) { ?> 
						<span><?php single_tag_title(); ?></span>
					<?php } elseif (is_author()) { ?>
						<span><?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; _e(" Archive", "mythemeshop"); ?></span> 
					<?php } elseif (is_day()) { ?>
						<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
					<?php } elseif (is_month()) { ?>
						<span><?php _e("Monthly Archive:", "mythemeshop"); ?></span> <?php the_time('F Y'); ?>
					<?php } elseif (is_year()) { ?>
						<span><?php _e("Yearly Archive:", "mythemeshop"); ?></span> <?php the_time('Y'); ?>
					<?php } ?>
				</h1>

				<?php
				$catId = get_query_var('cat');
				$args = array( 'posts_per_page' => -1, 'category' => $catId);
				$posts = get_posts($args);
				$_posts = [];

				for ($i = 0, $len = count($posts); $i < $len; $i++) {
					if ($i%2==0) {
						?>

						<article class="article-post">

						<?php
					}

					?>

					<div class="inner-article">
						<a href="<?php echo get_permalink($posts[$i]->ID); ?>" title="<?php echo $posts[$i]->post_title; ?>">
							<div class="featured-thumbnail">
								<img src="<?php echo get_the_post_thumbnail_url($posts[$i]->ID);?>" class="wp-post-image">
							</div>
							<header class="entry-header">
								<h2 class="title front-view-title title-article" itemprop="headline">
									<?php echo $posts[$i]->post_title;?>
								</h2>
							</header>
						</a>
					</div>

					<?php

					if ($i%2==1 || ($len-1)%2==0 && $i == ($len-1)) {
						?>
						</article>
						<?php
					}
				}
				?>

				<?php if ( count($posts) < 0 ) { // No pagination if there is no results ?>
				<!--Start Pagination-->
	            <?php if (isset($mts_options['mts_pagenavigation_type']) && $mts_options['mts_pagenavigation_type'] == '1' ) { ?>
	                <?php mts_pagination(); ?> 
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
				<!--End Pagination-->
				<?php } ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>