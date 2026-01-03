<?php get_header();?>
<?php get_sidebar(); ?>

<div id="main-content">

	<div id="content">
	
	
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; ?>
    
    <?php if (is_category()) { ?>				
		<h6 class="pagetitle">محفوظات برائے &#8221;<?php echo single_cat_title(); ?>&#8220; زمرہ</h6>
		
 	  <?php } elseif (is_day()) { ?>
		<h6 class="pagetitle">محفوظات برائے <?php the_time('jS F Y'); ?> ء</h6>
		
	 <?php } elseif (is_month()) { ?>
		<h6 class="pagetitle">محفوظات برائے <?php the_time('F Y'); ?> ء</h6>

		<?php } elseif (is_year()) { ?>
		<h6 class="pagetitle">محفوظات برائے <?php the_time('Y'); ?> ء</h6>
		
	  <?php } elseif (is_search()) { ?>
		<h6 class="pagetitle">تلاش کے نتائج</h6>
		
	  <?php } elseif (is_author()) { ?>
		<h6 class="pagetitle">محفوظات بالحاظ مصنف</h6>

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h6 class="pagetitle">تمام محفوظات</h6>

		<?php } ?>
		

		
		<?php while (have_posts()) : the_post(); ?>
		
		
	<div class="post" id="post-<?php the_ID(); ?>">
				<div class="posttitle">
					<center><h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> Permanent Link: "><?php the_title(); ?></a></h5></center>
					<div class="post-calendar"><?php if ( get_the_author_meta( 'url' ) ) { ?><a href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>"><?php the_author(); ?></a><?php } else { the_author(); } ?> نے  <?php the_time('l، j F Y') ?> کو شائع کیا.</div>
				</div>
				
				<div class="post-content">
					<?php if(get_post_meta($post->ID, "Thumbnail", true)) { ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo get_post_meta($post->ID, "Thumbnail", true); ?>" class="alignleft" /></a>
					<?php } ?>
							
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> Permanent Link: ">مکمل تحریر پڑھیے &#187;</a></p>
				
				<p>
				<div class="post-info">
				<span class="post-cat"><?php the_category('، ') ?></span>
				<span class="post-comments"><?php comments_popup_link('تبصرہ کریں &#187;', '1 تبصرہ &#187;', '% تبصرے &#187;'); ?></span>
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
				
						
	</div>
		




	<?php endwhile; ?>
	
	
		<div class="navigation">
			<span class="previous-entries"><?php next_posts_link('اگلا صفحہ') ?></span> <span class="next-entries"><?php previous_posts_link('پچھلا صفحہ') ?></span>
		</div>

	
  <?php else : ?>
  	<h3>معاف کجیے، کچھ نہیں ملا.</h3>
    <?php endif; ?>
	</div>
	
<?php include("left-sidebar.php");?>	
	
  </div>
  

<?php get_footer(); ?>