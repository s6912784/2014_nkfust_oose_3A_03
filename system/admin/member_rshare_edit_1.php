<?

$share_id = $_GET[share_id];
$rshare_id = $_GET[rshare_id];
$m_id = $_GET[m_id];
$ret = mysql_fetch_array(mysql_query("select * from m_rshare where rshare_id='$rshare_id'"));


if($_GET[b]=='m_share_edit'){
	$p_id = $_GET[p_id];
	$share_id = $_GET[share_id];
	$rshare_id = $_GET[rshare_id];

	$rshare_main = $_REQUEST[rshare_main];
	$date = date("Y-m-d");
	$time = date("H:i:s");
	
	mysql_query("update m_rshare set rshare_main='$rshare_main',rshare_time='$time',rshare_date='$date' where share_id='$share_id' and rshare_id='$rshare_id'");
	echo "<script>location.replace('?a=member_share.php&m_id=$m_id')</script>";
	
	
}


?>
<br><br>
<form action="?a=<?=$a?>&b=m_share_edit&m_id=<?=$m_id?>&p_id=<?=$p_id?>&share_id=<?=$share_id?>&rshare_id=<?=$rshare_id?>" method="post">
<table>
	<tr>
		<td colspan="2" height="50"><img src="../icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">編輯回覆評論</font></td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
    <tr>
        <td width="50">內容:</td>
        <td>
        	<textarea id="rshare_main" name="rshare_main" cols="80" rows="10"><?=$ret[rshare_main]?></textarea>
        	<input type="hidden" id="rshare_id" name="rshare_id" value="<?=$ret[rshare_id]?>">
        </td>
    </tr>
    <tr align="center">
        <td colspan="2" height="40"><input type="submit" value="確定送出"></td>
	</tr>
</table>
 </form>