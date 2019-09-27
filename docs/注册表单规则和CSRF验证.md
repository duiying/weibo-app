# 注册表单规则和CSRF验证

新建用户注册表单提交后的处理方法store。  

app/Http/Controllers/UsersController.php
```php
public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|confirmed|min:6'
    ]);
    return;
}
```
验证规则如下所示。  

不能为空：
```php
'name' => 'required'
```
长度限制：
```php
'name' => 'min:3|max:50',
```
格式验证，验证邮箱格式：
```php
'email' => 'email'
```
唯一性验证，针对数据表users：
```php
'email' => 'unique:users'
```
在我们使用POST方法提交表单时，Laravel为了安全考虑，会让我们提供一个token(令牌)来防止我们的应用受到CSRF的攻击，我们需要在表单元素中添加：
```php
{{ csrf_field() }}
```