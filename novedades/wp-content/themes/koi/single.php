<?php get_header(); ?>
	<div id="content_top"></div>
	<div id="content">
            <h1 class="title-section">Novedades <img src="http://www.uniquewp.com.ar/images/dibujo-titulo-seccion.png" alt="" width="74" height="57" /></h1>
            <div class="clear"></div>

            <div class="fleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post-date">
                            <div class="cont-date">
                                <span class="day"><?php the_time(__('d','ndesignthemes')) ?></span>
                                <span class="month"><?php the_time(__('M','ndesignthemes')) ?></span>
                                <span class="year"><?php the_time(__('Y','ndesignthemes')) ?></span>
                                <!--<span class="postcomment"><?php //comments_popup_link(__('No Comments','ndesignthemes'), __('1 Comment','ndesignthemes'), __('% Comments','ndesignthemes')); ?></span>-->
                            </div>
                        </div>
			<!--<p class="post-data"><span class="postauthor">by <?php //the_author_link(); ?></span><span class="postcategory">in <?php //the_category(', ') ?></span> <?php //the_tags( '<span class="posttag">Tags: ', ', ', '</span>'); ?> <?php //edit_post_link(__('[Edit]','ndesignthemes')); ?></p>-->
			<?php the_content(__('MAS','ndesignthemes')); ?>
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','ndesignthemes').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<!--<p class="post-nav"><span class="previous"><?php //previous_post_link(__('<em>Previous</em> %link','ndesignthemes')) ?></span> <span class="next"><?php //next_post_link(__('<em>Next</em> %link','ndesignthemes')) ?></span></p>-->

	<?php comments_template(); ?>

		</div>
		<!--/post -->

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>
            </div>

<?php get_sidebar(); ?>

	</div>
	<!--/content -->
	<div id="content_bottom"></div>

<?php get_footer(); ?>


		

