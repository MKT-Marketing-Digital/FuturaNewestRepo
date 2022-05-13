<?php

	$targetFolder = '/home/futura/storage/app/public';


	$linkFolder = '/home/futura/public_html/storage';

	symlink($targetFolder,$linkFolder);
	
	echo 'Symlink process successfully completed from <strong>'.$targetFolder.' </strong> to <strong>'.$linkFolder.'</strong>';

