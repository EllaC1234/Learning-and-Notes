<div class="box-2">
    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
    <p><?php
        if (has_excerpt()) {
            echo get_the_excerpt();
        } else {
            echo wp_trim_words(get_the_content(), 30);
        }
        ?>
        <a href="<?php the_permalink(); ?>" class="link-blue">View Course</a>
    </p>
</div>