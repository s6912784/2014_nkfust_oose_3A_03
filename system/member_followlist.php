<?
$m_id = $_SESSION[user];
//echo $m_id;

if($_GET[b]=='del'){
	$f_id = $_GET[f_id];
	
	mysql_query("delete from m_followlist where f_id='$f_id' and m_id='$m_id'");
    echo "<script>location.replace('?a=member_followlist.php')</script>";
}
?>
<br>
<div align="center">
<img src="icon/contacts.png">&nbsp;<font size="+2" face="華康粗圓體" color="#333333">會員追蹤商品</font>
</div>
<br><br>

<?
$r = mysql_num_rows(mysql_query("select * from m_followlist where m_id='$m_id'"));

if($r>0){
?>
<table align="center" width="700">
	<tr align="center">
    	<td>商品圖片</td>
        <td width="200">商品名稱</td>
        <td>商品系列</td>
        <td>商品分類</td>
        <td>商品最低價商家</td>
        <td>商品最低價</td>
        <td>編輯</td>
    </tr>
    <tr align="center">
    	<td colspan="7"><hr></td>
    </tr>
    <?
	$ret = mysql_query("select * from m_followlist where m_id='$m_id'");
	while($row = mysql_fetch_array($ret)){
		$p = mysql_fetch_array(mysql_query("select * from product where p_id='$row[p_id]'"));
		$s = mysql_fetch_array(mysql_query("select * from stype where stype_id='$p[stype_id]'"));
		$t = mysql_fetch_array(mysql_query("select * from type where t_id='$p[t_id]'"));
		$b = mysql_fetch_array(mysql_query("select * from blink where p_id='$row[p_id]' order by b_price limit 1"));
		$bs = mysql_fetch_array(mysql_query("select * from business where bs_id='$b[bs_id]'"));
		?>
	<tr align="center">
    	<td><a href="?a=product_show_in.php&p_id=<?=$row[p_id]?>"><img src="admin/product/s<?=$p[p_pic]?>"></a></td>
        <td><?=$p[p_name]?></td>
        <td><?=$s[stype_name]?></td>
        <td><?=$t[t_name]?></td>
        <td>
        <?
		$bb = mysql_query("select * from blink where p_id='$row[p_id]' order by b_price limit 1");
		if(mysql_num_rows($bb) > 0){
		?>
            <a href="<?=$b[b_a]?>" target="_new"><?=$bs[bs_name]?></a>
        <? }else{?>
        	尚未新增<br>最低價商家!
        <? }?>
        </td>
        <td>
        <?
		$bb = mysql_query("select * from blink where p_id='$row[p_id]' order by b_price limit 1");
		if(mysql_num_rows($bb) > 0){
		?>
            NT.<?=$b[b_price]?>
        <? }else{?>
        	無!
        <? }?>
        </td>
        <td><a href="?a=<?=$a?>&f_id=<?=$row[f_id]?>&b=del"><img src="icon/trash.png" onclick="return confirm('您確定要刪除嗎!?')"></a></td>
    </tr>
    <? }?>
</table>

<? }else{?>
	<div align="center">
		此會員尚未有追蹤清單!
	</div>
	
<? }?>