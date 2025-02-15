<!DOCTYPE html>
<html <?php language_attributes(); ?>
>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title(' | ', 'echo', 'right') ?> <?php bloginfo('name') ?>
        
        
    </title>
    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?> >
    <div class="container">
        <div class="section-content">
        <?php 
            if(!is_single()) { ?>
            <div class="section-header">
                <?php if(is_archive()) {
                    echo '<h2>'. get_the_archive_title() .' </h2>';

                } else {
                    echo '<h2>'. get_bloginfo('name') .'</h2>'; 
                } ?>
                
            </div>
        <?php }
        ?>
            
        <?php 
        if(have_posts()){ ?>
        <main>
            <?php echo (!is_home() ? '<a class="to-home" href="'. esc_url(site_url('/'))  . '">&laquo; Back to Home</a>' : ''); ?>
            
        <?php while(have_posts()) {
        the_post(); ?>
        <article id="post">
            <div class="post-header">
                <h4>
                    <?php if(!is_single()) { ?>
                        <a href = "<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                        </a>
                   <?php } else { ?>
                        <?php the_title(); ?>
                        
                   <?php } ?>
                    
                
                </h4>
                <div class="post-meta">
                    <?php echo get_avatar(get_the_author_meta('ID'), '18', array('class' => array())); ?>
                    <span class="post-author"> 
                       <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('display_name'); ?></a> 
                    </span> |
                    <span class="post-time"><?php the_time('Y-m-d'); ?>
                    </span> |
                    Cat: <?php the_category(); ?> <?php echo (has_tag() ? '| Tag:' : ''); ?>
                    <?php the_tags(); ?>
                    <?php if(is_single()) {
                        echo '|';
                        previous_post_link('%link', '&laquo; Prev');
                        next_post_link('%link', 'Next &raquo;');
                    } ?>
                    
                    

                </div>
            </div>

            <?php if(has_post_thumbnail()) { ?>
                <div class="post-body">
                    <?php if(!is_single()) { ?>
                        <a href="<?php the_permalink(); ?>" class="post-featured">
                    <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>"
                    alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>"
                    class="post-featured-image">     
                    </a>
                    <?php } else{ ?>
                        <div class="post-featured">
                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>"
                    alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>"
                    class="post-featured-image">        
                        </div>
                    <?php } ?>
                    
                    
                    <div class="post-text-with-featured">
                    <?php 
                    if(is_home() || is_archive()) {
                        // the_excerpt(); 
                        if(has_excerpt()) {
                            echo get_the_excerpt();
                        } else {
                            echo wp_trim_words(get_the_content(), 30);
                        }

                    } elseif (is_single()) {
                        the_content();
                    }
                    ?>
                
                    </div>       
        
                </div>
               <?php } else { ?>
                <div class="post-body">
                    <div class="post-text-without-featured">
                    <?php 
                    if(is_home() || is_archive()) {
                        if(has_excerpt()) {
                            echo get_the_excerpt();
                        } else {
                            echo wp_trim_words(get_the_content(), 30);
                        }

                    } elseif (is_single()) {
                        the_content();
                    }
                    ?>
                
                    </div>       
        
                </div>
               <?php } ?>
            
                
        </article>
               
        <?php } ?>
        </main>
            <div class="pagnation">
                <?php 
                //next_posts_link('&laquo; Older');
                //previous_posts_link('Newer &raquo;')
                //posts_nav_link();
                //echo paginate_links();
                the_posts_pagination();
                ?>
                
            </div>
        <?php } else {
            echo '<p> Soarry, No Post. </p>';
            }
        ?>
        </div>
    </div>
 
 
    <?php wp_footer(); ?>
</body>
</html>
