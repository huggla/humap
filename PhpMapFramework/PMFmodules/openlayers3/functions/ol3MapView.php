<?php
	function ol3MapView()
	{
		return 'new ol.View({'.file_get_contents( MODULECONFIGSPATH."/openlayers3/view" ).'})';
	}
?>