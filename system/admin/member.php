
<br><br>

<table width="900">
	<tr>
    	<td align="right" width="540"><img src="pic/star.png"> <font face="華康秀風體W3" size="+3" >管理會員</font></td>
    	<td align="right"><a href="?a=member_add.php">新增會員</a></td>
    </tr>
</table>

<?
if($_GET[b]=='edit'){
	for($f=0;$f<count($_REQUEST[m_id]);$f++){
		$m_id = $_REQUEST[m_id][$f];	
		$m_na = $_REQUEST[na][$f];
		$m_acc = $_REQUEST[acc][$f];
		$m_pwd = $_REQUEST[pwd][$f];
		$m_bri = $_REQUEST[bri][$f];
		$m_ea = $_REQUEST[ea][$f];
		mysql_query("update member set m_name='$m_na',m_acc='$m_acc',m_pwd='$m_pwd',m_bri='$m_bri',m_email='$m_ea' where m_id='$m_id'");	
		/*echo "<script>alert('$m_id')</script>";*/
	}
}
if($_GET[b]=='del'){
	$m_id = $_GET[m_id];
	mysql_query("delete from member where m_id='$m_id'");
}
?>
<br><br>
<font size="-1">
<div align="center">
<br><br>
<form action="?a=<?=$a?>&b=edit" method="post">
<table border="1" bordercolor="#666666">
	<tr align="center">
    	<td>編號</td>
        <td>姓名</td>
        <td>帳號</td>
        <td>密碼</td>
        <td>生日</td>
        <td>電子信箱</td>
        <td>刪除</td>
    </tr>
    <?
	$ret = mysql_query("select * from member");
	while($row = mysql_fetch_array($ret)){?>
    <tr>
    	<td align="center">
		<?=$row[m_id]?>
        <input type="hidden" id="m_id[]" name="m_id[]" value="<?=$row[m_id]?>">
        </td>
        <td><input type="text" id="na[]" name="na[]" value="<?=$row[m_name]?>" size="9"></td>
        <td><input type="text" id="acc[]" name="acc[]" value="<?=$row[m_acc]?>" size="9"></td>
        <td><input type="password" id="pwd[]" name="pwd[]" value="<?=$row[m_pwd]?>" size="9"></td>
        <td><input type="text" id="bri[]" name="bri[]" value="<?=$row[m_bri]?>" size="9"></td>
        <td><input type="text" id="ea[]" name="ea[]" value="<?=$row[m_email]?>" size="20"></td>
        <td><a href="?a=<?=$a?>&m_id=<?=$row[m_id]?>&b=del" onClick="return confirm('您確定要刪除嗎!?')">刪除</a></td>
    </tr>
    <? }?>
    <tr>
    	<td colspan="7" align="center"><input type="submit" value="確定修改"></td>
    </tr>
</table>
</form>
</div>
</font>