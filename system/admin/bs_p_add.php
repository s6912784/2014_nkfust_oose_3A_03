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
if($_GET[b]=='addlink'){
	
	
	$p_id = $_GET[p_id];
	$bs_id = $_GET[bs_id];
	
	$f = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
	$stype_id = $f[stype_id];
	$t_id = $f[t_id];
	
	$b_price = $_REQUEST[b_price];
	$b_a = $_REQUEST[b_a];
	
	mysql_query("insert blink value('','$bs_id','$stype_id','$t_id','$p_id','$b_price','$b_a')");
			
}
?>
<?
$p_id = $_GET[p_id];
$row = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
?>

<table width="900">
	<tr>
    	<td align="right" width="540"><img src="pic/star.png"> <font face="華康秀風體W3" size="+2" >新增商品連結</font></td>
    	<td align="right"><a href="?a=blink_add.php&stype_id=<?=$row[stype_id]?>&t_id=<?=$row[t_id]?>">回上一頁</a></td>
    </tr>
</table>
<div id="a">
	<div id="a1"><img src="product/<?=$row[p_pic]?>" width="80%"></div>
    <div id="a2">
    <form action="?a=<?=$a?>&b=addlink&p_id=<?=$_GET[p_id]?>&bs_id=<?=$_GET[bs_id]?>" method="post">
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
	</table>
    <table border="1" bordercolor="#666666" width="500">
    	<tr>
        	<td bgcolor="#FFCCCC" height="30" width="200" align="center">選擇欲新增連結的商家:</td>
            <td>
            <select id="bs_id" name="bs_id" onchange="location.replace('?a=<?=$a?>&p_id=<?=$_GET[p_id]?>&bs_id='+this.value)">
    			<option value="">---請選擇---</option>
				<?
				$ret1 = mysql_query("select * from business");
				while($row1 = mysql_fetch_array($ret1)){?>
        			<option value="<?=$row1[bs_id]?>" <? if($row1[bs_id] == $_GET[bs_id]) echo "selected";?>><?=$row1[bs_name]?></option>
        		<? }?>
    		</select>
            </td>
        </tr>
        <tr>
        	<td height="40" bgcolor="#FFCCCC" align="center">商家價格:</td>
            <td><input type="text" id="b_price" name="b_price"></td>
        </tr>
        <tr>
        	<td height="40" bgcolor="#FFCCCC" align="center">商家連結:</td>
            <td>
            <textarea id="b_a" name="b_a" cols="38" rows="3"></textarea>
            </td>
        </tr>
        <tr align="center">
        	<td colspan="2" height="40" bgcolor="#FFCCCC"><input type="submit" value="新增"></td>
        </tr>
    </table>
    </form>
    </div>
</div>


