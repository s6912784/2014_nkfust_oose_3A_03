<?
if($_GET[b]=='addp'){
	
	$stype_id = $_GET[stype_id];
	$type_id = $_GET[t_id];
	
	$p_na = $_REQUEST[p_name];
	$p_b = $_REQUEST[p_b];
	$p_price = $_REQUEST[p_price];
	$p_color = $_REQUEST[p_color];
	$p_cap = $_REQUEST[p_cap];
	$p_pic = $_FILES[pic][name];
	$p_main = $_REQUEST[p_main];
	$p_user = $_REQUEST[p_user];
	$date = date("Y-m-d");
	
		$p_picupgrade = strchr($p_pic,".");
		echo "<script>alert('$p_picupgrade')</script>";
		if($p_picupgrade == ".jpg" or $p_picupgrade == ".png" or $p_picupgrade == ".jpeg"){
		if($p_pic != ""){
			while(file_exists("product/".$p_pic)){
				$nme = substr($p_pic,0,strlen($p_pic)-4)."1".substr($p_pic,strlen($p_pic)-4);	
			}
			
			mysql_query("insert into product value('','$type_id','$stype_id','$p_na','$p_b','$p_pic','$p_color','$p_main','$p_cap','$p_price','$p_user','','','$date')");
			move_uploaded_file($_FILES[pic][tmp_name],"product/".$p_pic);
			
		
			/*echo "<script>alert('$p_picupgrade')</script>";*/
			/* --圖片格式-- */
			switch ($p_picupgrade){
				case ".png":
					$im = imagecreatefrompng("product/".$p_pic);
					list($im_x,$im_y) = getimagesize("product/".$p_pic);
					$x = min($im_x,$im_y);
					$des = imagecreatetruecolor(80,80);
					imagecopyresized($des,$im,0,0,0,0,80,80,$x,$x);
					$col = imagecolorallocate($des,105,128,128);
					imagestring($des,5,0,60,"LoveButy",$col);
					imagepng($des,"product/s".$p_pic);
					imagedestroy;
					break;
				case ".jpg":
					$im = imagecreatefromjpeg("product/".$p_pic);
					list($im_x,$im_y) = getimagesize("product/".$p_pic);
					$x = min($im_x,$im_y);
					$des = imagecreatetruecolor(80,80);
					imagecopyresized($des,$im,0,0,0,0,80,80,$x,$x);
					$col = imagecolorallocate($des,105,128,128);
					imagestring($des,5,0,60,"LoveButy",$col);
					imagejpeg($des,"product/s".$p_pic);
					imagedestroy;
					break;
				case ".jpeg":
					$im = imagecreatefromjpeg("product/".$p_pic);
					list($im_x,$im_y) = getimagesize("product/".$p_pic);
					$x = min($im_x,$im_y);
					$des = imagecreatetruecolor(80,80);
					imagecopyresized($des,$im,0,0,0,0,80,80,$x,$x);
					$col = imagecolorallocate($des,105,128,128);
					imagestring($des,5,0,60,"LoveButy",$col);
					imagejpeg($des,"product/s".$p_pic);
					imagedestroy;
					break;
			}
			
			
		}
		}else{
			echo "<script>alert('上傳圖片檔案不正確')</script>";
			echo "<script>location.replace('?a=product_add.php')</script>";
		}
	echo "<script>location.replace('?a=product_edit.php&stype_id=$_GET[stype_id]&t_id=$_GET[t_id]')</script>";
}

?>


<br><br>

<form action="?a=<?=$a?>&b=addp&stype_id=<?=$_GET[stype_id]?>&t_id=<?=$_GET[t_id]?>" method="post" enctype="multipart/form-data">
	<select id="stype_id" name="stype_id" onchange="location.replace('?a=<?=$a?>&stype_id='+this.value)">
    	<option value="">---請選擇---</option>
		<?
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[stype_id]?>" <? if($row[stype_id] == $_GET[stype_id]) echo "selected";?>><?=$row[stype_name]?></option>
        <? }?>
    </select>
    
    <?
		if($_GET[stype_id] != ""){?>
		<select id="t_id" name="t_id" onchange="location.replace('?a=<?=$a?>&stype_id=<?=$_GET[stype_id]?>&t_id='+this.value)">
    		<option value="">---請選擇---</option>
			<?
			$ret = mysql_query("select * from type where stype_id = $_GET[stype_id]");
			while($row = mysql_fetch_array($ret)){?>
        		<option value="<?=$row[t_id]?>" <? if($row[t_id] == $_GET[t_id]) echo "selected";?>><?=$row[t_name]?></option>
        	<? }?>
    	</select>		
	<?	}?>
    
    <br><br>
    <? 
	if($_GET[t_id] != ""){?>
    <table border="2" bordercolor="#666666">
    	<tr>
        	<td>商品名稱</td>
            <td><input type="text" id="p_name" name="p_name"></td>
        </tr>
        <tr>
        	<td>商品品牌</td>
            <td><input type="text" id="p_b" name="p_b"></td>
        </tr>
        <tr>
        	<td>商品價格</td>
            <td><input type="text" id="p_price" name="p_price"></td>
        </tr>
        <tr>
        	<td>商品色號</td>
            <td><input type="text" id="p_color" name="p_color"></td>
        </tr>
        <tr>
        	<td>商品容量</td>
            <td><input type="text" id="p_cap" name="p_cap"></td>
        </tr>
        <tr>
        	<td>上傳圖片</td>
            <td><input type="file" id="pic" name="pic"></td>
        </tr>
        <tr>
        	<td>商品介紹</td>
            <td>
            <textarea id="p_main" name="p_main" cols="50" rows="5"></textarea>
            </td>
        </tr>
        <tr>
        	<td>商品使用方式</td>
            <td>
            <textarea id="p_user" name="p_user" cols="50" rows="5"></textarea>
            </td>
        </tr>
        <tr align="center">
        	<td colspan="2">
            <input type="submit" value="確定新增">
            </td>
        </tr>
    </table>
    <? }?>
</form>