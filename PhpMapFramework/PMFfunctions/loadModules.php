<?php 
	function loadModules( $modulesListFile )
	{
		if ( !(isset( $modulesListFile )) )
		{
			$modulesArray = file( ENABLEDMODULESFILE );
			if ( empty($modulesArray) )
			{
				echo "Config file $moduleListFile is empty!";
				return 0;
			}
		}
		else
		{
			$modulesArray = file( $modulesListFile );
		}
		foreach ( $modulesArray as $moduleName )
		{
			$moduleName=trim($moduleName);
			if (!empty($moduleName))
			{
				loadModules( PMFMODULESPATH."/$moduleName/moduleDependencies" );
				include_once PMFMODULESPATH."/$moduleName/$moduleName.php";
			}
		}
	} // End function loadModules
?>