<?php

echo $_POST['blogName']."/".$_POST['postID'].".k <br>";
echo $_POST['postID'];
	if (!is_dir("./".$_POST['blogName']."/".$_POST['postID'].".k")){
		mkdir("./".$_POST['blogName']."/".$_POST['postID'].".k", 0777);
	}
	
	$i = 0;
	if (file_exists($_POST['postID']."k/".$i)){
		$i = $i + 1;
	}
	
	$fp = fopen($_POST['postID']."k/".$i,'w');
	
	$comArray = array($_POST['userName'], $_POST['commentType'], $_POST['comment'], date("Y-m-d h:i:s"));
?>