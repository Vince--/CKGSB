<?php
 @$conn = mysql_connect('localhost','','') or die ('数据库连接失败');
  mysql_select_db('') or die('选择数据库失败！');

  mysql_query("SET NAMES 'utf8';") or die(mysql_error());


  ?>
