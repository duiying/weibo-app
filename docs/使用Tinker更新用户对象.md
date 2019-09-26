# 使用Tinker更新用户对象

更新操作有两种方式：  

1. 给用户对象赋值，然后调用save方法保存更新。
2. 直接调用update方法。

通过save方法：
```php
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.21 — cli) by Justin Hileman
>>> use App\Models\User
>>> $user = User::find(1)
=> App\Models\User {#2973
     id: 1,
     name: "wyx",
     email: "wangyaxiandev@gmail.com",
     email_verified_at: null,
     created_at: "2019-09-15 12:05:37",
     updated_at: "2019-09-15 12:05:37",
   }
>>> $user->name = 'wyx-save'
=> "wyx-save"
>>> $user->save()
=> true
```
通过update方法：
```php
>>> $user->update(['name' => 'wyx'])
=> true
```