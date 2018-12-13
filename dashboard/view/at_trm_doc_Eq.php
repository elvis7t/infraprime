<?php

  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment; Filename=F 002 DP - Termo de Responsabilidade Equipamentos - Rev. 02 (NIFF).doc");
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();

require_once("../config/main.php");
require_once("../model/recordset.php");

$rs = new recordset();

				
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_usu_termo_utilizacao A
						JOIN at_usuarios B       ON B.usu_id  =  A.trm_usuId
						JOIN at_empresas C       ON C.emp_id  =  A.trm_usuempId
						JOIN at_departamentos D  ON D.dp_id   =  A.trm_usudpId
						JOIN eq_tipo E           ON E.tipo_Id =  A.trm_eqtipoId
						JOIN sys_usuarios F      ON F.usu_cod =  A.trm_usucad
						JOIN eq_marca G          ON G.marc_id  =  A.trm_eqmarcId
						JOIN at_equipamentos H   ON H.eq_id   =  A.trm_eqId
						
						
					   WHERE trm_id=".$trmid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
		?>
			
						
							
							<div class="box-body">
							
								<html xmlns:v="urn:schemas-microsoft-com:vml"
								xmlns:o="urn:schemas-microsoft-com:office:office"
								xmlns:w="urn:schemas-microsoft-com:office:word"
								xmlns:m="https://schemas.microsoft.com/office/2004/12/omml"
								xmlns="https://www.w3.org/TR/REC-html40">

								<head>
								<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
								<meta name=ProgId content=Word.Document>
								<meta name=Generator content="Microsoft Word 15">
								<meta name=Originator content="Microsoft Word 15">
								<link rel=File-List
								href="NIFF%20DP%20-%20Nextel%20ANDRESA%20MUNIZ_arquivos/filelist.xml">
								<link rel=Edit-Time-Data
								href="NIFF%20DP%20-%20Nextel%20ANDRESA%20MUNIZ_arquivos/editdata.mso">
								<!--[if !mso]>
								<style>
								v\:* {behavior:url(#default#VML);}
								o\:* {behavior:url(#default#VML);}
								w\:* {behavior:url(#default#VML);}
								.shape {behavior:url(#default#VML);}
								</style>
								<![endif]-->
								<title>Empresa:</title>

								</head>
									
									

								<div class=WordSection1>
									<p class=MsoBlockText style='margin:0cm;margin-bottom:.0001pt;line-height:150%;
									tab-stops:495.0pt'><b><span style='font-size:10.0pt;line-height:150%;
									font-family:"Arial",sans-serif'>FUNCION&Aacute;RIO:</span></b><b><span
									style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif'> </span></b><span
									style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;
									mso-bidi-font-weight:bold'><?=$rs->fld("at_usu_nome");?><b>, </b>brasileiro (a),
									n&uacute;mero de registro: <?=$rs->fld("trm_usuchapa");?>, profiss&atilde;o: <?=$rs->fld("trm_usucargo");?>, portador da
									carteira de trabalho n&ordm; <?=$rs->fld("trm_usuctps");?>, RG n&ordm;.</span> <span style='font-size:
									11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-bidi-font-weight:
									bold'><?=$rs->fld("trm_usurg");?>, inscrito no CPF/MF sob n&ordm;.</span> <span style='font-size:
									11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-bidi-font-weight:
									bold'><?=$rs->fld("trm_usucpf");?>.</span><span class=style11><b><u><span style='font-size:
									12.0pt;line-height:150%;font-family:"Arial",sans-serif'><o:p></o:p></span></u></b></span></p>
									
									<p class=MsoNormal><span style='font-size:11.0pt;font-family:"Verdana",sans-serif;
									color:black'><o:p>&nbsp;</o:p></span></p>
									
									<p class=MsoNormal align=center style='text-align:center;line-height:150%;
									tab-stops:468.0pt'><span class=style11><b><u><span style='font-size:12.0pt;
									line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:"Arial Unicode MS"'>TERMO
									DE ENTREGA E RESPONSABILIDADE DE EQUIPAMENTO</span></u></b></span><span
									class=style11><b><u><span style='font-size:11.0pt;line-height:150%;font-family:
									"Arial",sans-serif;mso-fareast-font-family:"Arial Unicode MS"'>:</span></u></b></span><b><u><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'><o:p></o:p></span></u></b></p>

									<p class=MsoHeader style='margin-right:2.0cm;text-align:justify;line-height:
									150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Cl&aacute;usula 1&ordf;.</span></b><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'> Pelo presente termo de responsabilidade de entrega de 1 (um) <?=$rs->fld("eq_desc");?>, 
									marca <?=$rs->fld("marc_nome");?>, modelo <?=$rs->fld("eq_modelo");?>, n&uacute;mero Serial: <?=$rs->fld("eq_serial");?>,
									 o presente equipamento composto de:<o:p></o:p></span></p>

									<p class=MsoNormal><span style='font-size:11.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
									 style='margin-left:3.5pt;border-collapse:collapse;border:none;mso-border-alt:
									 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 3.5pt 0cm 3.5pt;
									 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
									 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:26.5pt'>
									  <td width=393 style='width:294.55pt;border:solid windowtext 1.0pt;mso-border-alt:
									  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:26.5pt'>
									  <p class=MsoNormal align=center style='text-align:center'><b><span
									  style='mso-bidi-font-family:Arial'>ITEM<o:p></o:p></span></b></p>
									  </td>
									  <td width=153 style='width:114.95pt;border:solid windowtext 1.0pt;border-left:
									  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
									  padding:0cm 3.5pt 0cm 3.5pt;height:26.5pt'>
									  <p class=MsoNormal align=center style='text-align:center'><b><span
									  style='mso-bidi-font-family:Arial'>QUANTIDADE<o:p></o:p></span></b></p>
									  </td>
									 </tr>
									<tr style='mso-yfti-irow:1;height:12.5pt'>
									  <td width=393 valign=top style='width:294.55pt;border:solid windowtext 1.0pt;
									  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
									  padding:0cm 3.5pt 0cm 3.5pt;height:12.5pt'>
									  <p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><span
									  style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									  mso-bidi-font-family:Arial;mso-bidi-font-weight:bold'><?=$rs->fld("trm_item1");?><o:p></o:p></span></p>
									  </td>
									  <td width=153 valign=top style='width:114.95pt;border-top:none;border-left:
									  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
									  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
									  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:12.5pt'>
									  <p class=MsoNormal><span style='font-size:11.0pt;mso-bidi-font-size:8.0pt;
									  mso-bidi-font-family:Arial'><?=$rs->fld("trm_item1_qtde");?></span><b><span style='font-size:11.0pt;
									  mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
									  </td>
									 </tr>
									 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:13.25pt'>
									  <td width=393 valign=top style='width:294.55pt;border:solid windowtext 1.0pt;
									  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
									  padding:0cm 3.5pt 0cm 3.5pt;height:13.25pt'>
									  <p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><span
									  style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									  mso-bidi-font-family:Arial;mso-bidi-font-weight:bold'><?=$rs->fld("trm_item2");?></span><b><span
									  style='font-size:11.0pt;line-height:150%;mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
									  </td>
									  <td width=153 valign=top style='width:114.95pt;border-top:none;border-left:
									  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
									  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
									  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.25pt'>
									  <p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><span
									  style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									  mso-bidi-font-family:Arial;mso-bidi-font-weight:bold'><?=$rs->fld("trm_item2_qtde");?></span><b><span
									  style='font-size:11.0pt;line-height:150%;mso-bidi-font-family:Arial'><o:p></o:p></span></b></p>
									  </td>
									 </tr>
									</table>

									<p class=MsoNormal><span style='font-size:11.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal><span style='font-size:11.0pt;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Par&aacute;grafo primeiro. </span></b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial;mso-bidi-font-weight:bold'>O equipamento mencionado
									acima, visa facilitar a comunica&ccedil;&atilde;o entre o empregado e o empregador no
									desempenho de sua fun&ccedil;&atilde;o, ficando o mesmo desde j&aacute; ciente pelo zelo do
									equipamento, tomando-se o empregado diretamente respons&aacute;vel pelos danos
									causados ao equipamento, em consequ&ecirc;ncia do mau uso, imprud&ecirc;ncia, negligencia
									ou imper&iacute;cia.<o:p></o:p></span></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Par&aacute;grafo segundo:</span></b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial;mso-bidi-font-weight:bold'> <span style='color:black;
									mso-themecolor:text1'>O equipamento mencionado acima, dever&aacute; ser utilizado
									exclusivamente para o servi&ccedil;o, e apenas e exclusivamente enquanto em hor&aacute;rio de
									trabalho, n&atilde;o sendo permitido a utiliza&ccedil;&atilde;o para fins pessoais, e nem tampouco
									fora do expediente de trabalho. </span><o:p></o:p></span></p>

									<p class=MsoNormal style='tab-stops:468.0pt'><span class=style11><b><u><span
									style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:
									"Arial Unicode MS"'><o:p><span style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></span></p>

									<p class=MsoNormal style='line-height:150%;tab-stops:468.0pt'><span
									class=style11><b><u><span style='font-size:11.0pt;line-height:150%;font-family:
									"Arial",sans-serif;mso-fareast-font-family:"Arial Unicode MS"'>DA GUARDA DO
									EQUIPAMENTO:</span></u></b></span><u><span style='font-size:11.0pt;line-height:
									150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p></o:p></span></u></p>

									<p class=MsoNormal style='tab-stops:468.0pt'><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='text-align:justify;line-height:150%;tab-stops:468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Cl&aacute;usula 2&ordf;.</span></b><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'> O empregado dever&aacute; manter o equipamento longe das seguintes situa&ccedil;&otilde;es,
									sob pena de ressarcimento dos danos, sendo:<o:p></o:p></span></p>

									<p class=MsoNormal style='text-align:justify;tab-stops:468.0pt'><span
									style='font-size:11.0pt;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt 27.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>1.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Infiltra&ccedil;&atilde;o de &aacute;gua, &aacute;cidos, areia;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>2.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Exposi&ccedil;&atilde;o a raios solares de forte intensidade;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>3.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Manejamento inadequado;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-top:0cm;margin-right:15.3pt;margin-bottom:
									0cm;margin-left:0cm;margin-bottom:.0001pt;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>4.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Livre de queda;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>5.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>N&atilde;o levar para consertos e n&atilde;o tentar consertar
									sozinho, somente poder&aacute; faz&ecirc;-lo com autoriza&ccedil;&atilde;o e em lugares aprovados pelo
									departamento de inform&aacute;tica;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>6.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Manter longe de lugares &uacute;midos, assim n&atilde;o causando oxida&ccedil;&otilde;es
									nos perif&eacute;ricos do equipamento;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
									style='mso-list:Ignore'>7.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
									</span></span></span><![endif]><span style='font-size:11.0pt;line-height:150%;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial;
									color:black;mso-themecolor:text1'>Manter longe de locais com imin&ecirc;ncia de
									choques;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial;color:black;mso-themecolor:text1'><span
									style='mso-list:Ignore'>8.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
									</span></span></span><![endif]><span style='font-size:11.0pt;line-height:150%;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial;
									color:black;mso-themecolor:text1'>Manter sempre sobre sua guarda, n&atilde;o
									emprestando a outras pessoas, exceto aquelas voltadas a </span>assuntos relacionados ao expediente de trabalho, do empregador;<o:p></o:p></span></p>

									<p class=MsoNormal style='margin-left:0cm;text-align:justify;text-indent:0cm;
									line-height:150%;mso-list:l1 level1 lfo4;tab-stops:list 18.0pt left 468.0pt'><![if !supportLists]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:Arial;
									mso-bidi-font-family:Arial'><span style='mso-list:Ignore'>9.<span
									style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></span><![endif]><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>O aparelho &eacute; intransfer&iacute;vel, sendo que, no caso de
									transfer&ecirc;ncia para outro funcion&aacute;rio, dever&aacute; comunicar o superior respons&aacute;vel,
									para que seja solicitado ao departamento de TI, a realiza&ccedil;&atilde;o de procedimentos
									de altera&ccedil;&otilde;es internas de cadastro, sob pena de responsabilizar por quaisquer
									danos;<o:p></o:p></span></p>

									<p class=MsoNormal style='tab-stops:468.0pt'><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='line-height:150%;tab-stops:468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'>DAS CONDI&Ccedil;&Otilde;ES ADIVERSAS:<o:p></o:p></span></u></b></p>

									<p class=MsoNormal style='tab-stops:468.0pt'><b style='mso-bidi-font-weight:
									normal'><u><span style='font-size:11.0pt;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'><o:p><span style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Cl&aacute;usula 3&ordf;.</span></b><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'> Em caso de roubo, o empregado dever&aacute; apresentar ao empregador o Boletim
									de Ocorr&ecirc;ncia (B.O), do fato ocorrido, onde o mesmo tomar&aacute; providencias quanto
									ao bloqueio do aparelho celular e itens, assim eximindo o empregado da
									responsabilidade.<o:p></o:p></span></p>

									<p class=MsoHeader style='text-align:justify;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><span
									style='font-size:11.0pt;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b
									style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;line-height:
									150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'>Par&aacute;grafo
									Primeiro:</span></b><span style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:
									"Arial Unicode MS";mso-bidi-font-family:Arial'> Na retirada do equipamento,
									dever&aacute; o funcion&aacute;rio verificar se o equipamento est&aacute; em condi&ccedil;&otilde;es de uso e caso
									tenha algum dano dever&aacute; informar imediatamente, sob pena de responsabilizar por
									eventuais danos.<o:p></o:p></span></p>

									<p class=MsoHeader style='tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p><span
									 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'>DO RESSARCIMENTO:<o:p></o:p></span></u></b></p>

									<p class=MsoHeader style='text-align:justify;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p><span
									 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

									<p class=MsoHeader style='text-align:justify;line-height:150%;tab-stops:center 220.95pt right 441.9pt left 468.0pt'><b><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Cl&aacute;usula 4&ordf;. </span></b><span style='font-size:
									11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial;mso-bidi-font-weight:bold'>O n&atilde;o atendimento de qualquer das cl&aacute;usulas
									aqui convencionadas, fica d</span><span style='font-size:11.0pt;line-height:
									150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'>esde
									j&aacute; autorizado, o desconto em folha de pagamento do empregado, a compra de novo
									aparelho no mesmo modelo, ou em modelo equivalente, conforme disposto na
									Cl&aacute;usula 2&ordf;, para ressarcimento dos danos causados.<b><o:p></o:p></b></span></p>

									<p class=MsoNormal style='text-align:justify;tab-stops:468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p><span
									 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

									<p class=MsoNormal style='text-align:justify;line-height:150%;tab-stops:468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									line-height:150%;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'>DA DEVOLU&Ccedil;&Atilde;O:<o:p></o:p></span></u></b></p>

									<p class=MsoNormal style='text-align:justify;tab-stops:468.0pt'><b
									style='mso-bidi-font-weight:normal'><u><span style='font-size:11.0pt;
									mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:Arial'><o:p><span
									 style='text-decoration:none'>&nbsp;</span></o:p></span></u></b></p>

									<p class=MsoNormal style='text-align:justify;line-height:150%;tab-stops:468.0pt'><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>Cl&aacute;usula 5&ordf;. No caso de desligamento da empresa, ou
									a qualquer momento se lhe for requerido, o empregado dever&aacute; devolver o equipamento
									e itens, nas mesmas condi&ccedil;&otilde;es e qualidade que recebeu sob pena de ressarcimento
									do preju&iacute;zo, descontando-se diretamente em folha de pagamento ou nas verbas
									rescis&oacute;rias, se for o caso.<o:p></o:p></span></p>

									<p class=MsoNormal style='text-align:justify;tab-stops:468.0pt'><span
									style='font-size:11.0pt;mso-fareast-font-family:"Arial Unicode MS";mso-bidi-font-family:
									Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='text-align:justify;line-height:150%;tab-stops:468.0pt'><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'>E, por assim estarem justos e de pleno acordo,
									firmam o presente Termo, feito em duas vias de igual valor e teor, para que
									desde j&aacute; produza os seus efeitos legais e judiciais.<o:p></o:p></span></p>

									<p class=MsoNormal style='text-align:justify;line-height:150%;tab-stops:468.0pt'><span
									style='font-size:11.0pt;line-height:150%;mso-fareast-font-family:"Arial Unicode MS";
									mso-bidi-font-family:Arial'><?=$rs->fld("emp_cid");?>,________de________________________________ de 20___
									<p class=MsoNormal style='tab-stops:468.0pt'><span style='font-size:11.0pt;
									mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='line-height:150%;tab-stops:468.0pt'><b>(Empresa)______________________________________________ </span></b>
									<p class=MsoNormal style='tab-stops:468.0pt'><span style='font-size:11.0pt;
									mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>

									<p class=MsoNormal style='line-height:150%;tab-stops:468.0pt'><b>(Funcion&aacute;rio)____________________________________________
									<span style='font-size:11.0pt;line-height:150%'><o:p></o:p></span></p>
								</div><!-- ./word -->

								
							</div><!-- ./body -->
					
		

	
	


		
	</body>
</html>
