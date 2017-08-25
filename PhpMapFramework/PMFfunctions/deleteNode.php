<?php
	function deleteNode($node)
	{
		deleteChildren($node);
		$parent = $node->parentNode;
		$oldnode = $parent->removeChild($node);
	}

	function deleteChildren($node)
	{
		while (isset($node->firstChild))
		{
			deleteChildren($node->firstChild);
			$node->removeChild($node->firstChild);
		}
	} 
?>