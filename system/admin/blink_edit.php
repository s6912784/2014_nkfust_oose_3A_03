<?
$ret = mysql_query("select * from blink");
while($row = mysql_fetch_array($ret)){
	$ff = mysql_fetch_array(mysql_query("select * from product where p_id='$row[p_id]'"));		
/*	
?>

	<?=$row[bs_id]?>
    
    <?=$ff[p_name]?>
    
<br>
<? */}?>
<br><br>
<form action="" method="post">
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
    <?
	if($_GET[stype_id] == ""){?>
    	<table border="1" bordercolor="#999999">
        	<tr align="center" bgcolor="#FFCCCC">
            	<td width="100">商品圖片</td>
                <td width="200">商品名稱</td>
                <td width="150">編輯</td>
            </tr>
		<? $r_p = mysql_query("select * from product");
			while($r = mysql_fetch_array($r_p)){?>
            <tr align="center">
            	<td><img src="product/s<?=$r[p_pic]?>"></td>
                <td><?=$r[p_name]?></td>
                <td>
                
                <? 
				$rf = mysql_query("select * from blink where p_id ='$r[p_id]'");
				$checkrf = mysql_num_rows($rf);
				if($checkrf > 0){
				?>
                	<a href="?a=bs_p_edit.php&p_id=<?=$r[p_id]?>">編輯商家連結</a>
                
                <? }else{?>
                	尚未有與商家有所連結
                <? }?>
                
                </td>
            </tr>
        
		
		<? }?>
    	</table>
		<br>
	<? }else{
		if($_GET[stype_id] != "" and $_GET[t_id] == ""){?>
        	<table border="1" bordercolor="#999999">
        		<tr align="center" bgcolor="#FFCCCC">
            		<td width="100">商品圖片</td>
                	<td width="200">商品名稱</td>
               		<td width="150">編輯</td>
            	</tr>
        		<? $r_p = mysql_query("select * from product where stype_id='$_GET[stype_id]'");
			   		while($r = mysql_fetch_array($r_p)){?>
                    <tr align="center">
            			<td><img src="product/s<?=$r[p_pic]?>"></td>
                		<td><?=$r[p_name]?></td>
                		<td>
                        <? 
						$rf = mysql_query("select * from blink where p_id ='$r[p_id]'");
						$checkrf = mysql_num_rows($rf);
						if($checkrf > 0){?>
                			<a href="?a=bs_p_edit.php&p_id=<?=$r[p_id]?>">編輯商家連結</a>
                
                		<? }else{?>
                			尚未有與商家有所連結
               			<? }?>
                		</td>
            		</tr>
		
	<? }?>
			</table>
            <br>	
	<? }else{
		if($_GET[stype_id] != "" and $_GET[t_id] != ""){?>
			<table border="1" bordercolor="#999999">
        		<tr align="center" bgcolor="#FFCCCC">
            		<td width="100">商品圖片</td>
                	<td width="200">商品名稱</td>
               		<td width="200">編輯</td>
            	</tr>
			<? $r_p = mysql_query("select * from product where stype_id='$_GET[stype_id]' and t_id='$_GET[t_id]'");
			   while($r = mysql_fetch_array($r_p)){?>
			    	<tr align="center">
            			<td><img src="product/s<?=$r[p_pic]?>"></td>
                		<td><?=$r[p_name]?></td>
                		<td>
                		
                        <? 
						$rf = mysql_query("select * from blink where p_id ='$r[p_id]'");
						$checkrf = mysql_num_rows($rf);
						if($checkrf > 0){?>
                			<a href="?a=bs_p_edit.php&p_id=<?=$r[p_id]?>">編輯商家連結</a>
                
                		<? }else{?>
                			尚未有與商家有所連結
               			<? }?>
                        
                		</td>
            		</tr>
			<? }?>
    		</table>
            <br>
	<? }}}　?>
    
</form>


