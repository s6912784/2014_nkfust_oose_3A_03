<style>
#picadd{width:400px;
		top:300px;
		right:400px;
	    border:1px dashed #000;
	    background:#effbe2;
}
</style>

<?
$p_id = $_GET[p_id];
$row = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));

$rf = mysql_fetch_array(mysql_query("select * from stype where stype_id='$row[stype_id]'"));

$rff = mysql_fetch_array(mysql_query("select * from type where t_id='$row[t_id]'"));

if($_GET[b]=='updp'){
	
	//$stype_id = $row[stype_id];
	
	$type_id = $_REQUEST[t_id];
	
	$rs = mysql_fetch_array(mysql_query("select * from type where t_id='$type_id'"));
	
	$stype_id = $rs[stype_id];
	
	$p_id = $_GET[p_id];
	
	$p_name = $_REQUEST[p_name];
	$p_b = $_REQUEST[p_b];
	$p_price = $_REQUEST[p_price];
	$p_color = $_REQUEST[p_color];
	$p_cap = $_REQUEST[p_cap];
	$p_main = $_REQUEST[p_main];
	$p_user = $_REQUEST[p_user];
	$date = date("Y-m-d");
	
	/*echo "<script>alert('$p_id')</script>";	*/
	mysql_query("update product set stype_id='$stype_id',t_id='$type_id', p_name='$p_name',p_b='$p_b',p_price='$p_price',p_color='$p_color',p_capacity='$p_cap',p_main='$p_main',p_use='$p_user',p_date='$date' where p_id='$p_id'");
	
	echo "<script>location.replace('?a=product_edit_in.php&p_id=$p_id')</script>";

}


/* 上傳圖片修改*/
if($_GET[b]=='editpic1'){
	$p_id = $_GET[p_id];
	$p_pic = $_FILES[pic][name];
	
		$p_picupgrade = strchr($p_pic,".");
		echo "<script>alert('$p_picupgrade')</script>";
		if($p_picupgrade == ".jpg" or $p_picupgrade == ".png" or $p_picupgrade == ".jpeg"){
		if($p_pic != ""){
			while(file_exists("product/".$p_pic)){
				$nme = substr($p_pic,0,strlen($p_pic)-4)."1".substr($p_pic,strlen($p_pic)-4);	
			}
			
			mysql_query("update product set p_pic='$p_pic' where p_id='$p_id'");
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
			echo "<script>location.replace('?a=product_edit_in.php&p_id=$p_id')</script>";
		}
	echo "<script>location.replace('?a=product_edit_in.php&p_id=$p_id')</script>";
}

/* 圖片修改層*/
if($_GET[b]=='editpic'){
	$p_id=$_GET[p_id];
	$op = mysql_fetch_array(mysql_query("select * from product where p_id='$p_id'"));
	?>
	<div align="center">
    <form action="?a=<?=$a?>&p_id=<?=$_GET[p_id]?>&b=editpic1" enctype="multipart/form-data" method="post">
    <div id="picadd" style="position:absolute;">
    產品名稱：<?=$op[name]?><br>
    修改產品圖片：<input type="file" id="pic" name="pic"><br><br>
    <input type="submit" value="確定修改上傳">
    
    <a href="?a=product_edit_in.php&p_id=<?=$_GET[p_id]?>">關閉</a>
    </div>
    </form>
    
    </div>
<?
}
/*
if($_GET[b]==ff){
	echo "<script>alert('$_REQUEST[t_id]')</script>";	
}*/
?>

    <br><div align="left">
    *現在位置&nbsp;<font color="#6699CC"><?=$rf[stype_name]?></font> > <font color="#6699CC"><?=$rff[t_name]?></font>
    </div>
    <br>
    <form action="?a=<?=$a?>&p_id=<?=$_GET[p_id]?>&b=updp" method="post">
    <table border="2" bordercolor="#666666">
    	<tr>
        	<td width="100" align="center" bgcolor="#FFFFCC">商品名稱</td>
            <td><input type="text" id="p_name" name="p_name" value="<?=$row[p_name]?>"></td>
            <td rowspan="2">
            商品分類:
            <select id="t_id" name="t_id">
    			<option value="">---請選擇---</option>
				<?
				$ret1 = mysql_query("select * from type");
				while($row1 = mysql_fetch_array($ret1)){?>
        			<option value="<?=$row1[t_id]?>" <? if($row1[t_id] == $row[t_id]) echo "selected";?>><?=$row1[t_name]?></option>
        		<? }?>
    		</select>
            </td>  
        </tr>
       
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品品牌</td>
            <td><input type="text" id="p_b" name="p_b" value="<?=$row[p_b]?>"></td>
            
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品價格</td>
            <td><input type="text" id="p_price" name="p_price" value="<?=$row[p_price]?>"></td>
            <td width="200" align="center" bgcolor="#FFFFCC">商品圖片</td>
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品色號</td>
            <td><input type="text" id="p_color" name="p_color" value="<?=$row[p_color]?>"></td>
            
            
            <td rowspan="4" align="center">
            <img src="product/<?=$row[p_pic]?>" width="85%"><br>
            
            <a href="?a=<?=$a?>&p_id=<?=$_GET[p_id]?>&b=editpic">更新圖片</a>
            </td>
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品容量</td>
            <td><input type="text" id="p_cap" name="p_cap" value="<?=$row[p_capacity]?>"></td>
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品介紹</td>
            <td width="100">
            <textarea id="p_main" name="p_main" cols="65" rows="5"><?=$row[p_main]?></textarea>
            </td>
        </tr>
        <tr>
        	<td align="center" bgcolor="#FFFFCC">商品使用方式</td>
            <td>
            <textarea id="p_user" name="p_user" cols="65" rows="5"><?=$row[p_use]?></textarea>
            </td>
        </tr>
        <tr align="center">
        	<td colspan="3">
            <input type="submit" value="確定修改">&nbsp;&nbsp;
            <a href="?a=product_edit.php&t_id=<?=$row[t_id]?>&stype_id=<?=$row[stype_id]?>">回上一頁</a>
            </td>
        </tr>
	</table>
    </form>