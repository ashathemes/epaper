<?php
/**
 * Header action
 * @package Epaper
 */

function epaper_header_style_1(){ ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'epaper' ); ?></a>
	<header id="masthead" class="header-area <?php if(has_header_image() && is_front_page()): ?>epaper-header-img<?php endif; ?>">
		<?php if(has_header_image() && is_front_page()): ?>
	        <div class="header-img"> 
	        	<?php the_header_image_tag(); ?>
	        </div>
        <?php endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="site-branding text-left">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$epaper_description = get_bloginfo( 'description', 'display' );
						if ( $epaper_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html($epaper_description); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="search-form text-right">
						<?php get_search_form( ); ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<section class="mainmenu-area text-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="epaper-responsive-menu"></div>
					<button class="screen-reader-text menu-close"><?php esc_html_e( 'Close Menu', 'epaper' ); ?></button>
					<div class="mainmenu">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }
add_action('epaper_header_style','epaper_header_style_1');