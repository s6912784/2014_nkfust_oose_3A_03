<?
if($_GET[b] == 'stype_add'){
	
	$stype_nme = $_REQUEST[stype_name];
	mysql_query("insert into stype value('','$stype_nme')");
	
	echo "<script>location.replace('?a=stype_edit.php')</script>";
}
?>
<br>
<form method="post" action="?a=<?=$a?>&b=stype_add">
	<table border="1" bordercolor="#666666">
    	<tr>
        	<td width="116" align="center">商品系列分類：</td>
            <td width="184"><input type="text" id="stype_name" name="stype_name"></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" value="新增"></td>
        </tr>
    </table>
</form>
<br><br>