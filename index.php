<?php    $title = get_post_meta($post->ID, 'title', $single = true);    $description = get_post_meta($post->ID, 'description', $single = true);    $keywords = get_post_meta($post->ID, 'keywords', $single = true);    $my_title_home = "L'avis numérique de br1o";    $my_single_cat = "Tous les articles appartenant à la rubrique";    $my_single_tag = "Tous les articles partageant le tag";    $my_desc = "Avec brio -- L'actualité du web, de la blogosphère, une pointe de web 2.0 et plein d'autres choses (mais surtout beaucoup de recul)";?><!DOCTYPE html><html lang="fr"><head><meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /><meta content="Alamano - 1.0" name="generator"/><?php if ( is_home() ) { ?>    <title><?php echo $my_title_home; ?></title><?php } else if ( is_single() ) { ?>    <title><?php if($title !== '') { echo $title; } else { the_title(); } ?></title><?php } else if ( is_category() ) { ?>    <title><?php echo $my_single_cat . ' '; single_cat_title(); ?></title><?php } else if ( is_tag() ) { ?>    <title><?php echo $my_single_tag . ' '; single_tag_title(); ?></title><?php } else { ?>    <title><?php echo $my_desc; ?></title><?php } ?><?php if ( is_home() ) { ?>    <meta name="description" content="<?php echo $my_desc; ?>" /><?php } else { ?>    <meta name="description" content="<?php if ($description !== '') { echo $description; } else if ( $post->post_excerpt !== '') { echo strip_tags( $post->post_excerpt); } else { echo wp_html_excerpt($post->post_content, 200); } ?>" /><?php } ?><link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png" /><!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" /><![endif]--><link rel="stylesheet" href="style.css" type="text/css" media="screen, projection"/><link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" /><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" /><!--[if lt IE 8]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen, projection"/><![endif]--><!--script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/column.js"></script--><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?><?php wp_head(); ?><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-514927-12']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);  })();</script><script>    if(window.addEventListener){var kkeys=[],konami="38,38,40,40,37,39,37,39,66,65";window.addEventListener("keydown",function(e){kkeys.push(e.keyCode);if(kkeys.toString().indexOf(konami)>=0){alert('ALL YOU BAISE ARE BELONG TO US');window.location="http://www.youtube.com/watch?v=lJuKoPaSpOU";}},true);}</script><script src="http://platform.twitter.com/anywhere.js?id=6cnyMU1Tj8xA4ajmcnpHPg&amp;v=1">  </script>  <script type="text/javascript">     twttr.anywhere(function(twitter) {              twitter.hovercards();     });  </script></head><body><div id="page" class="container">    <div id="header" class="clearfix">        <div id="brand" class="clearfix">            <div id="logo">		<a href="<?php echo get_option('home'); ?>/">                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="" />		</a>	    </div>            <h1 class="prepend-4 span-9 last"><a title="" href="<?php echo get_option('home'); ?>/"><?php echo get_bloginfo ( 'title' ); ?></a></h1>            <div id="description" class="prepend-4 span-7 append-1"><?php echo get_bloginfo ( 'description' ); ?></div>            <div id="publicite" class="span-4 last">             <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header') ) : ?>            <?php endif; ?>            </div>        </div>        <div id="nav-pages">            <ul>               <?php wp_list_pages('title_li='); ?>                <li><a href="http://br1o.fr/feed/">Flux RSS</a></li>                <li><a href="http://twitter.com/br1o">Mon Twitter</a></li>            </ul>        </div>    </div>    <div id="content" class="prepend-4 span-8">        <?php if (have_posts()) : ?>            <?php while (have_posts()) : the_post(); ?>                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">                    <p class="date-parution"><small><?php the_time('d/m/y') ?> <!-- par <?php the_author() ?> --></small></p>                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Lien permanent vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>                    <div class="entry">                        <?php the_content('Lire le reste de cet article &raquo;'); ?>                    </div>                    <p class="small postmetadata"><?php comments_popup_link('Aucun commentaire »', '1 commentaire »', '% commentaires »', 'comments-link', 'Les commentaires sont fermés'); ?> | <?php the_tags('Tags&nbsp;: ', ', ', ' '); ?> | <?php the_category(', ') ?> <?php edit_post_link('Modifier', '', ' | '); ?></p>		<?php //bawas_get_permalink(); ?>                </div>            <?php endwhile; ?>            <div class="navigation">                <div class="alignleft left"><?php next_posts_link('&laquo; Articles plus anciens') ?></div>                <div class="alignright right"><?php previous_posts_link('Articles plus récents &raquo;') ?></div>            </div>        <?php comments_template(); ?>        <?php else : ?>            <h2 class="center">Introuvable</h2>            <p class="center">Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici.</p>            <?php get_search_form(); ?>        <?php endif; ?>    </div>    <div id="sidebar" class="span-4 last">        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1') ) : ?>            <h2>Catégories</h2>            <ul><?php wp_list_categories('title_li='); ?></ul>        <?php endif; ?>        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?>        <?php endif; ?>				 <?php if ( is_front_page() ) : ?>			<ul>				<li><a href="http://www.webhostinghub.com/wordpress-hosting.html">WordPress Web Site Host</a><!-- // jusqu'au 15/10/2012 \\ --></li>			</ul>		 		 <?php endif; ?>		    </div>    <div id="footer" class="clear">        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>        <?php endif; ?>    </div></div><?php wp_footer(); ?><!-- <?php printf(__('%d queries. %s seconds.', '_942'), get_num_queries(), timer_stop(0, 3)); ?> --></body></html>