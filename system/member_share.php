<br>
<div align="center">
<img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">會員商品心得分享</font>
</div>
<br><br>
<?
$m_id = $_SESSION[user];


if($_GET[b]=='share_del'){
	$m_id = $_SESSION[user];
	$p_id = $_GET[p_id];
	$share_id = $_GET[share_id];
	
	$h = mysql_fetch_array(mysql_query("select * from m_rshare where share_id='$share_id'"));
	
	mysql_query("delete from m_rshare where share_id='$share_id' and rshare_id='$h[rshare_id]'");
	mysql_query("delete from m_share where share_id='$share_id' and m_id='$m_id' and p_id='$p_id'");
	echo "<script>location.replace('?a=member_share.php&p_id=$p_id')</script>";
}
$f = mysql_num_rows(mysql_query("select * from m_share where m_id='$m_id'"));

if($f>0){
	$ret = mysql_query("select * from m_share where m_id='$m_id'");
	while($share = mysql_fetch_array($ret)){
		$m = mysql_fetch_array(mysql_query("select * from member where m_id='$share[m_id]'"));
?>

<div align="center">
<table>                            	
	<tr>
		<td><img src="icon/media-stop.png"></td>
		<td>主題:</td>
		<td width="250"><?=$share[share_type]?></td>
		<td align="right">
			<? if($share[m_id] == $m_id){?>
				<a href="?a=member_share_edit_1.php&m_id=<?=$m_id?>&share_id=<?=$share[share_id]?>&p_id=<?=$share[p_id]?>"><img src="icon/edit.png"></a>
				<a href="?a=<?=$a?>&m_id=<?=$m_id?>&share_id=<?=$share[share_id]?>&p_id=<?=$share[p_id]?>&b=share_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="icon/trash.png"></a>
			<? }?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>發表者:</td>
   	 	<td colspan="2"><?=$m[m_name]?></td>
	</tr>
	<tr>
		<td></td>
		<td>發表日期:</td>
		<td colspan="2"><?=$share[share_date]?>&nbsp;&nbsp;&nbsp;<?=$share[share_time]?></td>
	</tr>
	<tr>
		<td></td>
		<td>內容:</td>
		<td colspan="2"><?=nl2br($share[share_main])?></td>
	</tr>
    <tr>
    	<td colspan="4"><hr></td>
    </tr>
    <?
	$rsh = mysql_query("select * from m_rshare where share_id=$share[share_id]");
	while($rshh = mysql_fetch_array($rsh)){
	?>
	<tr>
		<td></td>
		<td colspan="3">站長回覆:</td>
	</tr>
	<tr>
		<td></td>
		<td>內容:</td>
		<td colspan="2"><?=nl2br($rshh[rshare_main])?></td>
	</tr>
    <tr>
    	<td colspan="4"><hr></td>
    </tr>
    <? }?>
</table>
</div>
<? }
}else{?>
	<div align="center">
    	<br>
    	此會員尚未分享心得!
    </div>
<? }?>


