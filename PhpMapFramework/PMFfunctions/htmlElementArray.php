<?php 
	function htmlElementArray( $type, $attributes, $code )
	{
		$htmlElement[0]['elementType'] = $type;
		$htmlElement[0]['elementInnerHtml'] = $code;
		$i = 0;
		foreach ($attributes as $attribute)
		{
			$attribute = explode("=", $attribute);
			$htmlElement[0]['elementAttributes'][$i]['elementAttributeName'] = $attribute[0];
			$htmlElement[0]['elementAttributes'][$i]['elementAttributeValue'] = $attribute[1];
			$i++;
		}
		return $htmlElement;
	} // End function htmlElementArray
?>