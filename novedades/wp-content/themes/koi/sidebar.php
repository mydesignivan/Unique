<div id="sidebar">
    <div class="sidebar-top"></div>
    <div class="sidebar-middle">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            <div class="widget">
                    <h4><?php _e('Pages','ndesignthemes'); ?></h4>
                    <ul>
                    <?php wp_list_pages('title_li=' ); ?>
                    </ul>
            </div>

            <div class="widget">
                    <h4><?php _e('Category','ndesignthemes'); ?></h4>
                    <ul>
                    <?php wp_list_categories('show_count=1&title_li='); ?>
                    </ul>
            </div>

            <div class="widget">
                    <h4><?php _e('Archives','ndesignthemes'); ?></h4>
                    <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                    </ul>
            </div>

            <div class="widget">
                    <h4><?php _e('Recent Comments','ndesignthemes'); ?></h4>
                    <?php include (TEMPLATEPATH . '/recent-comments.php'); ?>
            </div>
<?php endif; ?>
    </div>
    <div class="sidebar-bottom"></div>
</div>	
	<!--/sidebar -->
