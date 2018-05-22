<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>Dipsheet</title>
	<?php wp_head(); ?>
</head> 

<!-- function to check if user is on homepage -->
<?php 

if( is_front_page() ):

$awesome_classes = array( 'awesome-class', 'my-class');

else:

$awesome_classes = array( 'no-awesome-class' );

endif; 



?>

<!-- Register and state the class -->
<body <?php body_class($awesome_classes); ?>>

	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	  <a class="navbar-brand" href="#">DipSheet</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">

	  	<ul class=" navbar-nav mr-auto">
	      <li>
	         <?php wp_nav_menu(array(

				  	'theme_location' => 'primary',

				  	'container' => false,

				  	'menu_class' => 'navbar-nav mr-auto',
				  	'walker' => new Walker_Nav_Primary()
				  )
				  
			); ?>
	      </li>
	      <li>
	      		<div class="col-xs-12">
					<div class="search-form-container">
						<?php get_search_form(); ?>
					</div>
				</div>
	      </li>
	    </ul>

	  </div>
	</nav>


	
	<div class="container">


		