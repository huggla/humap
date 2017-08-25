<?php
	function ol3MapNodes($path)
	{
		if (!(isset($path)))
		{
			$globpath=MODULECONFIGSPATH."/openlayers3/layers/*";
		}
		else
		{
			$globpath=$path."/*";
		}
		$ol3MapNodes=array();
		$i=0;
		foreach ( glob( $globpath ) as $nodePath )
		{
			$basename=basename($nodePath);
			$ol3MapNodes[$i]['title'] = str_ireplace('<slash>', '/', substr($basename, 8));
			if (substr($basename, 4, 3)=='(_)')
			{
				$ol3MapNodes[$i]['visible'] = 'false';
			}
			else
			{
				$ol3MapNodes[$i]['visible'] = 'true';
			}
			if (is_dir($nodePath))
			{
				$ol3MapNodes[$i]['config'] = ol3MapNodes($nodePath);
				if (stripos($basename, 'b')===0)
				{
					$ol3MapNodes[$i]['type'] = 'baselayergroup';
				}
				else
				{
					$ol3MapNodes[$i]['type'] = 'group';
				}
			}
			else
			{
				$ol3MapNodes[$i]['config'] = file_get_contents( $nodePath );
				if (stripos($basename, 'b')===0)
				{
					$ol3MapNodes[$i]['type'] = 'baselayer';
				}
				else
				{
					$ol3MapNodes[$i]['type'] = 'layer';
				}
			}
			$i++;
		}
		return $ol3MapNodes;
	}
?>