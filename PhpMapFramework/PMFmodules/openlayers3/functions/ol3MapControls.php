<?php
	function ol3MapControls()
	{
		$ol3MapControls = 
			'controls:'.
				'ol.control.defaults().extend'.
				'(['
		;
		foreach ( glob( MODULECONFIGSPATH."/openlayers3/controls/*" ) as $controlFile )
		{
			$ol3MapControls = 
				$ol3MapControls.
				file_get_contents( $controlFile ).','
			;
		}
		$ol3MapControls = 
			$ol3MapControls.
			']),'
		;
		return $ol3MapControls;
	}
?>