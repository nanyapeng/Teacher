<?php
	require './Mail/PHPMailer/class.phpmailer.php';
	$mail             = new PHPMailer();
	/*服务器相关信息*/
	$mail->IsSMTP();   //使用smtp方式发生邮件                     
	$mail->SMTPAuth   = true; //使用用户信息认证              
	$mail->Host       = 'smtp.163.com';//设置发件箱的smtp邮件服务器地址   	   
	$mail->Username   = '17629016177';//用户名
	$mail->Password   = 'qazwsxedc123';//密码 此密码时第三方的客户端密码
	/*内容信息*/
	$mail->IsHTML(true);
	$mail->CharSet    ="UTF-8";			
	$mail->From       = 'phpresources@163.com';	//发件箱 		
	$mail->FromName   ="王尼玛";	//发件人的昵称
	$mail->Subject    = '邮件发送使用phpmailer 主题'; //主题
	$mail->MsgHTML('邮件发送使用phpmailer 正文');//具体邮件的正文
  
	$mail->AddAddress('phper_leo@163.com');  //给指定的用户发送邮件
	$mail->AddAttachment("test.png"); //追加附件
	$res = $mail->Send();
	var_dump($res);
?>