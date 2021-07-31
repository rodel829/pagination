<?php
/**
 * Template part for displaying page content post-temp
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kick_Ass_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( ! ( is_front_page()) && ! ( get_post()) ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?> 

	<div class="entry-content">
		<?php if (have_posts()) :

				 while (have_posts()) : the_post();

					get_template_part('content',get_post_format());

				endwhile;

			else :
				echo '<p>no content found </p>';
			endif
		 ?>

		 <h2>All Post </h2>
		 <?php 

		 	$postsCount = $instance['count_num'];
		 	$currPage = get_query_var('paged');

		 	$allPosts = new WP_Query(array(
		 		'category_name' => 'posts', 
		 		'post_per_page' => $postaCount,
		 		'paged' => $currPage

		 	));

		 	$postsCount = $instance['count_num'];

		 	if ($allPosts->have_posts()) :
		 		while ($allPosts->have_posts()) :
		 			$allPosts -> the_post()
		 			?><li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li><?php
		 		endwhile;
		 	endif;

		 	$postLinks = paginate_links(array(
		 		'total' => $aboutPosts->max_num_pages
		 	));

		 	echo $postLinks;
		 ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'kickass' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
