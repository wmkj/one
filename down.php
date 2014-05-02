<?php
header('Content-Type:text/html; charset=utf-8');
file_put_contents('upload.zip', file_get_contents('http://buildbot.ikk.me/latest/tieba-sign_nightly.zip'));
require_once('pclzip.lib.php');
$archive = new PclZip('upload.zip');
if ($archive->extract() == 0)
{
die("Error : ".$archive->errorInfo(true)); //解压缩路径跟原始档相同路径
}
unlink("upload.zip");
unlink("pclzip.lib.php");
unlink(__FILE__);
header('Location: ./install/');
?>
