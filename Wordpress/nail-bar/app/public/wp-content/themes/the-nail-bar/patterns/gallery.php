<?php
/**
 * Title: Gallery
 * Slug: the-nail-bar/gallery
 * Categories: gallery
 * Description: assorted gallery with title and description
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"5%","left":"5%"}}},"layout":{"contentSize":"1280px","type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-right:5%;padding-left:5%">
    <!-- wp:group {"style":{"color":{"gradient":"linear-gradient(90deg,rgba(0,0,0,0) 20%,rgba(255,128,0,0.06) 20%)"},"spacing":{"padding":{"top":"3em","right":"10%","bottom":"3em","left":"0px"}},"border":{"radius":[]}},"layout":{"contentSize":"100%","type":"constrained"}} -->
    <div class="wp-block-group has-background" style="background:linear-gradient(90deg,rgba(0,0,0,0) 20%,rgba(255,128,0,0.06) 20%);padding-top:3em;padding-right:10%;padding-bottom:3em;padding-left:0px">
        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topRight":null,"bottomLeft":null,"bottomRight":null}},"color":{"duotone":["#000000","#000"]}}} -->
                <figure class="wp-block-image size-full">
                    <img src="https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/pd19-3-18272a.jpg?w=1200&amp;h=1200&amp;fit=clip&amp;crop=default&amp;dpr=1&amp;q=75&amp;vib=3&amp;con=3&amp;usm=15&amp;cs=srgb&amp;bg=F4F4F3&amp;ixlib=js-2.2.1&amp;s=761ff035db8f02a4e86cdbb9d214c5a5" alt=""/>
                </figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":null,"bottomLeft":null,"bottomRight":null}},"color":{"duotone":["#000000","#000"]}}} -->
                <figure class="wp-block-image size-full">
                    <img src="https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/pd19-3-17626a.jpg?w=1200&amp;h=1200&amp;fit=clip&amp;crop=default&amp;dpr=1&amp;q=75&amp;vib=3&amp;con=3&amp;usm=15&amp;cs=srgb&amp;bg=F4F4F3&amp;ixlib=js-2.2.1&amp;s=cc02ebe064a384563b167e1138bcf92b" alt=""/>
                </figure>
                <!-- /wp:image -->

                <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0px","left":"0px"}}}} -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"33.33%"} -->
                    <div class="wp-block-column" style="flex-basis:33.33%">
                        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":null,"topRight":null,"bottomRight":null}},"color":{"duotone":["#000000","#000"]}}} -->
                        <figure class="wp-block-image alignwide size-large is-style-rounded">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hotel-facade.webp" alt="<?php esc_attr_e( 'Hyatt Regency San Francisco, San Francisco, United States', 'twentytwentyfour' ); ?>" />
                        </figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"5%","bottom":"5%","left":"5%"}}}} -->
                    <div class="wp-block-column" style="padding-top:5%;padding-bottom:5%;padding-left:5%;flex-basis:66.66%">
                        <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.2em","fontSize":"14px","fontStyle":"normal","fontWeight":"700","lineHeight":"1"},"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
                        <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:14px;font-style:normal;font-weight:700;letter-spacing:0.2em;line-height:1;text-transform:uppercase">— This is Title</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}}} -->
                        <p style="font-size:16px">Just a short sentence. Write your own copy text here. This is just a demo text you should overwrite. Just a short sentence. Write your own copy text here.</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->