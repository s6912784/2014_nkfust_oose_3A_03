
<? /* 商家 style*/?>
<style>
ul, li {
	margin: 0;
	padding: 0;
	list-style: none;
}
.abgne_tab {
	clear: left;
	width: 675px;
	margin: 10px 0;
}
ul.tabs {
	width: 100%;
	height: 32px;
	border-bottom: 1px solid #999;
	border-left: 1px solid #999;
}
ul.tabs li {
	float: left;
	height: 31px;
	line-height: 31px;
	overflow: hidden;
	position: relative;
	margin-bottom: -1px;	/* 讓 li 往下移來遮住 ul 的部份 border-bottom */
	border: 1px solid #999;
	border-left: none;
	background: #e1e1e1;
}
ul.tabs li a {
	display: block;
	padding: 0 20px;
	color: #000;
	border: 1px solid #fff;
	text-decoration: none;
}
ul.tabs li a:hover {
	background: #ccc;
}
ul.tabs li.active  {
	background: #fff;
	border-bottom: 1px solid#fff;
}
ul.tabs li.active a:hover {
	background: #fff;
}
div.tab_container {
	clear: left;
	width: 100%;
	border: 1px solid #999;
	border-top: none;
	background: #fff;
}
div.tab_container .tab_content {
	padding: 20px;
}
div.tab_container .tab_content h2 {
	margin: 0 0 20px;
}
</style>

<?
$p_id = $_GET[p_id];
$ret = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));

if($_GET[follow]=='add'){
	$m_id = $_SESSION[user];
	$p_id = $_GET[p_id];
	$picc = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
	
	
	mysql_query("insert into m_followlist value('','$m_id','$p_id')");
	
	/* echo "<script>location.replace('?a=car.php')</script>";	*/
}
if($_GET[b]=='m_share_add'){
	$m_id = $_SESSION[user];
	
	if($m_id != ""){
		$p_id = $_GET[p_id];
		$share_type = $_REQUEST[share_type];
		$share_main = $_REQUEST[share_main];
		$date = date("Y-m-d");
		$time = date("H:i:s");
	//$picc = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
		mysql_query("insert into m_share value('','$m_id','$p_id','$share_type','$share_main','$date','$time')");
		echo "<script>location.replace('?a=product_show_in.php&p_id=$p_id')</script>";
	}else{
		$p_id = $_GET[p_id];
		$share_type = $_REQUEST[share_type];
		$share_main = $_REQUEST[share_main];
		$date = date("Y-m-d");
		$time = date("H:i:s");
	//$picc = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
		mysql_query("insert into m_share value('','1','$p_id','$share_type','$share_main','$date','$time')");
		echo "<script>location.replace('?a=product_show_in.php&p_id=$p_id')</script>";
	}
}

if($_GET[b]=='share_del'){
	$m_id = $_SESSION[user];
	$p_id = $_GET[p_id];
	$share_id = $_GET[share_id];
	
	mysql_query("delete from m_share where share_id='$share_id' and m_id='$m_id' and p_id='$p_id'");
	echo "<script>location.replace('?a=product_show_in.php&p_id=$p_id')</script>";
}
?>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<img src="icon/6.gif">
<font size="+0.5">
<strong>&nbsp;產品瀏覽</strong>&nbsp;
<br><br>
<table width="600" align="left">
    <tr>
    	<td width="25"></td>
   	 	<td width="210"><img src="admin/product/<?=$ret[p_pic]?>" height="200" width="200"></td>
        <td width="349">
        
        <?
		if($_SESSION[user]!=""){?>
			<?
			$rry = mysql_fetch_array(mysql_query("select * from stype where stype_id='$ret[stype_id]'"));
			$rry1 = mysql_fetch_array(mysql_query("select * from type where t_id='$ret[t_id]'"));
			?>
            <form id="form1" name="form1" method="post" action="?a=<?=$a?>&p_id=<?=$ret[p_id]?>&follow=add">
                <table width="400" height="200">
            		<tr>
                		<td><strong><font color="#FF9999" face="微軟正黑體" size="+1">產品名稱：<?=$ret[p_name]?></font></strong></td>
                	</tr>
                	<tr>
                		<td>產品分類：<?=$rry[stype_name]?></td>
                	</tr>
                	<tr>
                		<td>產品品牌：<?=$rry1[t_name]?></td>
                	</tr>
                	<tr>
                		<td>產品定價：<?=$ret[p_price]?></td>
                	</tr>
                	<tr>
                		<td>
                            <?
							$mf = mysql_num_rows(mysql_query("select * from m_followlist where m_id='$_SESSION[user]' and p_id='$p_id'"));
							if($mf >0){?>
								<img src="icon/tick.png"><font face="華康粗圓體" color="#FF6666">已加入追蹤清單</font>
							<? }else{?>
                                <input type="submit" value="加入追蹤清單">
                            <? }?>
                        </td>
                	</tr>
            	</table>
        	</form>            
		<? }else{?> <br><br><br>
			<?
			$rry = mysql_fetch_array(mysql_query("select * from stype where stype_id='$ret[stype_id]'"));
			$rry1 = mysql_fetch_array(mysql_query("select * from type where t_id='$ret[t_id]'"));
			?>
            <table width="400" height="200">
            	<tr>
                	<td><strong><font color="#FF9999" face="微軟正黑體" size="+1">產品名稱：<?=$ret[p_name]?></font></strong></td>
                </tr>
                <tr>
                	<td>產品分類：<?=$rry[stype_name]?></td>
                </tr>
                <tr>
                	<td>產品品牌：<?=$rry1[t_name]?></td>
                </tr>
                <tr>
                	<td>產品定價：<?=$ret[p_price]?></td>
                </tr>
                <tr>
                	<td><a href="?a=member_login.php"><img src="icon/shopping-cart.png">加入追蹤清單</a></td>
                </tr>
            </table>
		<? }?>
      </td>
  </tr>
  <tr>
  	<td></td>
    <td colspan="2">
    	
        <div class="abgne_tab">
			<ul class="tabs">
				<li><a href="#tab1">商家資訊</a></li>
				<li><a href="#tab2">商品介紹</a></li>
                <li>
                	<a href="#tab3">
                    	商品評論
                    	<? $shcount = mysql_num_rows(mysql_query("select * from m_share where p_id='$p_id'"));?>
                        (<?=$shcount;?>)
                    </a>
                </li>
			</ul>
 
			<div class="tab_container">
				<div id="tab1" class="tab_content">
					<?
					$bc = mysql_query("select * from blink where p_id='$p_id'");
					if(mysql_num_rows($bc) > 0){?>
                    <table>
    					<tr align="center" height="30">
            				<td width="100">比價商家</td>
                			<td width="275">商品名稱</td>
                			<td width="75">商品價格</td>
                			<td width="125">點我立即前往</td>
            			</tr>
                        <tr>
                        	<td colspan="4">
                            	<hr>
                            </td>
                        </tr>
            		<?
					$bl = mysql_query("select * from blink where p_id='$p_id' order by b_price");
					while($blk = mysql_fetch_array($bl)){
						$bs = mysql_fetch_array(mysql_query("select * from business where bs_id='$blk[bs_id]'"));
						?>
						<tr align="center" height="35">
                        	<td><?=$bs[bs_name]?></td>
                			<td><?=$ret[p_name]?></td>
                			<td>NT.<?=$blk[b_price]?></td>
                			<td><a href="<?=$blk[b_a]?>" target="_new"><img src="icon/world.png"></a></td>
                        </tr>
                        <tr>
                        	<td colspan="4">
                            	<hr color="#CCCCCC" size="-1">
                            </td>
                        </tr>
					<? }?>
       				</table>  
                    <? }else {?> 
                    	此商品尚未新增可提供比價之訊息!
                    <? }?>
				</div>
				<div id="tab2" class="tab_content">
                	
					
                    <? if($ret[p_main] == ""){?>
						尚未新增此商品資訊
					<? }else{?>
						<?=nl2br($ret[p_main])?>
					<? }?>
				</div>
                <div id="tab3" class="tab_content">
                	<?
					
					$sh = mysql_query("select * from m_share where p_id='$_GET[p_id]'");
					$ss = mysql_fetch_array(mysql_query("select * from m_share where p_id='$_GET[p_id]'"));
					if(mysql_num_rows($sh)>0){
						$m = mysql_fetch_array(mysql_query("select * from member where m_id='$ss[m_id]'"));
						while($share = mysql_fetch_array($sh)){?>
							<table>                            	
                                <tr>
                                	<td><img src="icon/media-stop.png"></td>
                                    <td>主題:</td>
                                    <td width="250"><?=$share[share_type]?></td>
                                    <td align="right">
                                    <? if($share[m_id] == $_SESSION[user]){?>
                            			 <a href="?a=member_share_edit.php&m_id=<?=$_SESSION[user]?>&share_id=<?=$share[share_id]?>&p_id=<?=$_GET[p_id]?>"><img src="icon/edit.png" width="28"></a>
                                        <a href="?a=<?=$a?>&m_id=<?=$_SESSION[user]?>&share_id=<?=$share[share_id]?>&p_id=<?=$_GET[p_id]?>&b=share_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="icon/trash.png"></a>
                            		<? }?>
                                    </td>
                                </tr>
                                <tr>
                                	<td></td>
                                	<td>發表者:</td>
                                    <td colspan="2">
                                    <? $i = mysql_fetch_array(mysql_query("select * from member where m_id='$share[m_id]'"));?>
										<?=$i[m_name]?>
                                    </td>
                                </tr>
                                <tr>
                                	<td></td>
                                	<td>發表日期:</td>
                                    <td colspan="2"><?=$share[share_date]?>&nbsp;&nbsp;&nbsp;<?=$share[share_time]?></td>
                                </tr>
                                <tr>
                                	<td></td>
                                	<td>內容:</td>
                                    <td colspan="2"><?=nl2br($share[share_main])?></td>
                                </tr>
                            </table>
                            <hr color="#000033" size="1">
					<? }}else{?>
                    	<img src="icon/media-stop.png">尚未有與商品有關之評論<br>
                        <hr color="#000033" size="1">
                    <? }?>
                    <form action="?a=<?=$a?>&b=m_share_add&p_id=<?=$p_id?>" method="post">
                	<table>
						<tr>
    						<td colspan="2" height="50"><img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">評論</font></td>
    					</tr>
                        <tr>
                        	<td colspan="2"><hr></td>
                        </tr>
                        <tr>
                        	<td width="50">主題:</td>
                            <td>
                            <input type="text" id="share_type" name="share_type">
                            </td>
                        </tr>
                        <tr>
                        	<td width="50">內容:</td>
                            <td>
                            <textarea id="share_main" name="share_main" cols="80" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr align="center">
                        	<td colspan="2" height="40"><input type="submit" value="確定送出"></td>
                        </tr>
					</table>
                    </form>
                </div>
			</div>
		</div> 
    </td>
  </tr>
</table>
</font>

<? /*頁籤*/ ?>
<script>
$(function(){
	// 預設顯示第一個 Tab
	var _showTab = 0;
	$('.abgne_tab').each(function(){
		// 目前的頁籤區塊
		var $tab = $(this);
 
		var $defaultLi = $('ul.tabs li', $tab).eq(_showTab).addClass('active');
		$($defaultLi.find('a').attr('href')).siblings().hide();
 
		// 當 li 頁籤被點擊時...
		// 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
		$('ul.tabs li', $tab).click(function() {
			// 找出 li 中的超連結 href(#id)
			var $this = $(this),
				_clickTab = $this.find('a').attr('href');
			// 把目前點擊到的 li 頁籤加上 .active
			// 並把兄弟元素中有 .active 的都移除 class
			$this.addClass('active').siblings('.active').removeClass('active');
			// 淡入相對應的內容並隱藏兄弟元素
			$(_clickTab).stop(false, true).fadeIn().siblings().hide();
 
			return false;
		}).find('a').focus(function(){
			this.blur();
		});
	});
});
</script>
