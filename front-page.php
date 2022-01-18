<?php 
get_header();
?>

<div class="bootstrap-wrapper">
	<div class="container-fluid">
        <div class="row">
           <div id="sidebar" class="col-md-2">
               <?php get_sidebar(); ?>
           </div>

           <div id="main_loop" class="col-md-6">
               <?php
                if (have_posts()) : 
                    while (have_posts()) :
                        ?><h1><?php the_title(); ?></h1>
                        <?php
                        the_post();
                            the_content();
                    endwhile;
                endif;

                $args = array('post_type' => array('post-type' => 'videos'));
                $loop = new WP_Query( $args );
                while ($loop->have_posts() ):
                    $loop->the_post();
                    ?><h3><?php echo the_title();?></h3><?php echo the_excerpt();
                endwhile;
                wp_reset_postdata();
                ?>




            </div>

            <div id="custom_feed" class="col-md-4">
                <h1>Custom Feed</h1>
                <?php
                if (is_user_logged_in()) {
                    if(! get_user_meta(get_current_user())) {
                        add_user_meta(get_current_user_id(), 'subscriptions', [], false);
                    }
                    foreach( get_user_meta(get_current_user_id()) as $key => $value) {
                        echo "${key} => ${value} <br>";
                    }
                }
                else {
                    if (have_posts()) :
                        while (have_posts()) :
                            ?><h3><?php the_title(); ?></h3>
                        <?php
                        the_post();
                        endwhile;
                    endif;
                }
                ?>
            </div>
        </div>
	</div>
</div>


<?php 
get_footer();

?>
</body>