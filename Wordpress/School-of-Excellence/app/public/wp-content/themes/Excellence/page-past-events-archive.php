<?php
get_header();
display_page_banner();
?>


<div class="container">
    <div class="generic-content">
        <?php
        $date = date('Ymd');  //variable holds today’s date
        $args = array(
                  'paged' => get_query_var('paged'),
                  'post_type' => 'event',
                  'orderby' => 'meta_value',
                  'meta_key' => 'event_date',
                  'meta_query' => array(
                                       array(
                                             'key' => 'event_date',
                                             'compare' => '<',
                                              'value' => $date, 
                                              'type' => 'numeric'
                                              )
                                  )           
                   );
        $pastEvents = new WP_Query($args);

        while ($pastEvents->have_posts()) {
            $pastEvents->the_post(); 
            get_template_part('template-parts/event');  
        } ?>
        <div class="btn-viewAll">
            <?php echo paginate_links(array(
		                                'total' => $pastEvents->max_num_pages
                                     )); 
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>