<?php
/*
Plugin Name: Expand Links
Description: Takes shortened URLs and gives you the end URL back
Version: 1.0
*/

if (!function_exists('tp_convert_links')) {
	function unshorten_url($url) {
	/*
		echo "<pre>";
		print_r($url);
		echo "</pre>";
	*/
		$init_url = $url;
		$response = file_get_contents("http://expandurl.appspot.com/expand?url=".urlencode($url[0]));
		$response = json_decode($response);
		
		if ($response->status === 'OK') {
			$response = $response->end_url;
			$response = substr($response, 0, 36) . "…";
			$response = "<a href=$response target=\"_blank\">$response</a>";
		}else{
			$response = "<a href=$init_url target=\"_blank\">$init_url</a>";
		}
		return $response;
	}
	
	function tp_convert_links($status,$targetBlank=true,$linkMaxLen=250){
		// the target
		$target=$targetBlank ? " target=\"_blank\" " : "";
		 
		// convert link to url								
		$status = preg_replace_callback('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/i', 'unshorten_url', $status);
		 
		// convert @ to follow
		$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
		 
		// convert # to search
		$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
		 
		// return the status
		return $status;
	}
}

?>

