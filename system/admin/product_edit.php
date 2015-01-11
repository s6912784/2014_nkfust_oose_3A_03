<?
if($_GET[b]=='del'){
	$p_id = $_GET[p_id];
	$tt = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
	$pic = $tt[p_pic];
	
	$rf = mysql_num_rows(mysql_query("select * from blink where p_id='$_GET[p_id]'"));
	/*echo "<script>alert($rf)</script>";*/	
	
	if(mysql_num_rows(mysql_query("select * from blink where p_id='$_GET[p_id]'"))>0){
		
		echo "<script>alert('尚有商家連結未刪除')</script>";	
		echo "<script>location.replace('?a=$a&stype_id=$tt[stype_id]&t_id=$tt[t_id]')</script>";
	}else{
		unlink("product/".$pic);
		unlink("product/s".$pic);
	
		mysql_query("delete from product where p_id='$p_id'");
		echo "<script>location.replace('?a=$a&stype_id=$tt[stype_id]&t_id=$tt[t_id]')</script>";
	}
	
}
?>


<br><br>
<?
$stype_id=$_GET[stype_id];
$type_id = $_GET[t_id];
?>
<select id="stype_id" name="stype_id" onchange="location.replace('?a=<?=$a?>&stype_id='+this.value)">
    	<option value="">---請選擇---</option>
		<?
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[stype_id]?>" <? if($row[stype_id] == $_GET[stype_id]) echo "selected";?>><?=$row[stype_name]?></option>
        <? }?>
    </select>
    
    <?
		if($_GET[stype_id] != ""){?>
		<select id="t_id" name="t_id" onchange="location.replace('?a=<?=$a?>&stype_id=<?=$_GET[stype_id]?>&t_id='+this.value)">
    		<option value="">---請選擇---</option>
			<?
			$ret = mysql_query("select * from type where stype_id = $_GET[stype_id]");
			while($row = mysql_fetch_array($ret)){?>
        		<option value="<?=$row[t_id]?>" <? if($row[t_id] == $_GET[t_id]) echo "selected";?>><?=$row[t_name]?></option>
        	<? }?>
    	</select>		
	<?	}?>
    
    <br><br>
    <? 
	if($_GET[t_id] != ""){
		$r = mysql_query("select * from product where t_id='$type_id'");
		
		if(mysql_num_rows($r)>0){
		
		?>
		<table border="1" bordercolor="#666666">
			<tr align="center">
            	<td width="80">產品圖片</td>
    			<td width="200">產品名稱</td>
        		<td width="100">產品品牌</td>
        		<td width="50">產品價格</td>
        		<td width="70">查詢</td>
                <td width="50">編輯</td>
   			</tr>
   			<?
			$ret = mysql_query("select * from product where stype_id='$stype_id' and t_id='$type_id'");
			while($row = mysql_fetch_array($ret)){?>
   			<tr align="center">
            	<td><img src="product/s<?=$row[p_pic]?>"></td>
    			<td><?=$row[p_name]?></td>
        		<td><?=$row[p_b]?></td>
        		<td><?=$row[p_price]?></td>
        		<td>
                <a href="?a=product_edit_in.php&p_id=<?=$row[p_id]?>">詳細資訊</a>
                </td>
                <td>
                <a href="?a=<?=$a?>&b=del&p_id=<?=$row[p_id]?>" onclick="return confirm('您確定要刪除嗎!?')">刪除</a>
                </td>
   			</tr>
    		<? }?>
		</table>
    	<? }else{
			echo "<font color='ff0000'>此分類下沒有任何的產品!!!</font>";	
		}}?>