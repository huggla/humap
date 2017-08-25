<?php 
	function domElementAppend( $parentElementId, $childHtmlElementsToAppend )
	{
		global $PMFDOM;
		if ( $parentElementId == 'html' || $parentElementId == 'head' || $parentElementId == 'body' )
		{
			$parentElement = $PMFDOM -> getElementsByTagName( $parentElementId )->item(0);
		}
		else
		{
			$parentElement = $PMFDOM -> getElementById( $parentElementId );
		}
 		foreach ( $childHtmlElementsToAppend as $childElement )
 		{
			foreach ( $childElement['elementAttributes'] as $childElementAttribute )
			{
				if ($childElementAttribute['elementAttributeName'] == 'id')
				{
					$existingElement=$PMFDOM -> getElementById($childElementAttribute['elementAttributeValue']);
					if ($existingElement!=NULL)
					{
						deleteNode($existingElement);
					} 
					break;
				}
			}
			$appendage = $PMFDOM -> createElement( $childElement['elementType'] );	
			$appendage2= $parentElement -> appendChild( $appendage );
			foreach ( $childElement['elementAttributes'] as $childElementAttribute )
			{
				$appendage -> setAttributeNode( new DOMAttr( $childElementAttribute['elementAttributeName'], $childElementAttribute['elementAttributeValue'] ) );
				$appendage2= $parentElement -> appendChild( $appendage );
			}
			$innerHtml=trim($childElement['elementInnerHtml']);
			if (stripos($innerHtml, '<') === 0)
			{
				$sxe = simplexml_load_string('<innerHtml>'.$innerHtml.'</innerHtml>');
				if ($sxe === false)
				{
					echo 'Error while parsing the document';
					exit;
				}
				foreach ($sxe->children() as $innerHtmlRootNode)
				{
					$dom_sxe = dom_import_simplexml($innerHtmlRootNode);
					if (!$dom_sxe)
					{
						echo 'Error while converting XML';
						exit;
					}
					$nodeAppendage= $PMFDOM -> importNode($dom_sxe, true);
					$child=$appendage2 -> appendChild( $nodeAppendage );
					setAllId($child);
				}
			}
			else
			{
				if ($childElement['elementType'] == 'script')
				{
					$cm=$appendage2 ->ownerDocument-> createTextNode("\n//");
					$ct=$appendage2 ->ownerDocument-> createCDATASection("\n" . $childElement['elementInnerHtml'] . "\n//");
					$appendage2 -> appendChild( $cm );
				}
				else
				{
					$ct=$appendage2 ->ownerDocument-> createTextNode($childElement['elementInnerHtml']);
				}
				if ($childElement['elementType'] != 'title')
				{
					$appendage2 -> setIdAttribute ( 'id', 1 );
				}
				$appendage2 -> appendChild( $ct );
			}
 		}
	} // End function domElementAppend
?>