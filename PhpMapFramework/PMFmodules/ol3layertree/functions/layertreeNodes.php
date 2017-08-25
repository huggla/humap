<?php
	function layertreeNodes($mapNodes,$preclass,$groupCount)
	{
		global $layerIdCount;
		if (!(isset($groupCount)))
		{
		    $groupCount=-1;
		}
		$groupCount++;
		if (!(isset($layerIdCount)))
		{
		    $layerIdCount=0;
		}
		if (!(isset($mapNodes)))
		{
			$mapNodes=ol3MapNodes();
		}
		if (!(isset($preclass)))
		{
			$preclass='';
		}
		else
		{
			$preclass=str_ireplace('-sub', '', $preclass).'-sub';
		}
		$layertreeNodes='';
		foreach ($mapNodes as $node)
		{
			$class0=str_ireplace(array(' ', '#', '.', 'å', 'ä', 'ö'), '_', $node['title']);
			$class1=$preclass.' '.$class0;
			if ($node['type']=='group' || $node['type']=='baselayergroup')
			{
				$class2='group '.$class1;
				$nodeTypeImg='<span id="arrow'.$layerIdCount.'" class="arrow1" onclick="if (this.className=='."'arrow1'){this.className='arrow2';}else{this.className='arrow1';};$('.".$class0."-sub').toggle();".'"></span>';
			}
			else
			{
				$class2='layer '.$class1;
				$nodeTypeImg='';
			}
			$checkboxPadding=$groupCount*10;
			if ($groupCount==0)
			{
				$styleDisplay='display:block;';
			}
			else
			{
				$styleDisplay='display:none;';
			}
			if ($node['type']=='baselayer' || $node['type']=='baselayergroup')
			{
				$inputType='radio';
			}
			else
			{
				$inputType='checkbox';
			}
			if ($node['type']=='baselayergroup')
			{
				$input=' ';
			}
			else
			{
				$input='<input id="visible-'.$layerIdCount.'" name="layertree" class="visible layer" type="'.$inputType.'"/> ';
			}
			$layertreeNodes=
				$layertreeNodes.
				'<p id="layer'.$layerIdCount.'" class="'.$class2.'" style="'.$styleDisplay.'">'.$nodeTypeImg.
          				'<label class="checkb '.$node['type'].'" for="visible-'.$layerIdCount.'" style="padding-left:'.$checkboxPadding.'px">'.
            					$input.$node['title'].
          				'</label>'.
          				'<br></br><input class="opacity" type="range" min="0" max="1" step="0.01"/>'.
				'</p>'
			;
			$layerIdCount++;
			if ($node['type']=='group' || $node['type']=='baselayergroup')
			{
				$layertreeNodes=$layertreeNodes.layertreeNodes($node['config'], $class1, $groupCount);
			}
		}
		return '<div id="layertree-overflow">'.$layertreeNodes.'</div>';
	}
?>