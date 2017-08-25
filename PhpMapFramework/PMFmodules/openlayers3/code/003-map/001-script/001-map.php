<?php
	$elementInnerHtml =
		ol3MapProjections().
		'var view = '.ol3MapView().';'.
		'var map = '.
			'new ol.Map'.
			'({'.
				ol3MapControls().
				'target:"map",'.
				'renderer:"'.ol3MapRenderer().'",'.
				'layers:'.
				'['.
					ol3MapNodesString().
				'],'.
				'view:view'.
			'})'.
		';'
	;
	return $elementInnerHtml;
?>