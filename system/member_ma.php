
<?
$m_id = $_SESSION[user];

$ret = mysql_fetch_array(mysql_query("select * from member where m_id='$m_id'"));


if($_GET[b]=='edit'){
	$acc = $_REQUEST[acc];
	$pwd = $_REQUEST[pwd];
	$na = $_REQUEST[na];
	$ea = $_REQUEST[email];
	$bri = $_REQUEST[bri];
	
	mysql_query("update member set m_name='$na',m_acc='$acc',m_pwd='$pwd',m_bri='$bri',m_email='$ea' where m_id='$m_id'");
	echo "<script>location.replace('?a=member_ma.php')</script>";
	
	
}
?>
<br>
<div align="center">
	<img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">會員基本資訊</font><br><br>
    	
        <form action="?a=<?=$a?>&b=edit" method="post">
            <table border="1" width="450">
        		<tr>
                	<td width="100" align="center">帳號：</td>
                    <td>
					<?=$ret[m_acc]?>
                    <input type="hidden" id="acc" value="<?=$ret[m_acc]?>" name="acc">
                    </td>
                </tr>
                <tr>
                	<td align="center">密碼：</td>
                    <td><input id="pwd" value="<?=$ret[m_pwd]?>" type="password" name="pwd"></td>
                </tr>
                <tr>
                	<td align="center">姓名：</td>
                    <td><input id="na" value="<?=$ret[m_name]?>" type="text" name="na"></td>
                </tr>
                <tr>
                	<td align="center">E-mail：</td>
                    <td><input id="email" value="<?=$ret[m_email]?>" size="40" type="text" name="email"></td>
                </tr>
                <tr>
                	<td align="center">生日：</td>
                    <td><input id="bri" value="<?=$ret[m_bri]?>" type="text" name="bri"></td>
                </tr>
                <tr align="center">
                	<td colspan="2"><input type="submit" value="確定修改"></td>
                </tr>
        	</table>
        </form>
        <br><br>
</div>