<?php 
	function initDom()
	{
		$dom = new DOMDocument('1.0', 'utf-8');
		$html =
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">'.
		'<html>'.
			'<head>'.
			'</head>'.
			'<body>'.
			'</body>'.
		'</html>';
		$dom -> loadHTML( $html );
		return $dom;
	} // End function initDom
?>