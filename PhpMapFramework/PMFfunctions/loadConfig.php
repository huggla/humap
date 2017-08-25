<?php
	function loadConfig()
	{
		define( "PMFMODULESPATH", "PhpMapFramework/PMFmodules" );
		define( "ENABLEDMODULESFILE", "PhpMapFramework/PMFconfigs/".$_GET["config"]."/enabledModules");
		define( "MODULECONFIGSPATH", "PhpMapFramework/PMFconfigs/".$_GET["config"]."/moduleConfigs");
		if ( empty( $_GET["config"] ) )
		{
			echo "No config specified!";
		}
		elseif ( !file_exists( ENABLEDMODULESFILE ) )
		{
			echo 'Config file '.ENABLEDMODULESFILE.' is missing!';
		}
		else
 		{
			global $PMFDOM;
			$PMFDOM = initDom();
			$mapTitle=file_get_contents("PhpMapFramework/PMFconfigs/".$_GET["config"]."/title");
			if (!empty($mapTitle))
			{
				$htmlElementArray = htmlElementArray( 'title', array(), $mapTitle);
				domElementAppend( 'head', $htmlElementArray );
			}
			$configStyles=file_get_contents("PhpMapFramework/PMFconfigs/".$_GET["config"]."/styles");
			if (!empty($configStyles))
			{
				$htmlElementArray = htmlElementArray( 'style', array('id=config-styles'), $configStyles);
				domElementAppend( 'head', $htmlElementArray );
			}
			loadModules();
			showPage();
		}
	} // End function loadConfig
?>