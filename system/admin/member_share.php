
<?
if($_GET[b]=='share_del'){
	$p_id = $_GET[p_id];
	$m_id = $_GET[m_id];
	$share_id = $_GET[share_id];
	
	$ff = mysql_num_rows(mysql_query("select * from m_rshare where share_id=$share_id"));
	if($ff>0){
		mysql_query("delete from m_rshare where share_id='$share_id'");
		mysql_query("delete from m_share where share_id='$share_id'");
		echo "<script>location.replace('?a=member_share.php&m_id=$m_id')</script>";
	}else{
		mysql_query("delete from m_share where share_id='$share_id'");
		echo "<script>location.replace('?a=member_share.php&m_id=$m_id')</script>";
	}
	
	
}
if($_GET[b]=='rshare_del'){
	$p_id = $_GET[p_id];
	$m_id = $_GET[m_id];
	$share_id = $_GET[share_id];
	$rshare_id = $_GET[rshare_id];
	
	mysql_query("delete from m_rshare where rshare_id='$rshare_id'");
	echo "<script>location.replace('?a=member_share.php&m_id=$_GET[m_id]')</script>";
}


?>

<br><br>
<select id="m_id" name="m_id" onchange="location.replace('?a=<?=$a?>&m_id='+this.value)">
    	<option value="">-----請選擇-----</option>
		<?
		$ret = mysql_query("select * from member");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[m_id]?>" <? if($row[m_id] == $_GET[m_id]) echo "selected";?>><?=$row[m_acc]?>(<?=$row[m_name]?>)</option>
        <? }?>
</select>
<br><br>

<? 

$rf = mysql_num_rows(mysql_query("select * from m_share where m_id='$_GET[m_id]'"));

if($_GET[m_id] != ""){
	if($rf >0){

$ret = mysql_query("select * from m_share where m_id='$_GET[m_id]'");
while($share = mysql_fetch_array($ret)){
	$m = mysql_fetch_array(mysql_query("select * from member where m_id='$_GET[m_id]'"));
?>
	<div align="center">
	<table>                            	
		<tr>
			<td><img src="../icon/media-stop.png"></td>
			<td>主題:</td>
			<td width="250"><?=$share[share_type]?></td>
			<td align="right">
				<?
				$ff = mysql_num_rows(mysql_query("select * from m_rshare where share_id=$share[share_id]"));
				if($ff>0){?>
					<a href="?a=<?=$a?>&m_id=<?=$_GET[m_id]?>&share_id=<?=$share[share_id]?>&p_id=<?=$share[p_id]?>&b=share_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="../icon/trash.png"></a>
				<? }else{?>
                <a href="?a=member_rshare_edit.php&m_id=<?=$_GET[m_id]?>&share_id=<?=$share[share_id]?>&rshare_id=<?=$fh[rshare_id]?>"><img src="../icon/edit.png"></a>
                <a href="?a=<?=$a?>&m_id=<?=$_GET[m_id]?>&share_id=<?=$share[share_id]?>&p_id=<?=$share[p_id]?>&b=share_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="../icon/trash.png"></a>
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
    		<td colspan="4" align="center"><hr style="border:1px dotted #333; width:250px; text-align:center;"></td>
    	</tr>
        
        <?
        $ff = mysql_num_rows(mysql_query("select * from m_rshare where share_id=$share[share_id]"));
		if($ff > 0){
			$f = mysql_query("select * from m_rshare where share_id='$share[share_id]'");
			while($fh = mysql_fetch_array($f)){
			?>
			<tr>
				<td><img src="../icon/media-stop.png"></td>
				<td colspan="2">站長回覆內容:</td>
				<td align="right">
					<a href="?a=member_rshare_edit_1.php&m_id=<?=$share[m_id]?>&share_id=<?=$share[share_id]?>&rshare_id=<?=$fh[rshare_id]?>"><img src="../icon/edit.png"></a>
					<a href="?a=<?=$a?>&m_id=<?=$_GET[m_id]?>&share_id=<?=$share[share_id]?>&p_id=<?=$share[p_id]?>&rshare_id=<?=$fh[rshare_id]?>&b=rshare_del" onclick="return confirm('您確定要刪除嗎!?')"><img src="../icon/trash.png"></a>
				</td>
			</tr>
            <tr>
				<td></td>
				<td colspan="3"><?=nl2br($fh[rshare_main])?></td>
			</tr>
            <tr>
    		<td colspan="4"><hr></td>
    	</tr>
		<? }}
		?>
	</table>
	</div>
<? }}else{
	 echo "所選會員目前無回覆的主題!";
	}

}else{
	echo "請選擇!";	
}?>


