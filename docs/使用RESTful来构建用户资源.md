# 使用RESTful来构建用户资源

使用Tinker来查询用户的信息，确保该用户对象在数据库中确实存在：
```bash
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.21 — cli) by Justin Hileman
>>> App\Models\User::first()
=> App\Models\User {#2977
     id: 1,
     name: "wyx",
     email: "wangyaxiandev@gmail.com",
     email_verified_at: null,
     created_at: "2019-09-15 12:05:37",
     updated_at: "2019-09-15 12:31:54",
   }
```

Laravel遵从RESTful架构的设计原则，将数据看作一个资源，由URI来指定资源。对资源进行的获取、创建、修改和删除操作，分别对应HTTP协议提供的GET、POST、PATCH和DELETE方法。  

Laravel为我们提供了resource方法来定义用户资源路由。  

routes/web.php
```php
// resource方法遵循RESTful架构为用户资源生成路由，该方法接收两个参数，第一个参数是资源名称，第二个参数是控制器名称
Route::resource('users', 'UsersController');
```

上面代码等同于：
```php
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
```

resource方法让我们少写了很多代码，且严格按照了RESTful架构对路由进行设计，生成的资源路由列表信息如下所示：  

| HTTP请求 | URL | 动作 | 作用 |
| ---- | ---- | ---- | ---- |
| GET  | /users | UsersController@index | 显示所有用户列表 |
| GET  | /users/{user} | UsersController@show | 显示用户个人信息的页面 |
| GET  | /users/create | UsersController@create | 创建用户的页面 |
| POST  | /users | UsersController@store | 创建用户 |
| GET  | /users/{user}/edit | UsersController@edit | 编辑用户个人资料的页面 |
| PATCH  | /users/{user} | UsersController@update | 更新用户 |
| DELETE  | /users/{user} | UsersController@destroy | 删除用户 |  

UsersController的show方法：
```php
public function show(User $user)
{
    return view('users.show', compact('user'));
}
```
上述代码，Laravel会自动注入与请求URI中传入的ID对应的用户模型实例，此功能称为隐形路由模型绑定，同时满足以下两种情况，此功能即会启用：
```
1. 路由声明中用Eloquent模型的小写作为路由片段参数，User模型类对应{$user}。
Route::get('/users/{user}', 'UsersController@show')->name('users.show');

2. 控制器方法参数必须包含对应的Eloquent模型类声明。
public function show(User $user)
{
    return view('users.show', compact('user'));
}
```
当访问：[http://weibo-app.com/users/1](http://weibo-app.com/users/1)，并满足上述2个条件时，Laravel会自动查找ID为1的用户并赋值到变量$user中，如果ID为1的记录不存在，会自动生成HTTP 404响应。  

将$user传递给视图文件：
```php
return view('users.show', compact('user'));
```

新建用户个人页面：  

resources/views/users/show.blade.php
```php
@extends('layouts.default')
@section('title', $user->name)

@section('content')
{{ $user->name }} - {{ $user->email }}
@stop
```