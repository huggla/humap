<?php
	function getNodeHtml( $nodeId )
	{
		global $PMFDOM;
		$childNodes=$PMFDOM->getElementById( $nodeId )->childNodes;
		$tmpdom = new DOMDocument;
		foreach ( $childNodes as $childNode )
		{
			$child = $tmpdom->importNode($childNode, true);
			$tmpdom->appendChild($child);
		}
		return trim($tmpdom->saveXML(), '<?xml version="1.0>');
	}
?>