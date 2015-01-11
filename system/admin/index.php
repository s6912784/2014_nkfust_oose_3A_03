<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loveing Beautiful-後台管理系統</title>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>
<? 
include("conn.php");


$adm_id =$_SESSION[admin_user];

/*echo "<script>alert('$adm_id')</script>";*/

if($adm_id==''){
	echo "<script>location.replace('../?a=admin_login.php')</script>";
}

?>
<?

if($_GET[b]=='out'){
	$date = date("Y-m-d");
	$time = date("H:i:s");
	mysql_query("update adm set edate='$date',etime='$time' where adm_id=$adm_id");
	unset($_SESSION[admin_user]);
	echo "<script>location.replace('../index.php')</script>";
}
?>


<body>
<div id="all">
    	<div id="title">
        	<div id="logo" style="text-align:center;"><img src="../pic/logo.png" width="184" height="95"></div>
            <div id="h">
                <div id="menu2">
           	<font size="-2">
                	<table align="right" style="text-align:center;">
                    	<tr>
                        	<td style="width:90px;"></td>
                            <td style="width:70px;"></td>
                        	<td style="width:70px; border-right:1px solid #666;">歡迎您回來</td>
                            <td style="width:70px;">管理者</td>
                            <td></td>
                        </tr>
                    </table>
                </font>
                </div>
                <div id="menu1" align="right">
                	<img src="pic/back.png">
                    <a href="?b=out" title="使用者登出">
               	  <img src="pic/adminout.png" onMouseOver="this.src='pic/adminout-1.png';"
                        		onMouseOut="this.src='pic/adminout.png';"></a>
              </div>
            </div>	
        </div>
        
        <div id="menu3">
        	<ul id="menu">
				<li><a href="#">商品系列管理</a>
					<ul>
						<li><a href="?a=stype_add.php">新增商品系列</a></li>
                        <li><a href="?a=stype_edit.php">編輯商品系列</a></li>
						<li><a href="?a=type_add.php">新增商品分類</a></li>
                        <li><a href="?a=type_edit.php&stype_id=1">編輯商品分類</a></li>
					</ul>
				</li>
				<li><a href="#">產品管理</a>
					<ul>
						<li><a href="?a=product_add.php">新增商品</a></li>
						<li><a href="?a=product_edit.php">編輯商品</a></li>
					</ul>
				</li>
				<li><a href="#">商家管理</a>
        			<ul>
						<li><a href="?a=bs_add.php">新增商家</a></li>
						<li><a href="?a=bs_edit.php">編輯商家</a></li>
                        <li><a href="?a=blink_add.php">新增商品 & 商家連結</a></li>
						<li><a href="?a=blink_edit.php">編輯商品 & 商家連結</a></li>
					</ul>
        		</li>
        		<li><a href="#">會員管理</a>
        			<ul>
						<li><a href="?a=member.php">會員資訊管理</a></li>
                        <li><a href="?a=member_list.php">會員清單管理</a></li>
                        <li><a href="?a=member_share.php">會員心得管理</a></li>
					</ul>
        		</li>
        	</ul>
        </div>
        <div id="main" align="center">
        
        	
            <?
				$a = $_GET[a];
				if(isset($a)){
					include($a);
				}else{
					 "<br>歡迎您回來，使用者!!!";	
				}
			?>
            
  		</div>
        <div id="foot"><img src="pic/paic-bg.png" height="64" width="975"></div>
</div>
</body>
</html>

<script>
$(function(){
	// 幫 #menu li 加上 hover 事件
	$('#menu li').hover(function(){
		// 先找到 li 中的子選單
		var _this = $(this),
			_subnav = _this.children('ul');
 
		// 變更目前母選項的背景顏色
		// 同時淡入子選單(如果有的話)
		_this.css('backgroundColor', '#FF9');
		_subnav.stop(true, true).fadeIn(400);
	} , function(){
		// 變更目前母選項的背景顏色
		// 同時淡出子選單(如果有的話)
		// 也可以把整句拆成上面的寫法
		$(this).css('backgroundColor', '').children('ul').stop(true, true).fadeOut(400);
	});
 
	// 取消超連結的虛線框
	$('a').focus(function(){
		this.blur();
	});
});
</script>