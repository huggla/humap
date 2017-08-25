<?php 
	function directoryContentsString( $directory )
	{
		$directory = rtrim( $directory, '/' );
		$string = '';
		foreach ( glob( "$directory/*" ) as $textFile )
		{
			if ( substr( $textFile, -5 ) == '.link' )
			{
				$string = $string.file_get_contents( file_get_contents( $textFile ) );
			}
			elseif ( substr( $textFile, -4 ) == '.php' )
			{
				$string = $string.eval( rtrim( ltrim( file_get_contents( $textFile ), "<?php" ), "?>" ) );
			}
			else 
			{
				$string = $string.file_get_contents( $textFile );
			}
		}
		return $string;
	} // End function directoryContentsString
?>