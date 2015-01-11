<?

 
 $p = $_POST['rating'];
 $m_id = $_SESSION[user];
 $p_id = $_GET[p_id];
 
 echo($m_id); 
 
 mysql_query("insert into star value('','$m_id','$p_id','$p')");
 ?>