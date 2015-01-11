<br>
<div align="center">
<img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">商品搜尋</font>
</div>
<br><br>
<div align="center">
<div style="width:700px;">
<div align="left">
請選擇查詢的方式：
<select id="sh" name="sh" onchange="location.replace('?a=<?=$a?>&share='+this.value)">
	<option>---請選擇---</option>
	<option value="text" <? if($_GET[share]=='text') echo "selected";?>>關鍵字查詢</option>
    <option value="shprice"<? if($_GET[share]=='shprice') echo "selected";?>>價格查詢</option>
</select>
</div>
<br>
<?
if($_GET[share]=="text"){?>
    <form action="?a=<?=$a?>&share=text&sh=pass" method="post">
    <table border="1"  bordercolor="#006600"  cellspacing="0" bgcolor="#FFFFCC" width="550" align="left">
        <tr>
            <td width="200" height="50" align="center">請輸入欲查詢的關鍵字：</td>
            <td align="left"><input type="text" id="shna" name="shna" size="50"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="查詢"></td>
        </tr>
    </table><br><br><br><br><br><br>
    </form>
<? }else{
	if($_GET[share]=="shprice"){
?>
	<form action="?a=<?=$a?>&share=shprice&sh=prst" method="post">
	<table border="1"  bordercolor="#006600"  cellspacing="0" bgcolor="#FFFFCC" width="500" align="left">
    	<tr>
    		<td height="50">請輸入欲查詢的價格：</td>
        	<td align="left"><input type="text" id="shpr" name="shpr">~<input type="text" id="shpr1" name="shpr1"></td>
    	</tr>
    	<tr align="center">
        	<td colspan="2"><input type="submit" value="查詢"></td>
    	</tr>	
	</table><br><br><br><br><br><br><br><br>
	</form>
<? }else{?>
	<div align="left">
    <br>
	<font color='#FF0000' size="+1"><strong>請選擇欲查詢的方法!!!</strong></font>
	</div>
<? }	
}?>
</div>
<div align="left" style="width:690px;">

<table border="1" bordercolor="#FFFFFF">
    <tr>
	<?
    $k = 0;
	if($_GET[sh]=="pass"){
    $shna = $_REQUEST[shna];
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
				<a href="?a=product_show_in.php&t_id=<?=$roo[t_id]?>&stype_id=<?=$roo[stype_id]?>&p_id=<?=$roo[p_id]?>"><img src="admin/product/s<?=$roo[p_pic]?>" border="0"></a><br>
				<br>
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
				</div>
				<br>
				</td>
                <? }
        }else{?>
            <td>很抱歉!!!並沒有搜尋到有<font color="#FF0000" size="+1"><strong><?=$shna?></strong></font>關鍵字的產品名稱!!!!</td>
        <? }}?>
	</tr>
</table>
<table>
	<tr>
    <?
	$k = 0;
	if($_GET[sh]=="prst"){
		$p1 = $_REQUEST[shpr];
		$p2 = $_REQUEST[shpr1];
		if($p1=="" || $p2==""){
			echo "<script>alert('資料輸入不完全')</script>";
		}else{
		/*echo "<script>alert('$p1')</script>";
		echo "<script>alert('$p2')</script>";*/
    	$rot = mysql_query("select * from product where p_price between $p1 and $p2");
		//$rot = mysql_query("select * from product where pr='$p1' ");
		/*echo "<script>alert('$p1~$p2')</script>";*/
        if(mysql_num_rows($rot)>0){
            while($root = mysql_fetch_array($rot)){
				$k++;
				if($k>5){
					$k = 1;
					echo "</tr><tr>";
				}
				?>
				<td width="150" align="center">
				<div id="picshow">
				<a href="?a=product_show_in.php&t_id=<?=$root[t_id]?>&stype_id=<?=$root[stype_id]?>&p_id=<?=$root[p_id]?>"><img src="admin/product/s<?=$root[p_pic]?>" border="0"></a><br>
				<br>
				</div>
				<div style="width:110px; height:80px;" align="left">
				<font size="-1">
				<?=$root[p_name]?><br>
				價格：<?=$root[p_price]?><br>
				 <?
                $p = mysql_num_rows(mysql_query("select * from blink where p_id='$root[p_id]'"));
				$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$root[p_id]' order by b_price limit 1"));
				if($p > 0){?>
                	最低售價：<?=$rt[b_price]?>
				<? }else{?>
					最低售價：<?=$root[p_price]?>
				<? }?>
                </div>
				<br>
				</td>
                <? }
        }else{?>
            <td>很抱歉!!!並沒有搜尋到有<font color="#FF0000" size="+1"><strong><?=$p1?>~<?=$p2?></strong></font>此價格區間的產品!!!!</td>
	 <? }}}?>
    </tr>
</table>
</div>
</div>