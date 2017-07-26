<?php
/**
* Template Name: Project
*/
/**
 *	NPI WordPress Theme
 *
 */

wp_enqueue_script('JShoverpack', THEMEASSETS.'js/hoverpack.js', array('jquery'));
wp_enqueue_style('CSShoverpack', THEMEASSETS.'css/hoverpack.css', array());
$CTG = null;
$parent_state = array();

get_header();

if(!is_int((int)$_REQUEST['post_id'])) return false;
query_posts(array('post_type' => 'project', 'p' => (int)$_REQUEST['post_id']));

if (have_posts()):
		while (have_posts()) : the_post();
			$ctgs = get_the_terms(get_the_ID(), 'state');
			if (!$ctgs || is_wp_error($ctgs)) {
					$ctgs = array();
			}
		  $ctgs = array_values($ctgs);
			if(empty($ctgs)) break;
			foreach ($ctgs as $key => $value) {
				$parent_state[] = $value->slug;
			}

			//if($ctgs[0]->name != 'Theme') continue;

	?>
		<style type="text/css">
			.page-container{
				display : flex;
			}
			.post-formatting{
				width: 40%;
		    text-align: justify;
		    line-height: 1.9;
		    float: left;
		    padding: 25px 0px;
		    border-right: 1px solid #eee;
		    font-size: 12px;
		    padding-right: 20px;
			}
			div.post-formatting p, div.post-formatting li {
			    font-size: 14px;
			}
			.post-formatting img{
				margin: auto;
				display: block;
			}
			.post-formatting h2, .hoverpack h2{
				font-family: fantasy;
				text-align: center;
				letter-spacing: 4.5px;
			}
			.post-formatting .more{
				padding: 10px 36px;
				background: #fdee20;
				border: 2px solid #ffe43b;
				text-align: center;
				display: table;
				margin: auto;
				position: relative;
				text-decoration: none;
				color: black;
			}
			.post-formatting .more:hover{
				color: darkgoldenrod;
			}
			.page-container .right-post{
		    width: 60%;
		    float: left;
			}
			.page-container .right-post .hoverpack{
				float:left;
				margin-left:20px;
				padding-top: 10px;
			}
			.hoverpack aside p{
				font-family: monospace;
				text-transform: lowercase;
				word-wrap: inherit;
			}
			.other-articles{
				font-family: fantasy;
				text-align: center;
				letter-spacing: 3.5px;
				font-size: 23px;
			}
			@media screen and (max-width:1200px) {
				.page-container .right-post .hoverpack{
					float:none;
				}
			}
			@media screen and (max-width:640px) {
				.page-container{
					display : block;
				}
				.post-formatting{
					border: none;
					padding-right: 0px;
				}
				.post-formatting, .page-container .right-post{
					float: none;
					width:100%;
				}
			}
		</style>
		<div class="container page-container">

			<div class="post-formatting">
					<img src="<?= get_the_post_thumbnail_url(null,array(300, 300)) ?>" alt="<?= the_title() ?>" class="bounce animated" />
					<h2><?= the_title() ?></h2>
					<?= the_content() ?>
					<p><a href="<?= get_the_permalink() ?>" target="_blank" class="more"> Lire plus</a></p>
			</div>
<?php
   endwhile;
endif;

query_posts(array('post_type' => 'project'));

?>
<div class="right-post">
	 <h2 class="other-articles">in this state</h2>
	<?php
$in_state = false;
if (have_posts()):
		while (have_posts()) : the_post();
			if(get_the_ID() == (int)$_REQUEST['post_id']) continue;
			$ctgs = get_the_terms(get_the_ID(), 'state');
			if (!$ctgs || is_wp_error($ctgs)) {
					$ctgs = array();
			}
			$ctgs = array_values($ctgs);
			if(empty($ctgs)) continue;

			foreach ($ctgs as $key => $value) {	# code...
				if(in_array($value->slug, $parent_state)){
					$in_state = true;
					break;
				}
			}


			if(!$in_state) continue;
			$in_state = false;
			$__ = strip_shortcodes(get_the_excerpt());
	    $desc = apply_filters('the_content', $__);
			?>
			<div class="hoverpack">
				<a href="<?= get_the_permalink() ?>" class="b-link-flip b-animate-go">
					<img src="<?= get_the_post_thumbnail_url(null,array(250, 250)) ?>" alt="<?= the_title() ?>" />
					<div class="b-wrapper">
						<h2 class="b-from-left b-animate b-delay04" style="color: #1f1f1e;"><?= the_title(); ?></h2>
						<aside class="b-from-top b-animate b-delay04" style="color: #1f1f1e;"><?= $desc ?></aside>
					</div>
				</a>
			</div>
			<?php
	endwhile;
else:

endif;
	?> </div>
	</div> <?php
get_footer();
