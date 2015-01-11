<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loveing Beautiful</title>
<link href="index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <style>
  .ui-menu {
    width: 200px;
  }
  </style>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>



<script>
<!-- Begin
function favority(){
bookmarkurl="http://163.32.98.52/wait/18"  //url
bookmarktitle="LOVE Pet 竉物用品銷售網"         //title
if (document.all)
window.external.AddFavorite(bookmarkurl,bookmarktitle)
else if (window.sidebar) // firefox
window.sidebar.addPanel(bookmarktitle, bookmarkurl, "");
}
// End -->
</script>

<? /*最新消息style*/ ?>
<style>
div#abgne_marquee {
	position: relative;
	overflow: hidden;	/* 超出範圍的部份要隱藏 */
	width:375px;
	height: 30px;
}
div#abgne_marquee ul, div#abgne_marquee li {
	margin: 0;
	padding: 0;
	list-style: none;
}
div#abgne_marquee ul {
	position: absolute;
	left: 30px;			/* 往後推個 30px */
}
div#abgne_marquee ul li a {
	display: block;
	overflow: hidden;	/* 超出範圍的部份要隱藏 */
	font-size:12px;
	height: 30px;
	line-height: 30px;
	text-decoration: none;
}
div#abgne_marquee div.marquee_btn {
	position: absolute;
	cursor: pointer;
}
div#abgne_marquee div#marquee_next_btn {
	left: 5px;
}
div#abgne_marquee div#marquee_prev_btn {
	right: 5px;
}
</style>
 <style>
  .ui-menu { width: 150px; }
  </style>


</head>
<? include("conn.php");?>
<? if($_GET[b]=='out'){  unset($_SESSION[user]);}?>
<? $m_id = $_SESSION[user];?>

<?
if($_GET[b]=='passs'){
	$acc = $_REQUEST[acc];
	$pwd = $_REQUEST[pwd];
	$ret = mysql_query("select * from member where m_acc='$acc' and m_pwd='$pwd'");
	$row = mysql_fetch_array($ret);
	/*echo "<script>alert('$x')</script>";*/
	if(mysql_num_rows($ret)==1){
			//mysql_query("update adm set edate='$date',etime='$time'");
		if($acc !="" and $pwd!=""){
			$_SESSION[user] = $row[m_id];
			echo "<script>location.replace('index.php')</script>";
			}
	}else{
		if($acc == "" and $pwd == ""){
				echo "<script>alert('你尚未輸入帳密!')</script>";
			}else{
				if(!mysql_fetch_array(mysql_query("select * from member where m_acc='$acc'"))==1){
					echo "<script>alert('帳號錯誤')</script>";
				}else{
					echo "<script>alert('密碼錯誤')</script>";
				}
			}	
	}
}
?>
<body>
<div id="all">
    	<div id="title">
        	<div id="logo" style="text-align:center;"><img src="pic/logo.png" height="120px;"></div>
      <div id="h">
                <div id="menu2">
            <font size="-2">
  <table align="right" style="text-align:center;">
                    	<tr>
                        	<td style="width:200px; border-right:1px solid #666;">
							<? $r = mysql_fetch_array(mysql_query("select * from member where m_id='$m_id'"));?>
        					<?=$r[m_name]?>&nbsp;&nbsp;歡迎蒞臨
                            </td>
                        	<td style="width:110px;">
                            	<?
								if($_SESSION[user]!=""){?>
                               		<a href="?b=out">會員登出</a>/
                                	<a href="?a=member_ma.php">會員管理</a>
                                <? }else{?>
                                	<a href="?a=member_login.php">會員登入</a>/
                                	<a href="?a=member_add.php">註冊</a>
                                <? }?>  
                            </td>
                        <td style="width:70px;"><a href="index.php">回首頁</a></td>
                            <td style="width:70px;"><a href="#">連絡我們</a></td>
                            <td></td>
                        </tr>
            </table>
                    <br><br><br>
                </font>
                </div>
                <div align="right" id="a1">
                    	<form action="?b=sh" method="post">
                        	<table>
                            	<td height="30">
                            		<input type="text" id="p_name" name="p_name">
                            	</td>
                                <td><input type="submit" value="搜尋"></td>
                        	</table>
                        </form>
                    </div>
                <div id="menu1" align="right">
                	<a href="index.php" title="首頁">
                    	<img src="pic/home.png" onMouseOver="this.src='pic/home-1.png';" 
                    			onMouseOut="this.src='pic/home.png';"></a>
                    <a href="#" title="關於我們">
                   	<img src="pic/about.png" onMouseOver="this.src='pic/about-1.png';"
                        		onMouseOut="this.src='pic/about.png';"></a>
                    <a href="?a=product_show.php" title="產品列表">
                    	<img src="pic/product.png" onMouseOver="this.src='pic/product-1.png';"
                        		onMouseOut="this.src='pic/product.png';"></a>
                    <a href="?a=product_search.php" title="產品搜尋">
                    	<img src="pic/search.png"  onMouseOver="this.src='pic/search-1.png';"
                        		onMouseOut="this.src='pic/search.png';"></a>
                    
                  <?
				  if($_SESSION[user]!=""){?>
					  	<a href="?a=member_ma.php" title="會員管理">
               	  		<img src="pic/member.png" onMouseOver="this.src='pic/member-1.png';"
                        		onMouseOut="this.src='pic/member.png';"></a>
				  <? }else{?>
                  		<a href="?a=admin_login.php" title="使用者登入">
               	  		<img src="pic/admin.png" onMouseOver="this.src='pic/admin-1.png';"
                        		onMouseOut="this.src='pic/admin.png';"></a>
                  <? }?>
              </div>
            </div>	
        </div>
        <div id="ap">
        	<div id="l" align="center">
            <?
			if($_SESSION[user]!=""){
			?>
            	
                <? $r = mysql_fetch_array(mysql_query("select * from member where m_id='$m_id'"));?>
               		<br>
            	<div style="border:1px solid #000; width:220px; height:150px; margin:auto; background:#FFC;">
            	<table>
                	<tr>
                    	<td colspan="2" height="5"></td>
                    </tr>
                	<tr>
                    	<td><img src="icon/home-outline.png"></td>
                        <td><font size="+1" face="華康粗圓體" color="#333333">會員資訊</font></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><hr color="#333333" size="1"></td>
                    </tr>                    
                </table>
                <table>
                	<tr>
                    	<td height="25" width="70px" align="center">會員帳號:</td>
                        <td><?=$r[m_acc]?></td>
                    </tr>
                    <tr>
                    	<td height="25" align="center">會員名稱:</td>
                        <td><?=$r[m_name]?></td>
                    </tr>
                    <tr>
                    	<td colspan="2" height="10"></td>
                    </tr>
                </table>
                	<font size="-1" face="華康粗圓體"><a href="?b=out">會員登出</a>/<a href="?a=member_ma.php">會員管理</a></font>
            </div>
            <? }else{?>
            <br>
            <div style="border:1px solid #000; width:220px; height:150px; margin:auto; background:#FFC;">
            	<table>
                	<tr>
                    	<td colspan="2" height="10"></td>
                    </tr>
                	<tr>
                    	<td><img src="icon/home-outline.png"></td>
                        <td><font size="+1" face="華康粗圓體" color="#333333">會員登入</font></td>
                    </tr>
                </table>
                <form action="?b=passs" method="post">
                <table>
                	<tr>
        				<td height="30" width="40px" align="center"><font size="-1">帳號:</font></td>
            			<td><input type="text" name="acc" id="acc"></td>
        			</tr>
        			<tr>
        				<td align="center" height="30"><font size="-1">密碼:</font></td>
            			<td><input type="password" name="pwd" id="pwd"></td>
        			</tr>
                    <tr align="center">
        				<td colspan="2" height="30"><input type="submit" value="確定登入"></td>
        			</tr>
                </table>
                </form>
            </div>
            <? }?>
            </div>
            <div id="r">
            <img src="pic/t.png" width="720" height="200">
            </div>
        
        </div>
<div id="for">
  		<div id="menu3">       	
           <?
		   if($_GET[a]=='member_ma.php' or $_GET[a]=='member_followlist.php' or $_GET[a]=='member_ma.php' or $_GET[a]=='member_share.php'){?>
           		<table align="center" width="150">
                	<tr align="center">
                    	<td height="50"><font face="華康粗圓體" size="+2" color="#FF9966">會員管理</font></td>
                    </tr>
                    <tr align="center">
                    	<td height="30"><a href="?a=member_ma.php">個人資訊管理</a></td>
                    </tr>
                    <tr align="center">
                    	<td height="30"><a href="?a=member_followlist.php">追蹤清單管理</a></td>
                    </tr>
                    <tr align="center">
                    	<td height="30"><a href="?a=member_share.php">使用心得管理</a></td>
                    </tr>
                </table>
           
           <? }else{?>
            <table align="center" width="150px;">
            	<tr style="height:10px;">
                	<td></td>
                </tr>
            	<tr>
                	<td  style="border-bottom:1px solid #CCC;"><img src="pic/ppic.png"></td>
                </tr>
            </table>
           <ul id="menu" style="margin:auto;">
  			<?
 	 		$ret = mysql_query("select * from stype");
  			while($row = mysql_fetch_array($ret)){
	  			$rh = mysql_query("select * from type where stype_id='$row[stype_id]'");
	 			if(mysql_num_rows($rh) > 0){ ?>
  				<li><?=$row[stype_name]?>
    				<ul>
        			<? while($rhh = mysql_fetch_array($rh)){ ?>
      					<li><a href="?a=product_show.php&stype_id=<?=$row[stype_id]?>&t_id=<?=$rhh[t_id]?>"><?=$rhh[t_name]?></a></li>
   					<? }?>
        			</ul>
  				</li>
    			<? }else{?>
					<li><?=$row[stype_name]?></li>
			<? }}?>
			</ul> 
            <? }?>
            
       	  </div>
        	<div id="main">
            	<?
					$a = $_GET[a];
					if($a != ""){
						include($a);
					}else{?>
                    <br><br>
                    	<?
						if($_GET[b]=='sh'){
							$shna = $_REQUEST[p_name];	
						?>
                        <strong><font color="#FF0000">目前搜尋到有關「<?=$shna?>」的商品!</font></strong><br><br>
                        
						<table border="1" bordercolor="#FFFFFF">
    						<tr>
								<?
    							$k = 0;
    							$shna = $_REQUEST[p_name];
    							$ro = mysql_query("select * from product where p_name like '%$shna%'");
       							if(mysql_num_rows($ro)>0){
            					while($roo = mysql_fetch_array($ro)){
									$k++;
									if($k>5){
										$k = 1;
										echo "</tr><tr>";
									}?>
									<td width="150" align="center">
										<div id="picshow">
										<a href="?a=product_show_in.php&t_id=<?=$roo[t_id]?>&stype_id=<?=$roo[stype_id]?>&p_id=<?=$roo[p_id]?>"><img src="admin/product/s<?=$roo[p_pic]?>" border="0"></a><br><br>
										</div>
										<div style="width:110px; height:80px;" align="left">
										<font size="-1">
										<?=$roo[p_name]?><br>
										價格：<?=$roo[p_price]?><br>
                						<?
                						$p = mysql_num_rows(mysql_query("select * from blink where p_id='$roo[p_id]'"));
										$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$roo[p_id]' order by b_price limit 1"));
										if($p > 0){?>
                							最低售價：<?=$rt[b_price]?>
										<? }else{?>
											最低售價：<?=$roo[p_price]?>
										<? }?>
										</div><br>
									</td>
                					<? }
        						}else{?>
            						<td>很抱歉!!!並沒有搜尋到有<font color="#FF0000" size="+1"><strong><?=$shna?></strong></font>關鍵字的產品名稱!!!!</td>
       		 				<? }?>
							</tr>
						</table>
						<? }else{?>
                    	
                        <div style="height:5px;"></div>
                     
                        <? /*廣告輪播*/ ?>
                        <div id="abgne_fade_pic" style="margin:auto;">
							<a href="#" class="ad"><img src="pic/ad/6.png" style="width:700px; height:350px;"/></a>
							<a href="#" class="ad"><img src="pic/ad/7.png" style="width:700px; height:350px;"/></a>
                            <a href="#" class="ad"><img src="pic/ad/8.png" style="width:700px; height:350px;"/></a>
                            <a href="#" class="ad"><img src="pic/ad/9.png" style="width:700px; height:350px;"/></a>
                            <a href="#" class="ad"><img src="pic/ad/10.png" style="width:700px; height:350px;"/></a>
						</div> 
						
                        <? /*最新產品*/ ?>
                        
                        <table border="1" bordercolor="#FFFFFF">
    						<tr>
                            	<td colspan="5">
                                	<img src="pic/newproduct.png">
                                </td>
                            </tr>
                            <tr>
							<? $k = 0;
								$rry = mysql_query("select * from product order by p_id desc limit 15");
								while($rr = mysql_fetch_array($rry)){
								$k++;
								if($k>5){
									$k = 1;
									echo "</tr><tr>";
								}?>
                             	<td width="150" align="center">
        							<div id="picshow">
            						<a href="?a=product_show_in.php&stype_id=<?=$rr[stype_id]?>&t_id=<?=$rr[t_id]?>&p_id=<?=$rr[p_id]?>"><img src="admin/product/s<?=$rr[p_pic]?>" border="0"></a><br>
        							<br>
        							</div>
          							<div style="width:110px; height:80px;" align="left">
            						<font size="-1">
                                    	<a href="?a=product_show_in.php&stype_id=<?=$rr[stype_id]?>&t_id=<?=$rr[t_id]?>&p_id=<?=$rr[p_id]?>"><?=$rr[p_name]?></a><br>
           						    </font>
           						    </div>
        	 						<br>
                              </td>
                                 <? }?>
                          </tr>
              			</table>
					<? } }?>
                    
                    
        	</div>
        </div>
        <div id="foot"><img src="pic/bottom.png"></div>
</div>
</body>
</html>
<? /*  選單JQUERY */?>
<script type="text/javascript">
	$(function(){
		// 幫 #qaContent 的 ul 子元素加上 .accordionPart
		// 接著再找出 li 中的第一個 div 子元素加上 .qa_title
		// 並幫其加上 hover 及 click 事件
		// 同時把兄弟元素加上 .qa_content 並隱藏起來
		$('#qaContent ul').addClass('accordionPart').find('li div:nth-child(1)').addClass('qa_title').hover(function(){
			$(this).addClass('qa_title_on');
		}, function(){
			$(this).removeClass('qa_title_on');
		}).click(function(){
			// 當點到標題時，若答案是隱藏時則顯示它，同時隱藏其它已經展開的項目
			// 反之則隱藏
			var $qa_content = $(this).next('div.qa_content');
			if(!$qa_content.is(':visible')){
				$('#qaContent ul li div.qa_content:visible').slideUp();
			}
			$qa_content.slideToggle();
		}).siblings().addClass('qa_content').hide();
	});
</script>

<? /*  廣告JQUERY */?>
<script type="text/javascript">
	$(function(){
		var $block = $('#abgne_fade_pic'), 
			$ad = $block.find('.ad'),
			showIndex = 0,			// 預設要先顯示那一張
			fadeOutSpeed = 2000,	// 淡出的速度
			fadeInSpeed = 3000,		// 淡入的速度
			defaultZ = 10,			// 預設的 z-index
			isHover = false,
			timer, speed = 1500;	// 計時器及輪播切換的速度
		
		// 先把其它圖片的變成透明
		$ad.css({
			opacity: 0,
			zIndex: defaultZ - 1
		}).eq(showIndex).css({
			opacity: 1,
			zIndex: defaultZ
		});
		
		// 組出右下的按鈕
		var str = '';
		for(var i=0;i<$ad.length;i++){
			str += '<a href="#">' + (i + 1) + '</a>';
		}
		var $controlA = $('#abgne_fade_pic').append($('<div class="control">' + str + '</div>').css('zIndex', defaultZ + 1)).find('.control a');

		// 當按鈕被點選時
		// 若要變成滑鼠滑入來切換時, 可以把 click 換成 mouseover
		$controlA.click(function(){
			// 取得目前點擊的號碼
			showIndex = $(this).text() * 1 - 1;
			
			// 顯示相對應的區域並把其它區域變成透明
			$ad.eq(showIndex).stop().fadeTo(fadeInSpeed, 1, function(){
				if(!isHover){
					// 啟動計時器
					timer = setTimeout(autoClick, speed + fadeInSpeed);
				}
			}).css('zIndex', defaultZ).siblings('a').stop().fadeTo(fadeOutSpeed, 0).css('zIndex', defaultZ - 1);
			// 讓 a 加上 .on
			$(this).addClass('on').siblings().removeClass('on');

			return false;
		}).focus(function(){
			$(this).blur();
		}).eq(showIndex).addClass('on');

		$block.hover(function(){
			isHover = true;
			// 停止計時器
			clearTimeout(timer);
		}, function(){
			isHover = false;
			// 啟動計時器
			timer = setTimeout(autoClick, speed);
		})
		
		// 自動點擊下一個
		function autoClick(){
			if(isHover) return;
			showIndex = (showIndex + 1) % $controlA.length;
			$controlA.eq(showIndex).click();
		}
		
		// 啟動計時器
		timer = setTimeout(autoClick, speed);
	});
</script>

<? /*  最新消息JQUERY */?>
<script>
$(function(){
	// 先取得 div#abgne_marquee ul
	// 接著把 ul 中的 li 項目再重覆加入 ul 中(等於有兩組內容)
	// 再來取得 div#abgne_marquee 的高來決定每次跑馬燈移動的距離
	// 設定跑馬燈移動的速度及輪播的速度
	var $marqueeUl = $('div#abgne_marquee ul'),
		$marqueeli = $marqueeUl.append($marqueeUl.html()).children(),
		_height = $('div#abgne_marquee').height() * -1,
		scrollSpeed = 600,
		timer,
		speed = 3000 + scrollSpeed,
		direction = 0,	// 0 表示往上, 1 表示往下
		_lock = false;
 
	// 先把 $marqueeli 移動到第二組
	$marqueeUl.css('top', $marqueeli.length / 2 * _height);
 
	// 幫左邊 $marqueeli 加上 hover 事件
	// 當滑鼠移入時停止計時器；反之則啟動
	$marqueeli.hover(function(){
		clearTimeout(timer);
	}, function(){
		timer = setTimeout(showad, speed);
	});
 
	// 判斷要往上還是往下
	$('div#abgne_marquee .marquee_btn').click(function(){
		if(_lock) return;
		clearTimeout(timer);
		direction = $(this).attr('id') == 'marquee_next_btn' ? 0 : 1;
		showad();
	});
 
	// 控制跑馬燈上下移動的處理函式
	function showad(){
		_lock = !_lock;
		var _now = $marqueeUl.position().top / _height;
		_now = (direction ? _now - 1 + $marqueeli.length : _now + 1)  % $marqueeli.length;
 
		// $marqueeUl 移動
		$marqueeUl.animate({
			top: _now * _height
		}, scrollSpeed, function(){
			// 如果已經移動到第二組時...則馬上把 top 設回到第一組的最後一筆
			// 藉此產生不間斷的輪播
			if(_now == $marqueeli.length - 1){
				$marqueeUl.css('top', $marqueeli.length / 2 * _height - _height);
			}else if(_now == 0){
				$marqueeUl.css('top', $marqueeli.length / 2 * _height);
			}
			_lock = !_lock;
		});
 
		// 再啟動計時器
		timer = setTimeout(showad, speed);
	}
 
	// 啟動計時器
	timer = setTimeout(showad, speed);
 
	$('a').focus(function(){
		this.blur();
	});
});
</script>


<script>
$( "#menu" ).menu();
</script>