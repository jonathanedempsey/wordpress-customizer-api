<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">

        <div id="header">
           
            <p class="site-title">
                <a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'title' ); ?></a>
            </p>

            <?php if( get_header_image() != "" ): ?>
            <div id="banner">                
                <img src="<?php header_image(); ?>" alt="Header graphic" />                
            </div>
            <?php endif ?>

            <?php 

              $defaults = array(
                'theme_location'  => 'main-menu',
              );
              wp_nav_menu( $defaults );

            ?>               
           
        </div>

        <div id="maincontent">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p><?php the_content(); ?></p>        

            <?php endwhile; endif; ?>        
        </div>


        <div id="footer">

            <p class="site-description">
                <?php bloginfo( 'description' ); ?>
            </p>            

        </div>

    </div>
    <?php wp_footer(); ?>

</body>
</html>