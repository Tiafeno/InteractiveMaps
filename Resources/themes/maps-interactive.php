<?php
/**
* Template Name: Maps Interactive
*/
/**
 *	NPI WordPress Theme
 *
 */

get_header('maps'); 

// Start the loop.
while ( have_posts() ) : the_post();

	the_content();

// End the loop.
endwhile;



wp_footer();
?>

</body>
</html>