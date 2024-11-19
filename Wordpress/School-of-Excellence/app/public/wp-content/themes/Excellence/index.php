<?php
get_header();
display_page_banner( array(
                    'title' => get_the_archive_title(),
                    'description' => get_the_archive_description()
                ));
?>

<div class="container">
    <div class="generic-content">
        <?php
        while(have_posts()) {
            the_post();  ?>
            <div class="box-2">
                <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
                <div class="post-meta">
                    <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('M j, Y'); ?> in <?php the_category(', '); ?></p>                   
                </div>
                <?php
                if(has_excerpt()){
                    echo get_the_excerpt();
                }
                else{
                    echo wp_trim_words(get_the_content(), 30);
                }
                ?>
                <a href="<?php the_permalink(); ?>" class="link-blue">Read more</a> 
                <p><?php the_content() ?></p>
                <br />
                <hr /><br />
            </div>
        <?php
        }

        echo paginate_links();
        ?>
    </div>
</div>

<?php
get_footer();
?>