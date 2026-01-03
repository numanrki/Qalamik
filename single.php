<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="main-content">

	<div id="content">
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
    <div class="post" id="post-<?php the_ID(); ?>">
        <center><h5><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> Permanent Link: "><?php the_title(); ?></a></h5></center>
		<div class="post-calendar"><?php if (get_the_author_url()) { ?><a href="<?php the_author_url(); ?>"><?php the_author(); ?></a><?php } else { the_author(); } ?> نے  <?php the_time('l، j F Y') ?> کو شائع کیا.</div>
		
		<div class="post-content">
		<?php the_content('<p class="serif">جاری رکھیے۔۔۔ &raquo;</p>'); ?>
		
		<?php wp_link_pages( array(
			'before' => '<p><strong>صفحات:</strong> ',
			'after'  => '</p>',
			'link_before' => '',
			'link_after'  => '',
		) ); ?>
		
		<?php edit_post_link('ترمیم<br>', '', ''); ?>
		
		<p>
		<div class="post-info">
		<span class="post-cat"><?php the_category('، ') ?></span>
		<span class="post-rss"><?php post_comments_feed_link('اس تحریر کا آر ایس ایس'); ?></span>
		</div>
		</p>

<br>
<p>		
     <div id="social-all">
		<div class="navbar">
			<div id="social">
				<ul>          
					<li class="facebook"><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>">فیس بک</a></li>
					<li class="twitter"><a target="_blank" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>">ٹویٹر</a></li>
					<li class="gbuzz"><a target="_blank" href="http://www.google.com/reader/link?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&srcURL=<?php bloginfo('url'); ?>">گوگل بز</a></li>
					<li class="technorati"><a target="_blank" href="http://technorati.com/faves?add=<?php the_permalink(); ?>">ٹیکنوراٹی</a></li>
					<li class="digg"><a target="_blank" href="http://digg.com/submit?phase=2&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>">ڈگ</a></li>
					<li class="delicious"><a target="_blank" href="http://delicious.com/post?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>">ڈیلیشیئس</a></li>
				</ul>		
			</div>
		</div>
	</div>
</p>
		
		</div>
			
<div id="tag">ٹیگز:- 
<?php the_tags(' ' , ' , ' , ' '); ?>
	</div>	

	


											
		<?php comments_template(); ?>
		
			<?php endwhile; else: ?>

		<p>معاف کیجیے، آپ کی مطلوبہ تحریر موجود نہیں.</p>

<?php endif; ?>

	</div>


	
	
	
  </div>
  
	
<?php include("left-sidebar.php");?>
 
</div>

 
<?php get_footer(); ?>

