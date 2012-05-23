<?php
// Zones widgétisables du thème
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'header',
'before_widget' => '<div id="%1$s" class="widget-header widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
register_sidebar(array('name'=>'sidebar1',
'before_widget' => '<div id="%1$s" class="widget-sidebar1 widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
register_sidebar(array('name'=>'sidebar2',
'before_widget' => '<div id="%1$s" class="widget-sidebar2 widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
register_sidebar(array('name'=>'footer',
'before_widget' => '<div id="%1$s" class="widget-footer widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
register_sidebar(array('name'=>'commentaires',
'before_widget' => '<div id="%1$s" class="widget-commentaires widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
?>
<?php
function my_search(){
?>
<div id="recherche">
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<div>
			<input type="text" class="text" value="<?php the_search_query(); ?>" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="OK" />
		</div>
	</form>
</div>
<?php
}
?>
<?php
if ( function_exists('my_search') ) {
    register_sidebar_widget('search', 'my_search');
}
?>