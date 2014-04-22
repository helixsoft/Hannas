<?php
/**
 * The template for displaying Comments
 */
 ?>
 <?php
 // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
    <div class="comments clearfix">
		<div class="comment-count"><?php comments_number(__('No Comments'), __('One Comment'), __('% Comments'));?></div>
		<div class="toggle-comment"><span>SHOW</span> COMMENTS</div>
	</div>
	<div class="comment-area clearfix">
		<?php wp_list_comments(array('avatar_size' => '55', 'callback' => 'hannas_comments'  )); ?>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">


<?php if ( is_user_logged_in() ) : ?>

<div class="login"><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></div>

<?php endif; ?>


<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>
<div class="comment-form-area">
	<div class="comment-text">YOUR COMMENT</div>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<?php else : ?>
			<input type="text" name="author" placeholder="NAME">
			<input type="email" name="email" placeholder="EMAIL">
			<input type="text" name="url" placeholder="WEBSITE">

<?php endif; ?>
<textarea name="comment" placeholder="YOUR COMMENT"></textarea>
			<input type="submit" value="SUBMIT"> 
<?php comment_id_fields(); ?> 
<?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If registration required and not logged in ?>
	</div>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
 <!--<div class="comments clearfix">
	<div class="comment-count">8 COMMENTS</div>
	<div class="toggle-comment"><span>SHOW</span> COMMENTS</div>
</div>
<div class="comment-area clearfix">
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
	<div class="comment-item">
		<div class="comment-item-left-part">
			<div class="comment-info">NAME<br/><span>liza</span></div>
			<div class="comment-info">DATE<br/><span>2013-09-11</span></div>
			<div class="comment-info">TIME<br/><span>19:28</span></div>
		</div>
		<div class="comment-item-right-part">
			<p>LOVE YOUR BLOG! It’s amazing. So many great inspirational tips.<br/><br/><br/>Thanks!!!</p>
		</div>
	</div>
</div>
<div class="comment-form-area">
		<div class="comment-text">YOUR COMMENT</div>
		<form>
			<input type="text" name="name" placeholder="NAME">
			<input type="email" name="email" placeholder="EMAIL">
			<input type="text" name="website" placeholder="WEBSITE">
			<textarea name="message" placeholder="YOUR COMMENT"></textarea>
			<input type="submit" value="SUBMIT"> 
		</form>
</div>-->