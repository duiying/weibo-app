# 显示Gravatar头像

我们使用Gravatar来为用户提供个人头像支持。  

Gravatar为'全球通用头像'，当你在Gravatar放置了头像后，可以通过将自己的Gravatar登录邮箱进行MD5转码，并与Gravatar的URL进行拼接来获取到自己的Gravatar头像。  

在用户模型中定义一个gravatar方法，用来获取用户的头像。  
```php
public function gravatar($size = '100')
{
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "http://www.gravatar.com/avatar/$hash?s=$size";
}
```
定义好gravatar方法后，我们就可以在视图中通过以下方式进行调用：
```php
// 获取默认尺寸的头像
$user->gravatar();

// 获取指定尺寸的头像
$user->gravatar('140');
```

构建一个全局通用的局部视图，用于展示用户的头像和用户名等基本信息：   

resources/views/shared/_user_info.blade.php
```php
<a href="{{ route('users.show', $user->id) }}">
    <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
```
该视图将被嵌套在用户个人页面中使用，修改个人页面：  

resources/views/users/show.blade.php
```php
@extends('layouts.default')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="col-md-12">
                <div class="offset-md-2 col-md-8">
                    <section class="user_info">
                        @include('shared._user_info', ['user' => $user])
                    </section>
                </div>
            </div>
        </div>
    </div>
@stop
```
我们通过给@include方法传参，将用户数据以关联数组的形式传递到了_user_info局部视图。  

修改样式：  

resources/sass/app.scss
```scss
/* User gravatar */

section.user_info {
  padding-bottom: 10px;
  margin-top: 20px;
  text-align: center;
  .gravatar {
    float: none;
    max-width: 70px;
  }
  h1 {
    font-size: 1.4em;
    letter-spacing: -1px;
    margin-bottom: 3px;
    margin-top: 15px;
  }
}

.gravatar {
  float: left;
  max-width: 50px;
  border-radius: 50%;
}
```
编译，npm run dev。  

重新访问：[http://weibo-app.com/users/1](http://weibo-app.com/users/1)，即可看到用户头像了。