<?php
	function ol3MapProjections()
	{
		$ol3MapProjections = '';
		foreach ( glob( MODULECONFIGSPATH."/openlayers3/projections/*" ) as $projectionFile )
		{
			$ol3MapProjections = 
				$ol3MapProjections.
                                'ol.proj.addProjection'.
                                '('.
					'new ol.proj.Projection'.
					'({'.
						file_get_contents( $projectionFile ).
					'})'.
				');'
			;
		}
		return $ol3MapProjections;
	}
?>