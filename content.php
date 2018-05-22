<article id="<?php the_ID() ?>" class="<?php post_class(); ?>">

	<!-- making the link title clickable -->
	 <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">',esc_url(get_permalink()) ),'</a></h1>'); ?>

	

	<!-- setting the time and displaying the category -->
	<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a') ?><?php the_category(); ?></small>

	

	<div class="row">
		
		<?php if ( has_post_thumbnail()) : ?>

			<div class="col-xs-12 col-sm-4">
			 	<!-- setting the thumbnail -->
				<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
			</div>
			<div class="col-xs-12 col-sm-8">
				<!-- getting the content -->
				<p><?php the_content(); ?></p>
			</div>

			<?php else: ?>

			<div class="col-xs-12">
				<!-- getting the content -->
				<?php the_content(); ?>
			</div>

			<?php endif; ?>

	</div>

</article>