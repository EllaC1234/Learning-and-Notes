<?php
//user not logged in OR user role not teacher
if (!is_user_logged_in() or !check_user_role('teacher')){
    if(!check_user_role('administrator')){
        wp_redirect(site_url('/'));
        exit;
    }
}

get_header();
display_page_banner();
?>

<div class="container">
    <!-- page content -->
    <div class="generic-content">
        <div class="add-lecture">
            <h2 class="lecture-title">Create a lecture note:</h2>
            <input class="new-lecture-title" placeholder="Title">
            <textarea class="new-lecture-content" placeholder="Lecture Content"></textarea>
            <span class="submit-lecture create-lecture"><i class="fa fa-plus-square" aria-hidden="true"></i> Create</span>
            <span class="post-limit-exceeded">You have reached the post limit. Delete an existing post to make room for more.</span>
        </div>
        <ul class="list-item" id="lectures">
            <?php
            $args = array(
                'post_type' => 'lecture',
                'post_per_page' => -1,
                'author' => get_current_user_id()
            );
            $lectureNotes = new WP_Query($args);
            while ($lectureNotes->have_posts()) {
                $lectureNotes->the_post(); ?>
                <li data-id="<?php the_ID(); ?>">
                    <div class="notes-container">
                        <input readonly class="lecture-title" value="<?php echo str_replace('Private: ', '', esc_attr(get_the_title())); ?>">
                        <span class="edit-lecture"><i class="fas fa-edit" aria-hidden="true"></i> Edit</span>
                        <span class="delete-lecture"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span>
                    </div>
                    <textarea readonly class="lecture-content"><?php echo esc_textarea(wp_strip_all_tags(get_the_content())); ?></textarea>
                    <span class="submit-lecture save-btn"><i class="fa fa-save" aria-hidden="true"></i> Save</span>
                    <span class="submit-lecture cancel-btn"><i class="fa fa-window-close" aria-hidden-="true"></i> Cancel</span>
                </li>
            <?php
            }

            ?>
        </ul>
    </div>
</div>

<?php
get_footer();
?>