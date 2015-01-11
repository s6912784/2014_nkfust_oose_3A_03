<table border="1" bordercolor="#FFFFFF">
    <tr>
	<?
    $k = 0;
    $shna = $_REQUEST[shna];
    $ro = mysql_query("select * from product where p_name like '%$shna%'");
        if(mysql_num_rows($ro)>0){
            while($roo = mysql_fetch_array($ro)){
				$k++;
				if($k>5){
					$k = 1;
					echo "</tr><tr>";
				}?>
				<td width="150" align="center">
				<div id="picshow">
				<a href="?a=product_show_in.php&t_id=<?=$roo[t_id]?>&stype_id=<?=$roo[stype_id]?>&p_id=<?=$roo[p_id]?>"><img src="admin/product/s<?=$roo[p_pic]?>" border="0"></a><br>
				<br>
				</div>
				<div style="width:110px; height:80px;" align="left">
				<font size="-1">
				<?=$roo[p_name]?><br>
				價格：<?=$roo[p_price]?><br>
                <?
                $p = mysql_num_rows(mysql_query("select * from blink where p_id='$roo[p_id]'"));
				$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$roo[p_id]' order by b_price limit 1"));
				if($p > 0){?>
                	最低售價：<?=$rt[b_price]?>
				<? }else{?>
					最低售價：<?=$roo[p_price]?>
				<? }?>
				</div>
				<br>
				</td>
                <? }
        }else{?>
            <td>很抱歉!!!並沒有搜尋到有<font color="#FF0000" size="+1"><strong><?=$shna?></strong></font>關鍵字的產品名稱!!!!</td>
        <? }?>
	</tr>
</table>