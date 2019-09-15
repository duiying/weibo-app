# 使用Tinker查找用户对象

首先，进入Tinker环境：
```php
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.21 — cli) by Justin Hileman
```
use仅对当前Tinker会话有效，如果退出了Tinker，需要重新use。
```php
>>> use App\Models\User
```
查询主键为1的数据：
```php
>>> User::find(1)
=> App\Models\User {#2966
     id: 1,
     name: "wyx",
     email: "wangyaxiandev@gmail.com",
     email_verified_at: null,
     created_at: "2019-09-15 12:05:37",
     updated_at: "2019-09-15 12:05:37",
   }
```
查询的主键不存在时，返回null：
```php
>>> User::find(5)
=> null
```
查询的主键不存在时让其报错：
```php
>>> User::findOrFail(5)
Illuminate/Database/Eloquent/ModelNotFoundException with message 'No query results for model [App/Models/User] 5'
```
查询第一条数据：
```php
>>> User::first()
=> App\Models\User {#135
     id: 1,
     name: "wyx",
     email: "wangyaxiandev@gmail.com",
     email_verified_at: null,
     created_at: "2019-09-15 12:05:37",
     updated_at: "2019-09-15 12:05:37",
   }
```
查询所有数据：
```php
>>> User::all()
=> Illuminate\Database\Eloquent\Collection {#2975
     all: [
       App\Models\User {#2967
         id: 1,
         name: "wyx",
         email: "wangyaxiandev@gmail.com",
         email_verified_at: null,
         created_at: "2019-09-15 12:05:37",
         updated_at: "2019-09-15 12:05:37",
       },
     ],
   }
```