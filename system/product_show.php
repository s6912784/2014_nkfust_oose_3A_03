<style>
#picshow{width:110px;
	     height:100px;
		 border:1px solid #666;
}
</style>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<img src="pic/a1.png" width="30" height="32">
<font size="+0.5">
<strong>&nbsp;產品瀏覽</strong>&nbsp;
</font>
<select id="stype_id" name="stype_id" onchange="location.replace('?a=<?=$a?>&stype_id='+this.value)">
    	<option value="">---請選擇---</option>
		<?
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[stype_id]?>" <? if($row[stype_id] == $_GET[stype_id]) echo "selected";?>><?=$row[stype_name]?></option>
        <? }?>
    </select>
    
    <? if($_GET[stype_id] != ""){?>
    	<select id="t_id" name="t_id" onchange="location.replace('?a=<?=$a?>&stype_id=<?=$_GET[stype_id]?>&t_id='+this.value)">
    		<option value="">---請選擇---</option>
			<?
			$ret1 = mysql_query("select * from type where stype_id='$_GET[stype_id]'");
			while($row1 = mysql_fetch_array($ret1)){?>
        		<option value="<?=$row1[t_id]?>" <? if($row1[t_id] == $_GET[t_id]) echo "selected";?>><?=$row1[t_name]?></option>
        <? }?>
    	</select>

    <? }?>

<br><br>
<table>
	<tr align="center">
    <?
	if($_GET[stype_id] == ""){
		$k = 0;
		$r_p = mysql_query("select * from product");
		while($r = mysql_fetch_array($r_p)){
			$k++;
			if($k>5){
				$k = 1;
				echo "</tr><tr>";
			}
			?>
            <td width="150" align="center">
           		<div id="picshow">
            		<a href="?a=product_show_in.php&p_id=<?=$r[p_id]?>"><img src="admin/product/s<?=$r[p_pic]?>" border="0"></a><br><br>
                </div>
                <table>
                	<tr>
                    	<td height="30" align="center">
                        <font size="-2"><?=$r[p_name]?></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="10" align="center">
                        定價：<font size="+1" color="#FF0000" style="text-decoration:line-through;"><strong><?=$r[p_price]?></strong></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="5" align="center">
                        <?
						$p = mysql_num_rows(mysql_query("select * from blink where p_id='$r[p_id]'"));
						$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$r[p_id]' order by b_price limit 1"));
						if($p > 0){?>
							最低售價：<?=$rt[b_price]?>
						<? }else{?>
							最低售價：<?=$r[p_price]?>
						<? }?>
                        </td>
                    </tr>
                </table>
                <br>
            </td>
		
		<? }
	}else{
		if($_GET[stype_id] != "" and $_GET[t_id] == ""){
			$k = 0;
			$r_p = mysql_query("select * from product where stype_id='$_GET[stype_id]'");
			while($r = mysql_fetch_array($r_p)){
				$k++;
				if($k>5){
					$k = 1;
					echo "</tr><tr>";
				}?>
                <td width="150" align="center">
           		<div id="picshow">
            		<a href="?a=product_show_in.php&p_id=<?=$r[p_id]?>"><img src="admin/product/s<?=$r[p_pic]?>" border="0"></a><br><br>
                </div>
                <table>
                	<tr>
                    	<td height="30" align="center">
                        <font size="-2"><?=$r[p_name]?></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="10" align="center">
                        定價：<font size="+1" color="#FF0000" style="text-decoration:line-through;"><strong><?=$r[p_price]?></strong></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="5" align="center">
                        <?
						$p = mysql_num_rows(mysql_query("select * from blink where p_id='$r[p_id]'"));
						$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$r[p_id]' order by b_price limit 1"));
						if($p > 0){?>
							最低售價：<?=$rt[b_price]?>
						<? }else{?>
							最低售價：<?=$r[p_price]?>
						<?}?>
                        </td>
                    </tr>
                </table>
            	</td>
			 <? }?>
    
    
    <? }else{
		if($_GET[stype_id] != "" and $_GET[t_id] != ""){
			$k = 0;
			$r_p = mysql_query("select * from product where stype_id='$_GET[stype_id]' and t_id='$_GET[t_id]'");
			while($r = mysql_fetch_array($r_p)){
				$k++;
				if($k>5){
					$k = 1;
					echo "</tr><tr>";
				}?>
                <td width="150" align="center">
           		<div id="picshow">
            		<a href="?a=product_show_in.php&p_id=<?=$r[p_id]?>"><img src="admin/product/s<?=$r[p_pic]?>" border="0"></a><br><br>
                </div>
                <table>
                	<tr>
                    	<td height="30" align="center">
                        <font size="-2"><?=$r[p_name]?></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="10" align="center">
                        定價：<font size="+1" color="#FF0000" style="text-decoration:line-through;"><strong><?=$r[p_price]?></strong></font>
                        </td>
                    </tr>
                    <tr>
                    	<td height="5" align="center">
                        <?
						$p = mysql_num_rows(mysql_query("select * from blink where p_id='$r[p_id]'"));
						$rt = mysql_fetch_array(mysql_query("select * from blink where p_id='$r[p_id]' order by b_price limit 1"));
						if($p > 0){?>
							最低售價：<?=$rt[b_price]?>
						<? }else{?>
							最低售價：<?=$r[p_price]?>
						<?}?>
                        </td>
                    </tr>
                </table>
            	</td>
			 <? }?>
		<? }}}?>
    </tr>
</table>
</form>