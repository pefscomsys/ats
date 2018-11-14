
<?php
// exec('alrp --version 2>&1', $result); print_r($result);
$oldldpath = getenv('LD_LIBRARY_PATH');
putenv("LD_LIBRARY_PATH=");
// exec('/usr/bin/git pull 2>&1');
exec('alpr --version', $result);
putenv("LD_LIBRARY_PATH=$oldldpath");


var_dump($result);
?>

<!-- array(3) { [0]=> string(0) "" [1]=>string(29) "/usr/bin/alpr  version: 2.2.4" [2]=> string(0) "" } -->
