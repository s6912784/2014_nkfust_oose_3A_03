<?
if($_GET[b] == 'bsadd'){
	
	$bs_name = $_REQUEST[bs_name];
	$bs_a = $_REQUEST[bs_a];
	mysql_query("insert into business value('','$bs_name','$bs_a')");
	
	echo "<script>location.replace('?a=bs_edit.php')</script>";
}
?>
<br>
<form method="post" action="?a=<?=$a?>&b=bsadd">
	<table border="1" bordercolor="#666666">
    	<tr>
        	<td width="116" align="center">商家名稱：</td>
            <td width="184"><input type="text" id="bs_name" name="bs_name"></td>
        </tr>
        <tr>
        	<td width="116" align="center">商家連結：</td>
            <td>
            <textarea cols="50" rows="2" name="bs_a" id="bs_a"></textarea>
            </td>
        </tr>
        
        <tr>
        	<td colspan="2" align="center"><input type="submit" value="新增"></td>
        </tr>
    </table>
</form>
<br><br>