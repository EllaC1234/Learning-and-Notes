<div class="box-2">
    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
    <p><?php
        echo wp_trim_words(get_the_content(), 30);
        ?>
        <a href="<?php the_permalink(); ?>" class="link-blue">Read more</a>
    </p>
</div>