<?php 
	function loadModule( $moduleName )
	{
		foreach ( glob( "PhpMapFramework/PMFmodules/$moduleName/functions/*" ) as $moduleFunction )
		{
			include $moduleFunction;
		}
		appendModuleCode( $moduleName );
	} // End function loadModule
?>