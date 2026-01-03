<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 

<meta name="author" content="M Bilal" />
<meta name="copyright" content="Copyright 2010 M Bilal All rights reserved" />


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" >
<?php wp_head(); ?>


	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/urdu-open-pad.js"></script>
<script type="text/javascript">
initUrduEditor();
</script>

</head>
<body>

<div id="main-container">

<div id="topbar-all">

	<ul id="topbar">
			<?php $pages = wp_list_pages('title_li=&echo=0');
			print_r($pages);
			?>
		  <li class="page_item"><a href="<?php echo get_settings('home'); ?>/" title="Home">صفحہ اول</a></li>
	</ul>
	<div id="search">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		</form>

</div>


  <div id="header">
    <div id="headerimg">
	<div class="title"><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></div>
	  <div class="description"><?php bloginfo('description'); ?></div>
	</div>
  </div>



