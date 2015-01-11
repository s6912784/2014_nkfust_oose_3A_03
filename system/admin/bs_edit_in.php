

<?
$bs_id = $_GET[bs_id];
$rb = mysql_fetch_array(mysql_query("select * from business where bs_id=$bs_id"));?>

<br>

<table width="900">
	<tr>
    	<td align="right" width="540"><img src="pic/star.png"> <font face="華康秀風體W3" size="+2" >商家:<?=$rb[bs_name];?></font></td>
    	<td align="right"><a href="?a=bs_edit.php">回上一頁</a></td>
    </tr>
</table>
<br>
<table border="1" bordercolor="#999999">
	<tr align="center" bgcolor="#FFFFCC">
    	<td width="200" height="30">商品名稱</td>
        <td width="100">系列</td>
        <td width="100">分類</td>
        <td width="100">價格</td>
    </tr>
    <?
	$ret = mysql_query("select * from blink where bs_id=$bs_id");
	while($row = mysql_fetch_array($ret)){
		$rp = mysql_fetch_array(mysql_query("select * from product where p_id='$row[p_id]'"));
		$rs = mysql_fetch_array(mysql_query("select * from stype where stype_id='$rp[stype_id]'"));
		$rt = mysql_fetch_array(mysql_query("select * from type where t_id='$rp[t_id]'"));
		
	?>
    <tr align="center">
    	<td><?=$rp[p_name]?></td>
        <td><?=$rs[stype_name]?></td>
        <td><?=$rt[t_name]?></td>
        <td>NT.<?=$row[b_price]?></td>
    </tr>
    <? }?>
</table>
