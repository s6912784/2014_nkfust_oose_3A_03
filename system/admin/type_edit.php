<?
if($_GET[b]=='edit'){
	$stype_id = $_GET[stype_id];
	for($i=0;$i<count($_REQUEST[t_id]);$i++){
		$t_id = $_REQUEST[t_id][$i];
		$t_name = $_REQUEST[t_name][$i];
		mysql_query("update type set t_name='$t_name' where t_id='$t_id'");
		
	}
	echo "<script>location.replace('?a=type_edit.php&stype_id=$stype_id')</script>";
	
	
}

if($_GET[b]=='type_del'){
	
	$stype_id = $_GET[stype_id];
	$type_id = $_GET[type_id];
	
	$r = mysql_query("select * from product where t_id ='$type_id'");
	
	if(mysql_num_rows($r)>0){
		echo "<script>alert('尚有與商品未刪除!!!!')</script>";
	}else{	
		mysql_query("delete from type where stype_id='$stype_id' and t_id='$type_id'");
	}
	
	
	
	/*	echo "<script>alert($stype_id&$type_id)</script>";*/
    echo "<script>location.replace('?a=type_edit.php&stype_id=$stype_id')</script>";
}
?>
<br><br>
<form action="?a=<?=$a?>&b=edit&stype_id=<?=$_GET[stype_id]?>" method="post">
	<select id="stype_id" name="stype_id" onchange="location.replace('?a=<?=$a?>&stype_id='+this.value)">
    	<option value="">---請選擇---</option>
		<?
		$ret = mysql_query("select * from stype");
		while($row = mysql_fetch_array($ret)){?>
        	<option value="<?=$row[stype_id]?>" <? if($row[stype_id] == $_GET[stype_id]) echo "selected";?>><?=$row[stype_name]?></option>
        <? }?>
    </select><br><br>
    <?  
		/*if($_GET[stype_id]!=""){
			
			
			if($r1=0){?>
				尚未建立此系列之任何分類<br><br>
        		<br><br>
        		<a href='?a=type_add.php'>點此新增分類</a>
			<? }
		}*/
			
	?>
    <? 
	
	if($_GET[stype_id] ==  ""){	
		$r1 = 0;	
	}else{
		$r2 = mysql_query("select * from type where stype_id=$_GET[stype_id]");
		$r1 = mysql_num_rows($r2);	
	}
		//echo $r1;
		if($_GET[stype_id] != "" and $r1 >0){
			
	?>
    <table border="1" bordercolor="#333333">
    	<tr align="center">
        	<td width="100">編號</td>
            <td width="200">分類</td>
            <td>編輯</td>
        </tr>
        <? 
		$ret = mysql_query("select * from type where stype_id='$_GET[stype_id]'");
		while($row = mysql_fetch_array($ret)){?>
        <tr>
        	<td align="center"><?=$row[t_id]?><input type="hidden" id="t_id[]" name="t_id[]" value="<?=$row[t_id]?>"></td>
            <td><input type="text" id="t_name[]" name="t_name[]" value="<?=$row[t_name]?>"></td>
            <td align="center">
            <a href="?a=<?=$a?>&b=type_del&stype_id=<?=$_GET[stype_id]?>&type_id=<?=$row[t_id]?>"  onclick="return confirm('您確定要刪除嗎!?')">刪除</a>
            </td>
        </tr>
        <? }?>
        <tr align="center">
       	  <td colspan="3"><input type="submit" value="確定修改"></td>
        </tr>
    </table>
    <? }else{
		if($_GET[stype_id] == ""){
			echo "<br>請選擇分類";
		}else{?>
			尚未建立此系列之任何分類<br><br>
        	<br><br>
        	<a href='?a=type_add.php'>點此新增分類</a>
	<? }}?>
</form>
<br><br>