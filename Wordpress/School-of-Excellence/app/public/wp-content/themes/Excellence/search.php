<?php
get_header();
display_page_banner(array(
    'title' => 'Search Results',
    'description' => 'Results for &ldquo;' . get_search_query() . '&rdquo;'
));
?>

<div class="container">
    <div class="generic-content">
        <?php
        if (!have_posts()) {
            echo '<h3 class="results-heading">Sorry, no results match your search. Try another query:</h3>';
            echo '<br>';
        } else {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/' . get_post_type());
                echo '<br>';
            }
        }?> 
        <div class="btn-viewAll">
            <?php echo paginate_links(); ?>
        </div>
        <?php
        get_search_form();
        ?>
        <div class="btn-viewAll">
            <?php echo paginate_links(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>