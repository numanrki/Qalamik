<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" onfocus="setEditor(this)" id="s" title="Enter the terms you wish to search for" />
انگریزی<input type="radio" value="English" name="toggle" onclick='setEnglish("s")' title="To Write English in Search Box Click this Radio Button"><font face="Urdu Naskh Asiatype">اردو</font><input type="radio" value="Urdu" checked name="toggle" onclick='setUrdu("s")' title="To Write Urdu in Search Box Click this Radio Button">
<script language="JavaScript" type=text/javascript>
makeUrduEditor("s", 12);
</script>

<input name="t" style="font-family: Urdu Naskh Asiatype, Nafees Web Naskh, Pak Nastaleeq, Arial;" type="submit" id="searchsubmit" value="تلاش" title="Press the Button for Search Result" />
</div>
</form>