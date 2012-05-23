<?php
/**
 * @package WordPress
 * @subpackage _942
 */

// Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', '_942'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<div id="commentaires">
	
	<?php if ( have_comments() ) : ?>
		<h2 id="comments" class="widgettitle roundies"><?php comments_number(__('Pas de commentaires', '_942'), __('Un commentaire', '_942'), __('% commentaires', '_942'));?> <?php printf(__('pour &#8220;%s&#8221;', '_942'), the_title('', '', false)); ?></h2>
	
		<div class="nav wrapper">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	
		<ol class="commentlist wrapper">
		<?php wp_list_comments();?>
		</ol>
	
		<div class="nav wrapper">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	 <?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><?php _e('Les commentaires sont ferm&eacute;s.', '_942'); ?></p>
	
		<?php endif; ?>
	<?php endif; ?>
	
	
	<?php if ( comments_open() ) : ?>
	
	<div id="respond">
	
    <h2 class="widgettitle"><?php comment_form_title( __('Laissez un commentaire', '_942'), __('Laissez un commentaire pour %s' , '_942') ); ?></h2>
	
	<div id="cancel-comment-reply"> 
		<small><?php cancel_comment_reply_link() ?></small>
	</div> 
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf(__('Vous devez &ecirc;tre <a href="%s">connect&eacute;</a> pour laisser un commentaire.', '_942'), wp_login_url( get_permalink() )); ?></p>
	<?php else : ?>
	
	<form class="hform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
	<?php if ( is_user_logged_in() ) : ?>
	
	<p><?php printf(__('Connect&eacute; en tant que <a href="%1$s">%2$s</a>.', '_942'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('D&eacute;connectez-vous', '_942'); ?>"><?php _e('D&eacute;connexion &raquo;', '_942'); ?></a></p>
	
	<?php else : ?>
	
	<p class="wrapper">
		<label class="form-label" for="author"><?php _e('Votre nom', '_942'); ?> <?php if ($req) _e("(*)", "_942"); ?></label>
		<input class="form-input" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>
	
	<p class="wrapper">
		<label class="form-label" for="email"><?php _e('Votre email', '_942'); ?> <?php if ($req) _e("(*)", "_942"); ?></label>
		<input class="form-input" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>
	
	<p class="wrapper">
		<label class="form-label" for="url"><?php _e('Pr&eacute;sence en ligne', '_942'); ?></label>
		<input class="form-input" type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
	</p>
	
	<?php endif; ?>
	
	<p><small><?php printf(__('Vous pouvez utiliser les balises HTML suivantes : <tt>%s</tt>', '_942'), allowed_tags()); ?></small></p>
	
	<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
	
	<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Publiez le commentaire', '_942'); ?>" />
	<?php comment_id_fields(); ?> 
	</p>
	<?php do_action('comment_form', $post->ID); ?>
	
	<p><small>Les commentaires sont publi&eacute;s sous votre pleine et enti&egrave;re responsabilit&eacute; et ne doivent pas contrevenir aux lois et r&egrave;glementations en vigueur. Les propos racistes ou antis&eacute;mites, diffamatoire ou injurieux, divulguant des informations fausses, relatives &agrave; la vie priv&eacute;e d'une personne ou utilisant des oeuvres prot&eacute;g&eacute;es par les droits d'auteurs ne sont pas les bienvenus et seront mod&eacute;r&eacute;s sans mod&eacute;ration.</small></p>
	<p><small>Merci d'&ecirc;tre constructif et n'oubliez pas : &laquo; sans la libert&eacute; de ramer il n'est point d'&eacute;loge flotteur ! &raquo;</small></p>
	</form>
	
	<?php endif; // If registration required and not logged in ?>
	</div>
	
	<?php endif; // if you delete this the sky will fall on your head ?>
	
	</div>
	<!-- END section id="commentaires"-->
