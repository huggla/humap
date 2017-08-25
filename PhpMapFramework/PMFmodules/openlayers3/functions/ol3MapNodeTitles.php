<?php
	function ol3MapNodeTitles($mapNodes)
	{
		if (!(isset($mapNodes)))
		{
			$mapNodes=ol3MapNodes();
		}
		$mapNodeTitles=array();
		foreach ($mapNodes as $node)
		{
			$mapNodeTitles[]=$node['title'];
			if ($node['type']=='group')
			{
				$mapNodeTitles=array_merge($mapNodeTitles, ol3MapNodeTitles($node['config']));
			}
		}
		return $mapNodeTitles;
	}
?>