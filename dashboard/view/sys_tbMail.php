<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");  
$fn = new functions();
$rs = new recordset();
$sql ="SELECT * FROM sys_mail  a
		JOIN at_empresas       b ON a.mail_envio_usuempId  = b.emp_id 
		JOIN at_departamentos  c ON a.mail_envio_usudpId   = c.dp_id 
		JOIN sys_usuarios      d ON a.mail_envio_usuId     = d.usu_cod
		JOIN sys_mail_status   e ON a.mail_statusId  = e.status_Id		
		WHERE  mail_destino_usuId =".$_SESSION['usu_cod'];
		$sql.=" ORDER BY mail_data DESC ";   
	$rs->FreeSql($sql);
	
	if($rs->linhas==0):
	echo "<tr><td colspan=7> Nenhuma mensagem...</td></tr>";
	else:
		while($rs->GeraDados()){?> 
		<tr>
			<td><input type="checkbox"></td>
			<td class="mailbox-star"><i class="fa fa-star text-yellow"></i></a></td>
			<td class="mailbox-name"><a href="sys_ler_mail.php?token=<?=$_SESSION['token'];?>&acao=N&mail_Id=<?=$rs->fld("mail_Id");?>"><?=$rs->fld("emp_alias");?></a></td>
			<td class="mailbox-name"><a href="sys_ler_mail.php?token=<?=$_SESSION['token'];?>&acao=N&mail_Id=<?=$rs->fld("mail_Id");?>"><?=$rs->fld("dp_nome");?></a></td>			
			<td class="mailbox-name"><a href="sys_ler_mail.php?token=<?=$_SESSION['token'];?>&acao=N&mail_Id=<?=$rs->fld("mail_Id");?>"><?=$rs->fld("usu_nome");?></a></td>
			<td class="mailbox-subject"><b><?=$rs->fld("mail_assunto");?></b></td>								
			<td><span class="label label-<?=$rs->fld("status_classe");?>"><?=$rs->fld("status_desc");?></span></td>
			</td>
			<td class="mailbox-date"><?=$fn->data_hbr($rs->fld("mail_data"));?></td>		
		</tr>
			  <?php                     
             
	}endif;
?>