<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/sendmail', '1370332073', 'template/default/sendmail');?><table cellspacing="0" cellpadding="20">
<tr><td>
<table width="500" cellspacing="0" cellpadding="1">
<tr><td bgcolor="#FF8E00" align="left" style="font-family:'lucida grande',tahoma,'bitstream vera sans',helvetica,sans-serif;line-height:150%;color:#FFF;font-size:24px;font-weight:bold;padding:4px">&nbsp; <?=$_SCONFIG['sitename']?></th></tr>
<tr><td bgcolor="#FF8E00">
<table width="100%" cellspacing="0" bgcolor="#FFFFFF" cellpadding="20">
<tr><td style="font-family:'lucida grande',tahoma,'bitstream vera sans',helvetica,sans-serif;line-height:150%;color:#000;font-size:14px;">
亲爱的朋友：
<blockquote><?=$message?><br></blockquote>
<br>
<br><?=$_SCONFIG['sitename']?>
<br><a href="<?php echo getsiteurl(); ?>" target="_blank"><?php echo getsiteurl(); ?></a>
<br><?php echo sgmdate('Y-m-d H:i',$_SGLOBAL[timestamp]); ?>
<br>
<br>此邮件为系统自动发出的邮件，请勿直接回复。
</td></tr></table>
</td></tr></table>
</td></tr>
</table><?php ob_out();?>