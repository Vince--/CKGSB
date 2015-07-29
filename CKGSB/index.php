<?php
require_once "jssdk.php";
require_once "conn.php";
header("Content-type:text/html;charset=utf-8");
$jssdk = new JSSDK("", "");
//$jssdk = new JSSDK("wxdfb315b37c78a39c", "2d8b10a0bb4ccf9eb60b04587ca873e4");
$signPackage = $jssdk->GetSignPackage();
?>
<?php
	
@$id=$_GET['id'];


$sql="select * from cj where id='$id'";
	$result=mysql_query($sql);
	$row=(mysql_fetch_array($result)) ;
		
	
	
	
	?>
<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
  <meta charset="UTF-8">
  <title>长江商学院</title>
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">


   <!--<meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>-->
  <style type="text/css" media="all">
	

.comments {
 overflow:auto;
 word-break:break-all;
background:transparent;color:white;
resize: none;
border:0;
}

a{
text-decoration:none;
}

	a:link { text-decoration:white}
　　 a:active { text-decoration:white}
　　 a:hover { text-decoration:underline;color: red} 
　　 a:visited { text-decoration: none;color: green};





  </style>
</head>


<body style="width: transform: scale(1.0);margin:0;">
 <!-- <button id="btn">点击这里</button>-->
 

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	
	  /*
	   
	 
	   */
	  	
	  wx.config({
	    debug: false,
	    appId: '<?php echo $signPackage["appId"];?>',
	    timestamp: <?php echo $signPackage["timestamp"];?>,
	    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
	    signature: '<?php echo $signPackage["signature"];?>',
	    jsApiList: [
	      // 所有要调用的 API 都要加到这个列表中
	
		 "chooseImage",
		 "previewImage",
		 "uploadImage",
		"downloadImage",
		 "onMenuShareAppMessage"
	    ]
	  });
	 
	 wx.ready(function () {
	 	
		
	

    wx.onMenuShareAppMessage({
         title: '在长江，见木又见林',
      desc: '记录你在长江学习的点滴，分享你在长江留下的印记',
       link: 'http://www.ckgsb.com/zt/eeweixin_blue/index.php?id=123&imgid=',
      imgUrl: 'http://www.ckgsb.com/zt/eeweixin_blue/img/show.png',
      trigger: function (res) {
        //alert('用户点击发送给朋友');
      },
      success: function (res) {
        //alert('已分享');
		window.history.back(-1); 
      },
      cancel: function (res) {
       // alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
   // alert('已注册获取“发送给朋友”状态事件');
 
var images = {
    localId: [],
    serverId: []
  };
	
  js_id =<?php echo $id;?>; 
  /* if(js_id=="") 
	{
		img_src='img/bg1.png';
		  document.getElementById('imgInit').src = img_src; 
	}
   else
	{
		img_src="update/"+js_id+".jpg";
		//alert(img_src);
		  document.getElementById('imgInit').src = img_src; 
	}*/
   
   //document.getElementById('imgInit').src = img_src; 
   
	  });


function relayout(){
	var buttonlayer_top = document.getElementById("bg").offsetHeight * 0.85
	document.getElementById("buttonlayer").style.top = buttonlayer_top + "px";

	var inputlayer_top = document.getElementById("bg").offsetHeight * 0.72
	document.getElementById("inputlayer").style.top =inputlayer_top + "px";  

	var inputview_height = document.getElementById("bg").offsetHeight * 0.129;
	document.getElementById("inputview").style.height =inputview_height + "px";  

	document.documentElement.style.webkitTouchCallout='none';
	
}
window.onscroll=relayout;
window.onresize=relayout;
window.onload=relayout;




</script>

	<img id="imgInit" src="bg1.png" style='display:block;position:absolute;left:0px; width:100%;height:100% margin-top:0px; margin-left:0px; left:0px;top:0px;z-index:-1;'/>
	<img id="bg"  src="img/cj.png" style="display:block;position:absolute; width:100%;left:0px; margin-top:0px; margin-left:0px;top:0px;z-index: -1;" />	
	<div id="inputlayer"  onselectstart="return false" align="bottom" style="position: absolute;float: left;left:7.8%;top:73.3%; width:92.2%" >
	
	  <textarea id="inputview" class="comments"  readonly  style="poistion:absolute; font: normal Helvetica, Arial, sans-serif; width:58.8%; font-size:13px;">在长江，见木又见林 <?php // echo $row['content']; ?></textarea>
	</div>
	     
	<div id="buttonlayer" align="bottom"  style=" position: absolute;bottom:0;left:7.3%; width:92%" >
	  <!--  <input type= "file" name ="photo"  id="photo" class= "file" value ="" style="display:none"/> -->
	       
	    <a href="class.html" style="width: 30%;"> 
		<img  id ="class" src="img/class.png" style="position:absolute;width: 15%" >
	    </a>&nbsp;&nbsp;&nbsp;&nbsp;
	   
	   <a href="Make.php"> 
		<img id="make" src="img/make.png" style="position:absolute;left:27.5%;width:30%" >
	   </a>
       </div> 

 
</body>
</html>


