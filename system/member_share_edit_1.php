<?
$m_id = $_SESSION[user];

$p_id = $_GET[p_id];
$share_id = $_GET[share_id];
$ret = mysql_fetch_array(mysql_query("select * from m_share where m_id='$m_id' and share_id='$share_id'"));


if($_GET[b]=='m_share_edit'){
	$p_id = $_GET[p_id];
	$share_id = $_GET[share_id];
	
	$share_type = $_REQUEST[share_type];
	$share_main = $_REQUEST[share_main];
	$date = date("Y-m-d");
	$time = date("H:i:s");
	
	mysql_query("update m_share set share_type='$share_type',share_main='$share_main',share_time='$time',share_date='$date' where share_id='$share_id' and p_id='$p_id' and m_id='$m_id'");
	echo "<script>location.replace('?a=member_share.php&p_id=$p_id')</script>";
	
	
}


?>
<br><br>
<form action="?a=<?=$a?>&b=m_share_edit&p_id=<?=$p_id?>&share_id=<?=$share_id?>" method="post">
<table>
	<tr>
		<td colspan="2" height="50"><img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">編輯評論</font></td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
	<tr>
		<td width="50">主題:</td>
        <td>
        	<input type="hidden" id="share_id" name="share_id" value="<?=$ret[share_id]?>">
            <input type="text" id="share_type" name="share_type" value="<?=$ret[share_type]?>">
        </td>
	</tr>
    <tr>
        <td width="50">內容:</td>
        <td><textarea id="share_main" name="share_main" cols="80" rows="10"><?=$ret[share_main]?></textarea></td>
    </tr>
    <tr align="center">
        <td colspan="2" height="40"><input type="submit" value="確定送出"></td>
	</tr>
</table>
 </form>