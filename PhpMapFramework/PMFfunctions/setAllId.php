<?php
	function setAllId($DOMNode)
	{
  		if($DOMNode->hasChildNodes())
		{
			foreach ($DOMNode->childNodes as $DOMElement)
			{
				if($DOMElement->hasAttributes())
				{
        				$id=$DOMElement->getAttribute("id");
        				if($id)
					{
						$DOMElement->setIdAttribute("id",$id);
					}
				}
				setAllId($DOMElement);
			}
		}
	}
?>