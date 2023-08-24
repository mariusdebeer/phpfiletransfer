<?php
set_time_limit(0); // Unlimited max execution time

$path = 'newfile.zip';
$url = 'http://www.path-to-old-file.com/backup.zip';
$newfname = $path;

echo 'Starting Download!' . PHP_EOL;

// Open a remote connection to the URL
$file = fopen($url, "rb");
if (!$file) {
    die('Error: Unable to open remote file for reading.');
}

// Open the local file for writing
$newf = fopen($newfname, "wb");
if (!$newf) {
    fclose($file);
    die('Error: Unable to open local file for writing.');
}

// Download and write file in chunks
while (!feof($file)) {
    $chunk = fread($file, 1024 * 8);
    if ($chunk === false) {
        fclose($file);
        fclose($newf);
        die('Error: Failed to read remote file.');
    }

    $bytesWritten = fwrite($newf, $chunk);
    if ($bytesWritten === false) {
        fclose($file);
        fclose($newf);
        die('Error: Failed to write to local file.');
    }
}

// Close file pointers
fclose($file);
fclose($newf);

echo 'Download finished!' . PHP_EOL;
?>

