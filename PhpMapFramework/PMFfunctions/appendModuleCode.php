<?php 
	function appendModuleCode( $moduleName )
	{
		$codePath=PMFMODULESPATH."/$moduleName/code";
		foreach ( glob( "$codePath/*" ) as $parentPath )
                {
			$parentId = substr( basename($parentPath), 4 );
                	foreach ( glob( "$parentPath/*" ) as $childPath )
                	{
				$childBasename = basename($childPath);
				$childNr = substr($childBasename, 0, 3);
				$childDelimiter = stripos($childBasename, '?');
				if ($childDelimiter)
				{
					$childTag = substr($childBasename, 4, $childDelimiter-4);
					$childAttributes = explode(",", substr($childBasename, $childDelimiter+1));
				}
				else
				{
					$childTag = substr($childBasename, 4);
					$childAttributes = array("id=$moduleName-$parentId-$childNr");
				}
				$moduleCodeString = directoryContentsString( $childPath );
                       		$htmlElementArray = htmlElementArray( $childTag, $childAttributes, $moduleCodeString );
				domElementAppend( $parentId, $htmlElementArray );
			}
		}
	} // End function appendModuleJavascript
?>