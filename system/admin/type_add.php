<?
if($_GET[b] == 'add'){
	
	$type_nme = $_REQUEST[type_name];
	$stype_id = $_REQUEST[stype_id];
	mysql_query("insert into type value('',$stype_id,'$type_nme')");
	
	echo "<script>location.replace('?a=type_edit.php&stype_id=$stype_id')</script>";
}
?>

<br><br>
<form method="post" action="?a=<?=$a?>&b=add">
<select id="stype_id" name="stype_id" onchange="location.replace('?a=<?=$a?>&stype_id='+this.value)">
    	<option value="">---請選擇---</option>
		<?
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[stype_id]?>" <? if($row[stype_id] == $_GET[stype_id]) echo "selected";?>><?=$row[stype_name]?></option>
        <? }?>
    </select><br><br>
    <? if($_GET[stype_id] != ""){?>
<table border="1" bordercolor="#666666">
    	<tr>
        	<td width="100" align="center">分類：</td>
            <td width="200"><input type="text" id="type_name" name="type_name"></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" value="新增"></td>
        </tr>
    </table>
    <? }?>
</form><br>
