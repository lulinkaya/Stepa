<?php 
// функция для извлечения id видео из url ютуба
	function YoutubeCode ($YoutubeCode){
		unset($YoutubeCodeId);
	preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $YoutubeCode, $matches);

	if(isset($matches[2]) && $matches[2] != ''){
	    $YoutubeCodeId = $matches[2];
	    return $YoutubeCodeId;
	};
};
 ?>