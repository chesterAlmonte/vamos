<?php get_header(); ?>

<div class="row">
		

		<!-- Start of carousel -->

		<div id="dipsheet-carousel" class="carousel slide" data-ride="carousel">

		  <div class="carousel-inner">

			  	<?php 
				
					$args_cat = array(
						'include' => '7, 8, 9'
					);
					
					$categories = get_categories($args_cat);
					$count = 0;
					$bullets = 0;
					foreach($categories as $category):
						
						$args = array( 
							'type' => 'post',
							'posts_per_page' => 1,
							'category__in' => $category->term_id,
							'category__not_in' => array( 10 ),
						);
						
						$lastBlog = new WP_Query( $args );
						
						if( $lastBlog->have_posts() ):

							

							while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
								
							<div class="carousel-item <?php if($count == 0): echo 'active'; endif; ?>">

		     				 <?php the_post_thumbnail('full'); ?>

		    				</div>

		    				<?php $bullets .= '<li data-target="#dipsheet-carousel" data-slide-to="'.$count.'" class="'; ?>

		    				<?php if($count == 0): $bullets .= 'active'; endif; ?>

		    				<?php $bullets .= '"></li>'; ?>
							
							<?php endwhile;
							
						endif;
						
						wp_reset_postdata();
						
						$count++;

					endforeach;
			
				?>

		   
		  </div>

		  <a class="carousel-control-prev" href="#dipsheet-carousel" role="button" data-slide="prev">

		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

		    <span class="sr-only">Previous</span>

		  </a>

		  <a class="carousel-control-next" href="#dipsheet-carousel" role="button" data-slide="next">

		    <span class="carousel-control-next-icon" aria-hidden="true"></span>

		    <span class="sr-only">Next</span>
		  </a>

		</div>

		<!-- end of carousel -->
		
</div>

<div class="row">
	
	<div class="col-xs-12 col-sm-8">

		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('content',get_post_format()); ?>
			
			<?php endwhile;
			
		endif;
		
		//PRINT OTHER 2 POSTS NOT THE FIRST ONE
/*
		$args = array(
			'type' => 'post',
			'posts_per_page' => 2,
			'offset' => 1,
		);
		
		$lastBlog = new WP_Query($args);
			
		if( $lastBlog->have_posts() ):
			
			while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
				
				<?php get_template_part('content',get_post_format()); ?>
			
			<?php endwhile;
			
		endif;
		
		wp_reset_postdata();
*/
				
		?>
		
		<!-- <hr> -->
		
		<?php
			
		//PRINT ONLY TUTORIALS
/*
		$lastBlog = new WP_Query('type=post&posts_per_page=-1&category_name=news');
			
		if( $lastBlog->have_posts() ):
			
			while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
				
				<?php get_template_part('content',get_post_format()); ?>
			
			<?php endwhile;
			
		endif;
		
		wp_reset_postdata();
*/
				
		?>
	
	</div>
	
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
	
</div>

<?php get_footer(); ?>