<?php
get_header();
while(have_posts()){
    the_post();
    display_page_banner();
    ?>   

    <div class="container">
        <!-- Breadcrumb navigation-->
        <div class="breadcrumb-btns">
            <div class="breadcrumb-1">
                <a href="<?php  echo get_post_type_archive_link('course') ?>">
                <i class="fa fa-home" aria-hidden="true"></i> Back to Courses </a>
            </div>
            <div class="breadcrumb-2">
                <p><?php the_title(); ?></p>
            </div>
        </div>

        <!-- Post content-->
        <div class="generic-content">
            <p><?php the_content() ?></p> 
        </div>

        <!-- Related Teachers-->
        <?php
        $args = array(
            'post_type' => 'teacher',
            'posts_per_page' => -1,
            'order_by' => 'title',
            'order' => 'ACS',
            'meta_query' => array(
                array(
                'key' => 'related_courses',
                'compare' => 'LIKE',
                'value' => '"'.get_the_ID().'"'
                )
            )
        );
        $relatedTeachers = new WP_Query($args);

        if($relatedTeachers->have_posts()){ ?>
            <br>
            <h1 class="post-title">Related Teachers</h1>
            <br>

            <div class="box-1">
                <ul class="page-flex">
                <?php
                while( $relatedTeachers->have_posts() ){
                    $relatedTeachers->the_post(); ?>

                    <li class="teacher-image">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('teacher_landscape'); ?>" alt="">
                            <h1 class="teacher-name"><?php the_title(); ?></h1>
                        </a>
                    </li>
                <?php
                }
                echo '</ul>';
            echo '</div>';
        }
        wp_reset_query();
 
        //<!-- Upcoming Events-->
        $date = date('Ymd');
        $args = array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'orderby' => 'meta_value',
          'meta_key' => 'event_date',
          'order' => 'ASC',
          'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $date,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'related_courses',
                    'compare' => 'LIKE',
                    'value' => '"'.get_the_ID().'"'
                )
            )                  
        );       
        $relatedEvents = new WP_Query($args);
        
        if($relatedEvents->have_posts()) {
            echo '<br><br>';
            echo '<h1 class="post-title"> Upcoming '. get_the_title() . ' Events</h1>';
            echo '<br>';
            while( $relatedEvents->have_posts() ){
                $relatedEvents->the_post();
                    get_template_part('template-parts/event');
            } 
        }
        wp_reset_query(); ?>
    </div>
<?php 
}
get_footer();
?>