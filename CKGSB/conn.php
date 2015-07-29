<?php
 @$conn = mysql_connect('localhost','eeweixin','VMQKNp3ecsLKJJjZ') or die ('数据库连接失败');
  mysql_select_db('eeweixin') or die('选择数据库失败！');

  mysql_query("SET NAMES 'utf8';") or die(mysql_error());


  ?>