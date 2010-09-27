<?php get_header(); ?>
	<div id="content_top"></div>
	<div id="content">
            <h1 class="title-section">Novedades <img src="http://www.uniquewp.com.ar/images/dibujo-titulo-seccion.png" alt="" width="74" height="57" /></h1>
            <div class="clear"></div>
	<?php if (have_posts()) : ?>
            <div class="fleft">
		<?php while (have_posts()) : the_post(); ?>

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
			<!--<p class="post-data">
                            <span class="postauthor">by <?php //the_author_link(); ?></span>
                            <span class="postcategory">in <?php //the_category(', ') ?></span> <?php //the_tags( '<span class="posttag">Tags: ', ', ', '</span>'); ?> <?php //edit_post_link(__('[Edit]','ndesignthemes')); ?>
                        </p>-->
			<?php the_content(__('More','ndesignthemes')); ?>
		</div>
		<!--/post -->
		<?php endwhile; ?>
            </div>

<?php get_sidebar(); ?>

		<p class="post-nav"><span class="previous"><?php next_posts_link(__('<em>Previous</em> Older Entries','ndesignthemes')) ?></span> <span class="next"><?php previous_posts_link(__('<em>Next</em> Newer Entries','ndesignthemes')) ?></span></p>

	<?php else : ?>

		<h2><?php _e('Not Found','ndesignthemes'); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that isn\'t here','ndesignthemes');?>.</p>

	<?php endif; ?>
	</div>

	<!--/content -->
	<div id="content_bottom"></div>

<?php get_footer(); ?>