<?php
	foreach ( glob( "PhpMapFramework/PMFfunctions/*" ) as $PMFfunction )
	{
		include $PMFfunction;
	}
	loadConfig();
?>