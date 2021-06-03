<?php
set_time_limit(0); //Unlimited max execution time
$path = 'newfile.zip';
$url = 'http://www.path-to-old-file.com/backup.zip';
$newfname = $path;
echo 'Starting Download!
';
$file = fopen ($url, "rb");
if($file) {
$newf = fopen ($newfname, "wb");
if($newf)
while(!feof($file)) {
fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
echo '1 MB File Chunk Written!
';
}
}
if($file) {
fclose($file);
}
if($newf) {
fclose($newf);
}
echo 'Finished!';
?>
