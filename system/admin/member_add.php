<?
if($_GET[b]=='add'){
	$na = $_REQUEST[na];
	$acc = $_REQUEST[acc];
	$pwd = $_REQUEST[pwd];
	$bri = $_REQUEST[y]."-".$_REQUEST[m]."-".$_REQUEST[d];
	$ea = $_REQUEST[ea];
	$row = mysql_fetch_array($ret = mysql_query("select * from member where m_acc='$acc'"));
	
	if($row[m_acc] == $acc){
		echo "<script>alert('帳號重覆')</script>";
		echo "<script>location.replace('?a=$a')</script>";
	}else{
		$nme = $_REQUEST[nme];
		$ac = $_REQUEST[ac];
		$pa = $_REQUEST[pa];
		$eam = $_REQUEST[eam];
		
		if($nme =="" and $ac =="" and $pa=="" and $eam ==""){
			echo "<script>alert('註冊資料不可為空白!!!!')</script>";
		}else{
			if($nme == 1 and $ac == 1 and $pa ==1 and $eam == 1){
				mysql_query("insert into member value('','$na','$acc','$pwd','$ea','$bri')");
				/*echo "<script>alert('$nme')</script>";*/
				echo "<script>alert('申辦成功')</script>";
				/*echo "<script>location.replace('?a=pedit.php')</script>";*/
			}else{
				echo "<script>alert('註冊資料格式有錯誤!!!!')</script>";
				echo "<script>location.replace('?a=member.php')</script>";
			}
		}
	}
}
?>
<br><br>
<font size="-1">
<div align="center">
<img src="pic/star.png"> <font face="華康秀風體W3" size="+3" >新增會員</font>
<br><br>
<form action="?a=<?=$a?>&b=add" method="post">
<table border="1" bordercolor="#666666" width="500">
	<tr>
    	<td width="100">&nbsp;&nbsp;會員姓名：</td>
        <td align="left">
        	<input type="text" id="na" name="na" onblur="CheckN(this)">
            <script>
			function CheckN(formElement){
				re = /^$/;
				if(!re.test(formElement.value)){
					document.getElementById('n').innerHTML = "OK!!!";
					document.getElementById('nme').value = 1;
				}else{
					document.getElementById('n').innerHTML = "不正確!!!";
					document.getElementById('nme').value = 2;
				}
			}
		</script>
        <span id="n"></span>
        <input type="hidden" id="nme" name="nme" value="1">
        </td>
    </tr>
    <tr>
    	<td>&nbsp;&nbsp;帳號：</td>
        <td align="left">
        <input type="text" id="acc" name="acc" onblur="CheckAcc(this)">
		<script>
			function CheckAcc(formElement)
			{
				//var acccheck = document.getElementById('acc').value;				
				re = /^[a-zA-Z]{3,}[0-9]{3,}$/;
				if(!re.test(formElement.value)){
					document.getElementById('a').innerHTML = "不正確!!!";
					document.getElementById('ac').value = 2;
				}else{
					document.getElementById('a').innerHTML = "OK!!!";
					document.getElementById('ac').value = 1;
				}
				
			}
		</script>
        <span id="a">範例:abc1234</span>
        <input type="hidden" id="ac" name="ac" value="1">
        </td>
    </tr>
    <tr>
    	<td>&nbsp;&nbsp;密碼：</td>
        <td align="left">
        <input type="password" id="pwd" name="pwd" onblur="CheckPass(this)">
        <script>
			function CheckPass(formElement)
			{
				re = /^[a-zA-Z]{3,}[0-9]{3,}$/;
				if(!re.test(formElement.value)){
					document.getElementById('p').innerHTML = "密碼需由3個英文字母(開頭)及3個數字以上組成!!!";
					document.getElementById('pa').value = 2;
				}else{
					document.getElementById('p').innerHTML = "OK!!!";
					document.getElementById('pa').value = 1;
				}
				
			}
		</script>
        <span id="p"></span>
        <input type="hidden" id="pa" name="pa" value="1">
        </td>
    </tr>
    <tr>
    	<td>&nbsp;&nbsp;生日：</td>
        <td align="left">
        <select id="y" name="y">
        	<?
			for($y=1980;$y<2015;$y++){?>
        	<option value="<?=$y?>"><?=$y?></option>
            <? }?>
        </select>年
        <select id="m" name="m">
            <?
			for($m=1;$m<13;$m++){?>
        	<option value="<?=$m?>"><?=$m?></option>
            <? }?>
        </select>月
        <select id="d" name="d">
            <?
			for($d=1;$d<32;$d++){?>
        	<option value="<?=$d?>"><?=$d?></option>
            <? }?>
        </select>日
        </td>
    </tr>
    <tr>
    	<td>&nbsp;&nbsp;電子信箱：</td>
        <td align="left">
        <input type="text" id="ea" name="ea" size="30" onblur="CheckE(this)">
        <script>
        function CheckE(formElement)
		{
			re = /^[\w\.-]+@[\w\.-]+\.\w+$/i;
			if(!re.test(formElement.value)){
				document.getElementById('e').innerHTML = "不正確!!!";
				document.getElementById('eam').value = 2;
			}else{
				document.getElementById('e').innerHTML = "OK!!!";
				document.getElementById('eam').value = 1;
			}
		}
      	</script>
        <span id="e">範例：s1456@yahoo.com.tw</span>
        <input type="hidden" id="eam" name="eam" value="1">
        </td>
    </tr>
    <tr align="center">
    	<td colspan="2"><input type="submit" value="確定新增"></td>
    </tr>
</table>
</form>
</div>
</font>