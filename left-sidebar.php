<div id="sidebar-left">

<ul>
 <li>  
    <h2 class="sidebartitle"><?php _e('ضروری روابط'); ?></h2>
	<ul class="list-cat">   
	<li><a target="_blank" href="http://www.mbilalm.com/download/urdu-and-computer.php" title="For Download (Urdu and Computer) Booklet Click Here">اردو اور کمپیوٹر (کتابچہ)</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/download/urdu-and-blog.php" title="For Download (Urdu and Blog) Book Click Here">اردو اور بلاگ (کتاب)</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/blog/urdu-important-points-and-faqs/" title="Read FAQs for Urdu Computing Click Here">اردو کمپیوٹنگ عمومی سوالات</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/blog/install-urdu-in-win-7/" title="Read How to Install Urdu in Windows Seven (7) Click Here">ونڈوز 7 میں اردو کی انسٹالیشن</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/blog/install-urdu-in-xp/" title="Read How to Install Urdu in Windows XP Click Here">XP میں اردو کی انسٹالیشن</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/blog/urdu-typing-rules/" title="Read Typing Rules of Urdu Click Here">کمپیوٹر پر اردو لکھنے کے اصول</a></li>	
	<li><a target="_blank" href="http://www.mbilalm.com/download/urdu-paksign-keyboard.php" title="For Download Urdu Keyboard Layout Click Here">اردو کی بورڈ لے آؤٹ</a></li>
	<li><a target="_blank" href="http://www.mbilalm.com/download/urdu-font-2.php" title="For Download Unicode Urdu Fonts Click Here">اردو کے ضروری فونٹس</a></li>
	<li><a target="_blank" href="http://www.mozilla.com/" title="For Download Mozilla Firefox Browser Click Here">موزیلا فائر فاکس براؤزر</a></li>
	</ul> 
	</li>
	
	
<br>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>	
  	
    <li>  
    <h2 class="sidebartitle"><?php _e('تازہ ترین تبصرے'); ?></h2>
	<ul class="recent-comments">   
	<div class="rec-com">
	<?php mw_recent_comments(12, false, 100, 100, 35, 'all', '<li><a href="%permalink%" title="%title%">%author_name%&raquo; %title%</a></li>',''); ?>
	</div>
	</ul> 
	</li>	
	
  <?php endif; ?>
</ul>

  <br>





  

 
 
</div>


