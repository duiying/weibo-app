# SMTP发送邮件

使用SMTP发送邮件。  

邮件发送配置：
```php
MAIL_DRIVER=smtp
MAIL_HOST=smtp.163.com
MAIL_PORT=25
MAIL_USERNAME=wangyaxiandev@163.com
MAIL_PASSWORD=xxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=wangyaxiandev@163.com
MAIL_FROM_NAME=weibo-app
```
其中，MAIL_FROM_ADDRESS和MAIL_USERNAME要保持一致。  

修改账号激活一节中的邮件发送逻辑，删除from方法。  

app/Http/Controllers/UsersController.php
```php
protected function sendEmailConfirmationTo($user)
{
    $view = 'emails.confirm';
    $data = compact('user');
    $to = $user->email;
    $subject = "感谢注册 Weibo 应用！请确认你的邮箱。";
    Mail::send($view, $data, function ($message) use ($to, $subject) {
        $message->to($to)->subject($subject);
    });
}
```
将邮件链接中的http://localhost换成自定义的url，在.env中修改：
```
APP_URL=http://weibo-app.com
```