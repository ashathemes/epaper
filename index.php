<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Epaper 
 */

if(is_active_sidebar('sidebar-1')){
	$epaper_column = 8;
}else{
	$epaper_column = 12;
}
get_header();
?>
<section class="blog-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>" id="content">
	<div class="container">
		<div class="easy-tricker-content">
			<div class="row">
				<div class="col-lg-3 padding-right">
					<div class="news-text">
	                    <h2><?php esc_html_e('Latest News','epaper'); ?></h2>
	                </div>
				</div>
				<div class="col-lg-9 tpadding-left">
					<div class="news-content">
	                    <div class="news">
	                        <ul>
		                        <?php  if ( have_posts() ) :
		                        while(have_posts()) : the_post(); ?>
		                            <li>
		                                <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>
		                            </li>
		                        <?php endwhile;  endif; ?>
	                        </ul>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="slide-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php  if ( have_posts() ) :
							$i = 0;
				        	while(have_posts()) : the_post(); 
				        	$i++;
				        	?>
				            <div class="carousel-item <?php if($i==1): ?>active<?php endif; ?>">
				            	<?php if ( has_post_thumbnail () ): ?>
								<div class="post-thumbnail">
									<?php epaper_post_thumbnail(); ?>
								</div>
								<?php endif; ?>
								<div class="<?php if ( has_post_thumbnail () ): ?>carousel-caption d-none d-md-block<?php endif; ?>">
									<h5><?php echo esc_html(the_title()); ?></h5>
									<?php echo esc_html(the_excerpt()); ?>
								</div>
							</div>
				        <?php endwhile;  endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-<?php echo esc_attr($epaper_column); ?>">
				<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif; ?>
						<div class="row masonry-post">
						<?php 

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; ?>
						</div>
						<?php 
						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?>
			</div>
			<?php if(is_active_sidebar('sidebar-1')): ?>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
