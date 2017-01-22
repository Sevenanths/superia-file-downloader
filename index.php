<html>
<head>
	<title>Superia File Downloader</title>
</head>
<body>
	<h1>Superia File Downloader</h1>
	<p>Gotta download fast.</p>
<?php
	$xml = simplexml_load_file("CoreMain.xml");

	$filelist = $xml->xpath("//FileList")[0];

	$n = 0;
	foreach ($filelist as $file)
	{
		if (1 == 1)
		{
			forceFilePutContents($file['TargetPath'], fopen($file['FileURL'], 'r'));
		}
		else
		{
			break;
		}

		$n++;
	}

	echo "All done!";

	function forceFilePutContents ($filepath, $message){
    try {
        $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
        if($isInFolder) {
            $folderName = $filepathMatches[1];
            $fileName = $filepathMatches[2];
            if (!is_dir($folderName)) {
                mkdir($folderName, 0777, true);
            }
        }
        file_put_contents($filepath, $message);
    } catch (Exception $e) {
        echo "ERR: error writing '$message' to '$filepath', ". $e->getMessage();
    }
}
?>

