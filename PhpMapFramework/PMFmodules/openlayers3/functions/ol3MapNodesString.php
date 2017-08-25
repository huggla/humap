<?php
	function ol3MapNodesString($mapNodes)
	{
		if (!(isset($mapNodes)))
		{
			$mapNodes=ol3MapNodes();
		}
		$mapNodesString='';
		foreach ($mapNodes as $node)
		{
			if ($node['type']=='group' || $node['type']=='baselayergroup')
			{
				$mapNodesString=$mapNodesString.'new ol.layer.Group({title:"'.$node['title'].'",visible:'.$node['visible'].',type:"'.$node['type'].'",layers:['.ol3MapNodesString($node['config']).']}),';
			}
			else
			{
				$mapNodesString=$mapNodesString.'new ol.layer.Tile({title:"'.$node['title'].'",visible:'.$node['visible'].',source:'.$node['config'].',type:"'.$node['type'].'"}),';
			}
		}
		return "\n".rtrim($mapNodesString, ', ')."\n";
	}
?>