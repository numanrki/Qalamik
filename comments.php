<?php 
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { 
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  
				?>

				<p class="nocomments">یہ تحریر کلمہ شناخت(پاس ورڈ) کے زریعے محفوظ کی گئی ہے، پڑھنے کیلیے کلمہ شناخت داخل کریں۔<p>

				<?php
				return;
            }
        }

		
		$oddcomment = 'alt';
?>



<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('کوئی تبصرہ نہیں', '1 تبصرہ', '% تبصرے' );?> برائے تحریر &#8221;<?php the_title(); ?>&#8220;</h3> 

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		
		<div class="comment-main">
		
		<div class="avatar" title="Avatar of Comment's Author">
			<?php echo get_avatar( $comment, 45 ); ?>
		</div>
		
		<div class="name-and-date">
			<cite title="Author of this Comment"><?php comment_author_link() ?></cite> نے لکھا:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>آپکا تبصرہ نظر ثانی کے مراحل میں ہے.</em>
			<?php endif; ?>
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="Date and Time of Comment, Permanent Link of Comment"><?php comment_date('l، d F  Y') ?> بوقت <?php comment_time() ?></a> <?php edit_comment_link('ت','',''); ?></small>
		</div>	
			
		</div>
					
			<?php comment_text() ?>
			

		</li>

	<?php 
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach;  ?>

	</ol>

 <?php else :  ?>

  <?php if ('open' == $post->comment_status) : ?> 
		

	 <?php else :  ?>
		
		<p class="nocomments">اس تحریر پر تبصرے بند ہیں.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">اپنا تبصرہ یہاں تحریر کریں</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>تبصرہ کرنے کیلیے آپکا  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">داخل </a>ہونا ضروری ہے.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>آپ موجود ہیں بحیثیت <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">خروج &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" onfocus="setEditor(this)" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" title="Enter Your Name Here, Its Required" />
<label for="author">نام <?php if ($req) echo "(درکار)"; ?></label></p>
<p>انگریزی<input type="radio" value="English" name="toggle" onclick='setEnglish("author")' title="To Write English in Name Box Click this Radio Button">اردو<input type="radio" value="Urdu" checked name="toggle" onclick='setUrdu("author")' title="To Write Urdu in Name Box Click this Radio Button">


<script language="JavaScript" type=text/javascript>
	makeUrduEditor("author", 12);
</script></p>


<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" title="Enter Your E-Mail Here, Its Required but not Publish" />
<label for="email">ای - میل (شائع نہیں کیا جائیگا) <?php if ($req) echo "(درکار)"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" title="Enter Your Website or Blog Address Here" />
<label for="url">ویب سائٹ/بلاگ کا پتہ</label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" title="Enter Your Comment(s) Here" ></textarea></p>

	
<p><input name="submit" type="submit" id="submit" tabindex="5" title="Send Comment" value="تبصرہ بھیجیں" />
<br>
<?php print('<br /><br /><script type="text/javascript">insertToggleControl("comment");writeKeyboard();makeUrduEditor("comment", "14px")</script>'."\n"); ?>




<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif;  ?>

<?php endif;  ?>
