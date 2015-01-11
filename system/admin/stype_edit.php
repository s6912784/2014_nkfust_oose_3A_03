<?
if($_GET[b]=='edit'){
	for($i=0;$i<count($_REQUEST[stype_id]);$i++){
		$stype_id = $_REQUEST[stype_id][$i];
		$stype_name = $_REQUEST[stype_name][$i];
		
		mysql_query("update stype set stype_name='$stype_name' where stype_id='$stype_id'");
		/*echo "<script>alert('$stype_name')</script>";*/
		
	}
	echo "<script>location.replace('?a=stype_edit.php')</script>";
}
if($_GET[b]=='stype_del'){
	
	$stype_id = $_GET[stype_id];
	
	$r = mysql_query("select * from type where stype_id ='$stype_id'");
	
	if(mysql_num_rows($r)>0){
		echo "<script>alert('尚有與商品分類未刪除!!!!')</script>";
	}else{	
		mysql_query("delete from stype where stype_id='$stype_id'");
	}
	
	/*echo "<script>alert($stype_id)</script>";	*/
    echo "<script>location.replace('?a=stype_edit.php')</script>";
}
?>
<br>
<form action="?a=<?=$a?>&b=edit" method="post">
    <table border="1" bordercolor="#333333">
    	<tr align="center">
        	<td width="100">編號</td>
            <td width="200">商品系列分類</td>
            <td width="">編輯</td>
        </tr>
        <? 
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        <tr>
        	<td align="center"><?=$row[stype_id]?><input type="hidden" id="stype_id[]" name="stype_id[]" value="<?=$row[stype_id]?>"></td>
            <td><input type="text" id="stype_name[]" name="stype_name[]" value="<?=$row[stype_name]?>"></td>
        	<td align="center">
            <a href="?a=<?=$a?>&b=stype_del&stype_id=<?=$row[stype_id]?>" onclick="return confirm('您確定要刪除嗎!?')">刪除</a>
            </td>
        </tr>
        <? }?>
        <tr align="center">
       	  <td colspan="3"><input type="submit" value="確定修改"></td>
        </tr>
    </table>
</form>
<br><br>