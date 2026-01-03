<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="main-content">

	<div id="content">
	
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">  
	<center><h5><?php the_title(); ?></h5></center>
	<div class="post-calendar"><?php if (get_the_author_url()) { ?><a href="<?php the_author_url(); ?>"><?php the_author(); ?></a><?php } else { the_author(); } ?> نے  <?php the_time('l، j F Y') ?> کو شائع کیا.</div>	
	
	<div class="post-content">	
	<?php the_content('جاری رکھیے۔۔۔ &raquo;'); ?>
	
	<?php edit_post_link('ترمیم<br>', '', ''); ?>

		<p>
		<div class="post-info">
		<span class="post-rss"><?php post_comments_feed_link('اس تحریر کا آر ایس ایس'); ?></span>
		</div>
		<br>
		</p>
	
	</div>

<div id="tag">ٹیگز:- 
<?php the_tags(' ' , ' , ' , ' '); ?>
	</div>		
			
	<?php comments_template(); ?>		
	<?php endwhile; else: ?>
	<p>معاف کیجیے، آپ کی مطلوبہ تحریر موجود نہیں.</p><?php endif; ?>	
	</div>		
	</div>
	
<?php include("left-sidebar.php");?>
 
</div>

<?php get_footer(); ?>