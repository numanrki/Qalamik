<?php
/**
 * The template for displaying comments
 *
 * @package Qalamik
 */

if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number( 'کوئی تبصرہ نہیں', '1 تبصرہ', '% تبصرے' ); ?> برائے تحریر &#8221;<?php the_title(); ?>&#8220;</h3> 

	<ol class="commentlist">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'avatar_size' => 45,
			'callback'    => 'qalamik_comment',
		) );
		?>
	</ol>

	<?php
	// Pagination for comments if there are more than per page
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link( 'پچھلے تبصرے' ); ?></div>
			<div class="alignright"><?php next_comments_link( 'اگلے تبصرے' ); ?></div>
		</div>
	<?php endif; ?>

<?php else : ?>
	<?php if ( comments_open() ) : ?>
		<!-- Comments are open, but there are no comments. -->
	<?php else : ?>
		<p class="nocomments">اس تحریر پر تبصرے بند ہیں.</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">اپنا تبصرہ یہاں تحریر کریں</h3>

<?php if ( get_option('comment_registration') && ! is_user_logged_in() ) : ?>
<p>تبصرہ کرنے کیلیے آپکا  <a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>">داخل </a>ہونا ضروری ہے.</p>
<?php else : ?>

<form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform">

<?php $user_ID = get_current_user_id(); ?>
<?php if ( $user_ID ) : ?>

<p>آپ موجود ہیں بحیثیت <a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>"><?php echo esc_html( wp_get_current_user()->display_name ); ?></a>. <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" title="Log out of this account">خروج &raquo;</a></p>

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
