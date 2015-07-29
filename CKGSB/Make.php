	<?php
	require_once "jssdk.php";
	require_once "conn.php";
	header("Content-type:text/html;charset=utf-8");
	$jssdk = new JSSDK("", "");
	//$jssdk = new JSSDK("wxdfb315b37c78a39c", "2d8b10a0bb4ccf9eb60b04587ca873e4");
	$signPackage = $jssdk->GetSignPackage();

  
 if($_SERVER['REQUEST_METHOD']=='POST'){
@$img_url=$showphpath;
@$content=$_POST['comments'];	
echo $content;
$sql="INSERT INTO cj(img_url,content) VALUES ('$img_url','$content')";
if($result=mysql_query($sql))
{
	echo '上传成功';
	$lastid=mysql_insert_id();	
	echo $lastid;
	
}
else
{
	echo '上传失败';
}
 }

	?>
	<!DOCTYPE HTML>
	<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <title>长江商学院</title>
	  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">

	  <style>
	.comments {
	 overflow:auto;
	 word-break:break-all;
	background:transparent;color:white;
	resize: none;
border:1;
	}

	input,button,select,textarea{outline:none}
	textarea{resize:none} 	

	
	  </style>
	</head>
	<body  style="width: auto; margin: auto;">
		
	 <!-- <button id="btn">点击这里</button>-->
	 
	<!--  <img src="pic.jpg">  -->
	
	
	
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
      link: 'http://www.ckgsb.com/zt/eeweixin_blue/sample.php?id=123&imgid=',
      imgUrl: 'http://www.ckgsb.com/zt/eeweixin_blue/img/show.png',
      trigger: function (res) {
       // alert('用户点击发送给朋友');
      },
      success: function (res) {
        //alert('已分享');
		window.history.back(-1); 
      },
      cancel: function (res) {
        //alert('已取消');
      },
      fail: function (res) {
     //   alert(JSON.stringify(res));
      }
    });
    //alert('已注册获取“发送给朋友”状态事件');
 
var images = {
    localId: [],
    serverId: []
  };
	
	    // 上传图片
	document.getElementById("btn").onclick=function()
		  {
	wx.chooseImage({
	   count:1,
	    success: function (res) {
	        images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
	      //alert('已选择 ' + res.localIds.length + ' 张图片');
			if(res.localIds.length>1)
			{
			alert('您最多只能选择一张图片');
			}
			else
			document.getElementById('imgInit').src = images.localId;
			document.getElementById('text1').value = images.localId;
			//alert(images.localId);
	    }
	
	});
	
	}
	document.getElementById("1").onclick=function()
	{
	 if (images.localId.length == 0) {
     alert('请先点击我要拍照选择图片');
	 return;
    
    }
  	var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
	;
	document.getElementById('text2').value =res.serverId;
          i++;
        //  alert('已上传：' + i + '/' + length);
	//alert(res);
          images.serverId.push(res.serverId);
          if (i < length) {
		
            upload();
	
          }
	else
{
document.form.submit();
	}
        },
	
        fail: function (res) {
        //  alert(JSON.stringify(res));
        }
	
      });
	
    }
   
    upload();
}
/*var images = {
    localId: [],
    serverId: []
  };
	
  js_id =<?php echo $id;?>; 
   if(js_id=="") 
	{
		img_src='img/bg1.png';
		  document.getElementById('imgInit').src = img_src; 
	}
   else
	{
		img_src="update/"+js_id+".jpg";
		//alert(img_src);
		  document.getElementById('imgInit').src = img_src; 
	}	*/

	/*$(document).ready( function (){
	      $( "#i_1" ).load( function(){
	             var url = $("#i_1" ).contents().find( "#pic").html();
	             if (url != null){
	                  $( "#tag_img" ).attr("src" ,url);
	            }
	      });
	});*/
	  });


function relayout(){
	var buttonlayer_top = document.getElementById("bg").offsetHeight * 0.86;
	document.getElementById("buttonlayer").style.top = buttonlayer_top + "px";

	
	var inputlayer_top = document.getElementById("bg").offsetHeight * 0.714;
	document.getElementById("inputlayer").style.top =inputlayer_top + "px";   


	var inputview_height = document.getElementById("bg").offsetHeight * 0.129;
	document.getElementById("inputview").style.height =inputview_height + "px";  
	

}
window.onscroll=relayout;
window.onresize=relayout;
window.onload=relayout;

	</script>
	 <img id="imgInit" src='img/bg1.png' width='100%'  style='position: absolute;left:0px;top:0px;z-index: -1'></img>
	<img id="bg" alt="cover" src="img/cj_1.png" style="width:100%;display:block;position:absolute;left:0px;top:0px;z-index: -1" ></img>
	<img id="tag_img" src="" />
	
	<form enctype ="multipart/form-data" name="form" id="form" action= "show.php" method ="post" >
		
		<div id="inputlayer" align="bottom" style="POSITION: absolute;float: left;left:7.8%;top:73.3%; width:92.2%" >
		    <font color="white">
			<input type="text"  hidden="hidden" name="text1" id="text1">
 			<input type="text"  hidden="hidden" name="text2" id="text2">
			<textarea id="inputview" class="comments" name="comments"  maxlength="30" style="position:absolute; font: normal Helvetica, Arial, 

sans-serif; width:58.8%; font-size:13px; " autofocus="autofocus"></textarea>
		  
		    </font></div>

	<div id = "buttonlayer" align="bottom" style="POSITION: absolute;float: left;width=100%; left:4%;bottom:2%; width:95%" >
		  <input type= "file" name ="photo"  id="photo"  class= "file" style="display:none"/>
		      <span class="desc"></span>
      
		       
		       
		  <!-- &nbsp;&nbsp;<a href="#.php"> <input type="image" src="img/class.png"  height="40" width="18%"></a>&nbsp;&nbsp;&nbsp;&nbsp;
		       <input type="image" src="img/make.png" height="39" width="40%"onclick="document.getElementById('photo').click();" />-->
	    <!--  <input type ="button" id="uploadImage" value="上传图片"style="background-color:transparent;border: hidden;width: 50px ;height: 1%;">
	         <input type="button" src="img/make.png" value="提交" id="1uploadImage" style="background-color:transparent;border: hidden;width: 25% 

;height: 13%;
	          border: hidden;"  onclick="submit()"></a>-->
	
	<!--<img src="img/submit.png" id="uploadImage"  style="width: 18% ;">--> &nbsp;
	<img src="img/share.png" id="1"  style="margin-left:1.5%;width: 56%;" >
	<img src="img/take.png"   id="btn"   style="margin-left:16%; width: 13% ;">
	<!--<input type="button" id="f5" name="f5" value="下载图片">-->
	</form>
	<!--<iframe id= "1"  width="0" height="0" name = "upload_target"></iframe >	-->

	</body>
	</html>
<?php


?>
	