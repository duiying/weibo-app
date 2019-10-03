# 利用身份验证Auth中间件来过滤未登录用户的edit、update动作

现在未登录用户可以访问edit和update动作，我们要避免这种情况。  

Laravel中间件为我们提供了一种非常棒的过滤机制来过滤进入应用的HTTP请求。  

例如，当我们使用Auth中间件来验证用户的身份时，如果用户未通过身份验证，则Auth中间件会把用户重定向到登录页面。  

如果用户通过了身份验证，则Auth中间件会通过此请求并接着往下执行。  

app/Http/Controllers/UsersController.php
```php
public function __construct()
{
    $this->middleware('auth', [
        'except' => ['show', 'create', 'store']
    ]);
}
```
middleware方法接收两个参数，第一个参数是中间件的名称，第二个参数是要进行过滤的动作。  

我们通过except方法来指定动作不使用Auth中间件进行过滤，相反地有only方法，只过滤指定动作。  

退出登录，再次访问：http://weibo-app.com/users/1/edit ，页面被重定向到登录页面。  


