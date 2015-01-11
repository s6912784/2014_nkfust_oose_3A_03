<?
$share_id = $_GET[share_id];
$m_id = $_GET[m_id];


if($_GET[b]=='m_rshare_add'){
	$share_id = $_GET[share_id];
	$m_id = $_GET[m_id];
	$p_id = $_GET[p_id];
	
	$rshare_main = $_REQUEST[rshare_main];
	$date = date("Y-m-d");
	$time = date("H:i:s");
	//$picc = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
	
	mysql_query("insert into m_rshare value('','$share_id','$rshare_main','$time','$date')");
	echo "<script>location.replace('?a=member_share.php&m_id=$m_id')</script>";
}
$rm = mysql_fetch_array(mysql_query("select * from member where m_id='$_GET[m_id]'"));
$rp = mysql_fetch_array(mysql_query("select * from m_share where m_id='$_GET[m_id]'"));
$r = mysql_fetch_array(mysql_query("select * from product where p_id='$rp[p_id]'"));

?>
<br><br>
<form action="?a=<?=$a?>&b=m_rshare_add&p_id=<?=$p_id?>&share_id=<?=$share_id?>&m_id=<?=$m_id?>" method="post">
<table>
	<tr>
		<td colspan="2" height="50"><img src="../icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">回覆評論</font></td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
	<tr>
		<td width="50">商品:</td>
        <td>
            <?=$rm[m_name]?> > <?=$r[p_name]?>
        </td>
	</tr>
    <tr>
        <td width="50">內容:</td>
        <td><textarea id="rshare_main" name="rshare_main" cols="80" rows="10"></textarea></td>
    </tr>
    <tr align="center">
        <td colspan="2" height="40"><input type="submit" value="確定送出"></td>
	</tr>
</table>
 </form>