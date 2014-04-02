<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>

<?php if(comments_open()) : ?>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentformid" style="padding-top:9px;">
			<?php if($user_ID) : ?>
				<p style="padding-bottom:10px;">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
			<?php else : ?>
				<p><input type="text" style="width:175px" class="inputcomments" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author" style="font-size:14px;"><small>Name <?php if($req) echo "(required)"; ?></small></label></p>
				<p style="padding-top:9px;"><input type="text" style="width:175px" class="inputcomments" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email" style="font-size:14px;"><small>Email (will not be published) <?php if($req) echo "(required)"; ?></small></label></p>
				<p style="padding-top:9px;"><input type="text" style="width:175px" class="inputcomments" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url" style="font-size:14px;"><small>Website</small></label></p>
			<?php endif; ?>
			<p style="padding-top:9px;"><textarea name="comment" class="inputcomments" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
			<p style="padding-top:15px;padding-bottom:15px;"><input class="button gray" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; ?>
<?php else : ?>
	<p>The comments are closed.</p>
<?php endif; ?>

<?php if($comments) : ?>
  	<ol>
		<?php wp_list_comments('type=comment&callback=optimizepress_comment'); ?>
	</ol>
<div class="pagination">
	<?php paginate_comments_links(); ?>
</div>    
<?php else : ?>
	<p>No comments yet</p>
<?php endif; ?>

