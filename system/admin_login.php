<?
if($_GET[b]=='pass'){
	$acc = $_REQUEST[acc];
	$pwd = $_REQUEST[pwd];
	$pass = $_REQUEST[pa];
	$r = $_REQUEST[x];
	$ret = mysql_query("select * from adm where adm_acc='$acc' and adm_pwd='$pwd'");
	$row = mysql_fetch_array($ret);
	/*echo "<script>alert('$r')</script>";*/
	if($pass==$r){
		if(mysql_num_rows($ret)==1){
			$date = date("Y-m-d");
			$time = date("H:i:s");
			mysql_query("update adm set sdate='$date',stime='$time' where adm_id='$row[adm_id]'");
			$_SESSION[admin_user] = $row[adm_id];
			echo "<script>location.replace('admin/index.php')</script>";
		}else{
			if(!mysql_fetch_array(mysql_query("select * from adm where adm_acc='$acc'"))==1){
				echo "<script>alert('帳號錯誤')</script>";
			}else{
				echo "<script>alert('密碼錯誤')</script>";
			}
		}	
	}else{
		if($acc == "" and $pwd == "" and $pass == ""){
			echo "<script>alert('你尚未輸入帳密及驗証碼')</script>";
		}else{
			echo "<script>alert('驗証碼錯誤!!!')</script>";		
		}
	}
}
?>
<br><br>
<form action="?a=<?=$a?>&b=pass" method="post">
<div style="background:url(pic/userlogin.png) no-repeat; width:450px; height:300px; margin:auto;">
	<br><br><br><br><br>
    <table style="border:1px solid #000; text-align:center; width:250px; margin:-10px 0 0 60px;">
    	<tr style="height:5px;">
        	<td colspan="2"></td>
        </tr>
    	<tr>
        	<td width="50px"><font size="-1">帳號:</font></td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
        	<td><font size="-1">密碼:</font></td>
            <td><input type="password" name="pwd" id="pwd"></td>
        </tr>
        <tr>
        	<td><font size="-1">驗証碼:</font></td>
            <td>
        		<? $r =rand(0,999999);?>
        		<img src="admpic.php?r=<?=$r?>" onClick="sspic(this)"><br>
        		<input type="text" id="pa" name="pa">
        		<input type="hidden" id="x" name="x" value="<?=$r?>">
        	</td>
        </tr>
    </table>
    	<div style="width:50px; height:10px; margin:15px 0 0 185px;">
    	<input type="submit" value="確定登入">
    	</div>
	
</div>
</form>
<br>
<script>
function sspic(t){
	var k = Math.floor(Math.random()*1000000);   //math.floor 使得亂數不會有小數點
	t.src = "admpic.php?r=" + k;
	document.getElementById('x').value = k;
}
</script>