<?php
session_start();
include("../db.php");
$id = $_SESSION['id'];
$id_article = $_POST['id_article'];
if($_POST['like'])
{
    $q = mysql_query("SELECT * from likes WHERE id_user='$id' AND id_article='$id_article'");
    $r = mysql_fetch_array($q);
    if($r['id']==0 OR $q==false)
    {
        $q2 = mysql_query("INSERT INTO likes SET id_user='$id', id_article='$id_article'");
        if($q2==true)
        {
            echo "<html><head><meta http-equiv='Refresh' content='0'; URL='../news?id=$id_article</head></html>";
        }

    }

}
if($_POST['dislike'])
{
    $q = mysql_query("SELECT * from likes WHERE id_user='$id' AND id_article='$id_article'");
    $r = mysql_fetch_array($q);
    if($r['id']==0 OR $q==false)
    {
        $q2 = mysql_query("DELETE FROM likes WHERE id_user='$id' AND id_article='$id_article'");
        if($q2==true)
        {
            echo "<html><head><meta http-equiv='Refresh' content='0'; URL='../news?id=$id_article</head></html>";
        }

    }

}


?>