<?php
function download($file_url,$new_name=''){
    if(!isset($file_url)||trim($file_url)==''){
        echo '500';
    }
    if(!file_exists($file_url)){ //检查文件是否存在
        echo '404';
    }
    $file_name=basename($file_url);
    $file_type=explode('.',$file_url);
    $file_type=$file_type[count($file_type)-1];
    $file_name=trim($new_name=='')?$file_name:urlencode($new_name);
    $file_type=fopen($file_url,'r'); //打开文件
    //输入文件标签
    header("Content-type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".filesize($file_url));
    header("Content-Disposition: attachment; filename=".$file_name);
    //输出文件内容
    echo fread($file_type,filesize($file_url));
    fclose($file_type);
}

function sendemail($host,$username,$password,$from,$fromname,$to,$subject,$body){
    require './Mail/PHPMailer/class.phpmailer.php';
    $mail             = new PHPMailer();
    /*服务器相关信息*/
    $mail->IsSMTP();   //使用smtp方式发生邮件
    $mail->SMTPAuth   = true; //使用用户信息认证
    $mail->Host       = $host;//设置发件箱的smtp邮件服务器地址
    $mail->Username   = $username;//用户名
    $mail->Password   = $password;//密码 此密码时第三方的客户端密码
    /*内容信息*/
    $mail->IsHTML(true);
    $mail->CharSet    ="UTF-8";
    $mail->From       = $from;	//发件箱
    $mail->FromName   = $fromname;	//发件人的昵称
    $mail->Subject    = $subject; //主题
    $mail->MsgHTML($body);//具体邮件的正文

    $mail->AddAddress($to);  //给指定的用户发送邮件
//    $mail->AddAttachment(""); //追加附件
    $res = $mail->Send();
    return $res;
}