<div id="sidebar">
<ul>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
  
   
	
    <li>  
    <h2 class="sidebartitle"><?php esc_html_e( 'زمرہ جات', 'qalamik' ); ?></h2>
	<ul class="list-cat">   
	<?php wp_list_categories( array(
		'title_li'     => '',
		'show_count'   => 1,
		'hierarchical' => 0,
	) ); ?>
	</ul> 
	</li>	
	
<br>	
	
	<li>  
    <h2 class="sidebartitle"><?php esc_html_e( 'تازہ ترین تحاریر', 'qalamik' ); ?></h2>
	<ul class="list-page">  
		<div class="rec-post">
	<?php wp_get_archives( array(
		'type'  => 'postbypost',
		'limit' => 5,
	) ); ?>
		</div>
	</ul> 
	</li>	
	
    <li>	
	<ul class="linkcat">	
	<?php wp_list_bookmarks( array(
		'category_before' => '',
		'category_after'  => '',
		'title_before'    => '<center><br><h2>',
		'title_after'     => '</h2></center>',
	) ); ?>
	</ul>
    </li>
	
<br>	
     <li>    
	<center><h2 class="sidebartitle"><?php esc_html_e( 'محفوظات', 'qalamik' ); ?></h2> 
	
<br>
	<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
	<option value=""><?php echo esc_attr( __( 'Select Month', 'qalamik' ) ); ?></option> 
	<?php wp_get_archives( array(
		'type'            => 'monthly',
		'format'          => 'option',
		'show_post_count' => 0,
	) ); ?> </select>
<br><br>	  
		<ul>
		<?php get_calendar(2); ?>
		</ul>	
		
	</center>  
	</li>
	
  <?php endif; ?>
 </ul>
 
 
</div>

