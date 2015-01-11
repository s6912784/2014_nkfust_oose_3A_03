<?
if($_GET[b]=='update'){
	for($i=0;$i<count($_REQUEST[bs_id]);$i++){
		$bs_id = $_REQUEST[bs_id][$i];
		$bs_name = $_REQUEST[bs_name][$i];
		$bs_a = $_REQUEST[bs_a][$i];
		mysql_query("update business set bs_name='$bs_name',bs_a='$bs_a' where bs_id='$bs_id'");
		
	}
	echo "<script>location.replace('?a=bs_edit.php')</script>";
}
if($_GET[b]=='bs_del'){
	
	$bs_id = $_GET[bs_id];
	
	
	$r = mysql_query("select * from blink where bs_id ='$bs_id'");
	
	if(mysql_num_rows($r)>0){
		echo "<script>alert('尚有與商品之連結未刪除!!!!')</script>";
	}else{
		mysql_query("delete from business where bs_id='$bs_id'");
	}
	
	/*echo "<script>alert($stype_id)</script>";	*/
    echo "<script>location.replace('?a=bs_edit.php')</script>";
}
?>
<br>
<form action="?a=<?=$a?>&b=update" method="post">
    <table border="1" bordercolor="#333333">
    	<tr align="center">
        	<td width="100">編號</td>
            <td width="200">商家名稱</td>
            <td width="116" align="center">商家連結</td>
            <td width="">編輯</td>
        </tr>
        <? 
		$ret = mysql_query("select * from business");
		while($row = mysql_fetch_array($ret)){?>
        <tr>
        	<td align="center"><?=$row[bs_id]?><input type="hidden" id="bs_id[]" name="bs_id[]" value="<?=$row[bs_id]?>"></td>
            <td align="center"><input type="text" id="bs_name[]" name="bs_name[]" value="<?=$row[bs_name]?>"></td>
        	<td>
            <textarea cols="40" rows="2" name="bs_a[]" id="bs_a[]"><?=$row[bs_a]?></textarea>
            </td>
            <td align="center">
            <a href="?a=<?=$a?>&b=bs_del&bs_id=<?=$row[bs_id]?>" onclick="return confirm('您確定要刪除嗎!?')">刪除</a><br>
            <a href="?a=bs_edit_in.php&bs_id=<?=$row[bs_id]?>">查看商品連結</a>
            </td>
        </tr>
        <? }?>
        <tr align="center">
       	  <td colspan="4"><input type="submit" value="確定修改"></td>
        </tr>
    </table>
</form>
<br><br>