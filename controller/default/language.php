<?php
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}
if(isset($_GET['giatri']))
{
    $_SESSION['lang']=$_GET['giatri'];
    if($_GET['giatri']=="cn")
    {
        $_SESSION['lang']=2;
    }
    else{
        $_SESSION['lang']=1;
    }
    echo "<script>location.reload(true)</script>";

}
?>