<style>
#a{width:900px;
   height:300px;
   margin:auto;
}
#a1{width:380px;
    height:300px;
	float:left;
}
#a2{width:520px;
	height:300px;
	float:right;
}

</style>
<br><br>
<?
if($_GET[b]=='editlink'){
	
	$p_id = $_GET[p_id];
	
	for($i=0;$i<count($_REQUEST[b_id]);$i++){
		$b_id = $_REQUEST[b_id][$i];
		$bs_id = $_REQUEST[bs_id][$i];
		$b_price = $_REQUEST[b_price][$i];
		$b_a = $_REQUEST[b_a][$i];
		mysql_query("update blink set b_price='$b_price',b_a='$b_a',bs_id='$bs_id' where b_id='$b_id'");
	}
	echo "<script>location.replace('?a=bs_p_edit.php&p_id=$p_id')</script>";		
}

if($_GET[b] == 'blink_del'){
	$p_id = $_GET[p_id];
	$b_id = $_GET[b_id];
	$bs_id = $_GET[bs_id];
	
	mysql_query("delete from blink where p_id='$p_id' and b_id='$b_id' and bs_id='$bs_id'");
	echo "<script>location.replace('?a=bs_p_edit.php&p_id=$p_id')</script>";
	
	
}
?>
<?
$p_id = $_GET[p_id];
$row = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
?>

<table width="900">
	<tr>
    	<td align="right" width="540"><img src="pic/star.png"> <font face="華康秀風體W3" size="+2" >編輯商品連結</font></td>
    	<td align="right"><a href="?a=blink_edit.php&stype_id=<?=$row[stype_id]?>&t_id=<?=$row[t_id]?>">回上一頁</a></td>
    </tr>
</table>
<br><br>
<div id="a">
	<div id="a1"><img src="product/<?=$row[p_pic]?>" width="80%"></div>
    <div id="a2">
    <form action="?a=<?=$a?>&b=editlink&p_id=<?=$_GET[p_id]?>" method="post">
    <table border="1" bordercolor="#666666" width="500">
    	<tr align="center">
        	<td colspan="2" height="40" bgcolor="#FFCCCC">商品資訊</td>
        </tr>
		<tr>
    		<td width="100" height="30" bgcolor="#FFCCCC" align="center">商品名稱:</td>
        	<td width="300"><?=$row[p_name]?></td>
    	</tr>
    	<tr>
    		<td height="30" bgcolor="#FFCCCC" align="center">商品定價:</td>
        	<td>NT.<?=$row[p_price]?></td>
    	</tr>
    	<tr>
        	<td colspan="2" bgcolor="#FFFFCC" align="center" height="50">編輯連結的商家</td>
        </tr>
	</table>
   
   <?
   $check = mysql_query("select * from blink where p_id='$_GET[p_id]'");
   if(mysql_num_rows($check)>0){
   ?>
    <table border="1" bordercolor="#666666" width="500">
    	 <?
			$retlink = mysql_query("select * from blink where p_id='$p_id'");
			while($rowlink = mysql_fetch_array($retlink)){?>
        <tr>
        	<td bgcolor="#FFCCCC" height="30" width="200" align="center">連結的商家:</td>
            <td>
            <select id="bs_id[]" name="bs_id[]">
    			<option value="">---請選擇---</option>
				<?
				$ret1 = mysql_query("select * from business");
				while($row1 = mysql_fetch_array($ret1)){?>
        			<option value="<?=$row1[bs_id]?>" <? if($row1[bs_id] == $rowlink[bs_id]) echo "selected";?>><?=$row1[bs_name]?></option>
        		<? }?>
    		</select>
            </td>
            <td align="center">
            	<a href="?a=<?=$a?>&p_id=<?=$rowlink[p_id]?>&b_id=<?=$rowlink[b_id]?>&bs_id=<?=$rowlink[bs_id]?>&b=blink_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="../icon/trash.png"></a>
            </td>
        </tr>
        <tr>
        	<td height="40" bgcolor="#FFCCCC" align="center">商家價格:</td>
            <td colspan="2">
            <input type="text" id="b_price[]" name="b_price[]" value="<?=$rowlink[b_price]?>">
            <input type="hidden" id="b_id[]" name="b_id[]" value="<?=$rowlink[b_id]?>">
            </td>
        </tr>
        <tr>
        	<td height="40" bgcolor="#FFCCCC" align="center">商家連結:</td>
            <td colspan="2">
            <textarea id="b_a[]" name="b_a[]" cols="38" rows="3"><?=$rowlink[b_a]?></textarea>
            </td>
        </tr>
        <? }?>
        <tr>
        	<td colspan="3" align="center"><input type="submit" value="確定修改"></td>
        </tr>
    </table>
    <? }else{?>
		此商品尚未新增商家連結!
	<? }?>
    
    <br>
    
    </form>
    </div>
</div>


