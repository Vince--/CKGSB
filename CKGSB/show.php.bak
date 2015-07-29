	<?php
	require_once "jssdk.php";
	require_once "conn.php";
	header("Content-type:text/html;charset=utf-8");
	//$jssdk = new JSSDK("wxdfb315b37c78a39c", "2d8b10a0bb4ccf9eb60b04587ca873e4");
	$jssdk = new JSSDK("wx91996f1c5be719ae", "f90d1b6820f562a7a5bd6537073e822c");
	$signPackage = $jssdk->GetSignPackage();
	

$path='upload/';//路径
$phtypes=array(
   'img/gif',
   'img/jpg',
   'img/jpeg',
   'img/bmp',
   'img/pjpeg',
   'img/x-png'
);





 if($_SERVER['REQUEST_METHOD']=='POST'){
  
@$img_url=$showphpath;
@$content=$_POST['comments'];
$imgid=$_POST['text2'];	
$sql="INSERT INTO cj(img_url,content) VALUES ('$imgid','$content')";
if($result=mysql_query($sql))
{
	//echo '<font size="1px">海报秀制作成功</font>';
	$lastid=mysql_insert_id();	
	//echo $lastid;
	
}
else
{
	echo '上传失败';
}
 }
else
	{
		
	}
	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <title>长江商学院</title>
	  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	  <style>
		.comments {
	 width:100%;/*自动适应父布局宽度*/
	 overflow:auto;
	 word-break:break-all;
	background:transparent;color:white;
	resize: none;
border:0px;
	}
	

	
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
		 "onMenuShareAppMessage"
	    ]
	  });
	 
	 wx.ready(function () {
	 	
	
	
//http://www.ckgsb.com/zt/eeweixin
//http://www.1bu2bu.com/demo/changjiang
    wx.onMenuShareAppMessage({
      title: '在长江，见木又见林',
      desc: '记录你在长江学习的点滴，分享你在长江留下的印记',
      link: 'http://www.ckgsb.com/zt/eeweixin_blue/sample.php?id=<?php echo $lastid;?>&imgid=<?php echo $imgid  ?>',
      imgUrl: 'http://www.ckgsb.com/zt/eeweixin_blue/img/show.png',
      trigger: function (res) {
    //    alert('用户点击发送给朋友');
      },
      success: function (res) {
   //     alert('已分享');
		window.history.back(-1); 
      },
      cancel: function (res) {
   //     alert('已取消');
      },
      fail: function (res) {
    //    alert(JSON.stringify(res));
      }
    });
   // alert('已注册获取“发送给朋友”状态事件');
 var images = {
    localId: [],
    serverId: []
  };
	
	    // 上传图片
	document.getElementById("uploadImage").onclick=function()
	{
	if (images.localId.length == 0) {
      alert('请先使用 chooseImage 接口选择图片');
      return;
    }
	var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
          i++;
        //  alert('已上传：' + i + '/' + length);
          images.serverId.push(res.serverId);
          if (i < length) {
            upload();
          }
        },
        fail: function (res) {
       //   alert(JSON.stringify(res));
        }
      });
    }
    upload();

	} 
	document.getElementById("btn1").onclick=function()
		  {
	wx.uploadImage({
	    localId: 'localIds', // 需要上传的图片的本地ID，由chooseImage接口获得
	    isShowProgressTips: 1, // 默认为1，显示进度提示
	    success: function (res) {
	        var serverId = res.serverId; // 返回图片的服务器端ID
	    }
	});
	
	}
	
	  });


function relayout(){
	

	var inputlayer_top = document.getElementById("bg").offsetHeight * 0.72
	document.getElementById("inputlayer").style.top =inputlayer_top + "px";   


	var inputview_height = document.getElementById("bg").offsetHeight * 0.129;
	document.getElementById("inputview").style.height =inputview_height + "px"; 
	
}
window.onscroll=relayout;
window.onresize=relayout;
window.onload=relayout;
	</script>
	<?php
		if($_POST['text1']=="")
		{
		$bgimg="img/bg1.png";
		}
		else
{  $bgimg=$_POST[text1];    }
		
		?>
	<img src="img/dark.png" width='100%'  style='position: absolute;left:0px;top:0px;z-index: 1'/>
	 <img id="imgInit" src='<?php echo $bgimg; ?>' width='100%'  style='position: absolute;left:0px;top:0px;z-index: -1'></img>
	<img id="bg" alt="cover" src="img/cj.png" style="width:100%;display:block;position: absolute;left:0px;top:0px;z-index: -1" ></img>
	<img id="tag_img" src="" />
	<map name="planetmap" id="planetmap">
	  <area shape="circle" coords="300，139,14" href ="venus.html" alt="Venus" />
	 
	</map>
	<form enctype ="multipart/form-data" action= "sample.php" method ="post" >
		<div id="inputlayer"  align="bottom"style="position: absolute;float: left; width=62%;left: 8%;right: 30%; top:72%" >
			<font color="white">
	
 <textarea id="inputview" class="comments"  readonly="" style="position:absolute;font: normal Helvetica, Arial, sans-serif; width:90%; font-size:14px"  autofocus="autofocus"><?php echo @$_POST['comments'] ?></textarea>
		    </font></div>
		    <div align="bottom" style="POSITION: absolute;float: left;width=100%; left:5%;bottom:0%;" >
		  <input type= "file" name ="photo"  id="photo"  class= "file" style="display:none"/>
		      <span class="desc"></span>
      
		       
	       </div>
	
	
	 
	</form>

	</body>
	</html>

	<?php 


global $access_token;
//define("AppID","wxdfb315b37c78a39c");
//define("AppSecret", "2d8b10a0bb4ccf9eb60b04587ca873e4");
define("AppID","wx91996f1c5be719ae");
define("AppSecret", "f90d1b6820f562a7a5bd6537073e822c");

$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".AppID."&secret=".AppSecret;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$jsoninfo = json_decode($output, true);
$access_token = $jsoninfo["access_token"];




/* 获取单个元素(根据id) */
@$b = $lastid;
if($b == @$lastid){

 $url1 = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id="."$imgid";
 $ret = https_request($url1,null);
 saveWeixinFile("update/$b.jpg",$ret); //下载后好的文件名
}

function saveWeixinFile($filename, $filecontent)
{
	
    $local_file = fopen($filename, 'w');
    if (false !== $local_file){
        if (false !== fwrite($local_file, $filecontent)) {
            fclose($local_file);
        }
    }

	/*if (is_writable($filename)) {
	echo file_put_contents($filename, $filecontent);
	} 
	else 
	{
  		echo "文件 $filename 不可写";
	}*/
}


function https_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}



?> 