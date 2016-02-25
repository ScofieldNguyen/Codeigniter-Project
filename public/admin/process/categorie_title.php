<?php
    $conn=mysql_connect("localhost", "root", "") or die("can't connect database");
    mysql_select_db("ciproject",$conn);
    $id = $_POST['id'];
    $sql="select * from cate_news where cate_id = '$id'";
    $query=mysql_query($sql);
    if(mysql_num_rows($query) == 0){
        echo "Chua co du lieu";
    }
    else{
    	$row = mysql_fetch_array($query);
    	echo $row['cate_title']." ".$row['cate_parent'];
    }
    mysql_close($conn);
?>