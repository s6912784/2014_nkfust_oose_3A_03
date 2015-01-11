<?
if($_GET[b]=='pass'){
	$acc = $_REQUEST[acc];
	$pwd = $_REQUEST[pwd];
	$pass = $_REQUEST[pass];
	$x = $_REQUEST[x];
	$ret = mysql_query("select * from member where m_acc='$acc' and m_pwd='$pwd'");
	$row = mysql_fetch_array($ret);
	/*echo "<script>alert('$x')</script>";*/
	if(mysql_num_rows($ret)==1){
		
		if($pass == $x){
			//mysql_query("update adm set edate='$date',etime='$time'");
			$_SESSION[user] = $row[m_id];
			echo "<script>location.replace('index.php')</script>";
		}else{
			echo "<script>alert('驗証碼錯誤')</script>";
		}
	}else{
		if($acc == "" and $pwd == "" and $pass == ""){
			echo "<script>alert('你尚未輸入帳密及驗証碼')</script>";
		}else{
			if(!mysql_fetch_array(mysql_query("select * from member where m_acc='$acc'"))==1){
				echo "<script>alert('帳號錯誤')</script>";
			}else{
				echo "<script>alert('密碼錯誤')</script>";
			}
		}
	}
}
?>
<br><br>
<form action="?a=<?=$a?>&b=pass" method="post">


<div style="background:url(pic/memberlogin.png) no-repeat; width:450px; height:300px; margin:auto;">
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
            <td style="margin:auto;">
            		<? $r =rand(0,999999);?>
        		   <img src="admpic.php?r=<?=$r?>" onclick="ch(this)"><br>
        		   <input type="text" id="pass" name="pass">
        		   <input type="hidden" id="x" name="x" value="<?=$r?>">
            </td>
        </tr>
    </table>
    
    <div style="width:50px; height:10px; margin:15px 0 0 185px;">
    	<input type="submit" value="確定登入">
    </div>
	
</div>

</form>

<script>
function ch(t){
	var k = Math.floor(Math.random()*1000000);
	t.src = "admpic.php?r=" + k;
	document.getElementById('x').value = k;
}
</script>
