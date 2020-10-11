<?php
/**
* Helper Format class
*/
class Format{

	// date formating
	public function dateFormat($date){
		return date('F j, Y, g:i a', strtotime($date));
	}

	// post body text shorten
	public function postBodyShorten($text, $limit = 400){
		$text = $text. " " ;
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text, ' '));
		$text = $text."..... " ;
		return $text;
	}

	// validation
	public function validation($data){
		// trim() removes white spaces from string . before and after
		// stripslashes() removes \ backslash from string .
		// htmlspecialchars() removes special characters like <, >, &, '', "",  from string . and returns html entity like &amp , &lt, &gt;
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// get pages name to show in title bar // index page and contact page
	public function getTitle(){
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path,'.php');
		$title = str_replace("_", " ", $title);
		if($title == 'index'){
			$title = 'home';
		}
		else if($title == 'contact'){
			$title = 'contact';
		}

		return $title = ucwords($title);
	}

}



?>