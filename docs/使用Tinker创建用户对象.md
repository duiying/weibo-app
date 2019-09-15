# 使用Tinker创建用户对象

## 目录
- [Tinker介绍](#Tinker介绍)
- [创建用户对象](#创建用户对象)

### Tinker介绍
Tinker是一个REPL(read-eval-print-loop，读入-求值-输出-循环)，REPL指的是一个简单的、可交互式的编程环境，通过执行用户输入的命令，并将执行结果直接打印到命令行界面上来完成整个操作。  

因此，下面我们不通过创建表单的方式，而是使用Laravel提供的Tinker环境完成用户对象的创建。

### 创建用户对象
进入Tinker环境：
```bash
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.21 — cli) by Justin Hileman
>>>
```
执行创建：
```php
>>> App\Models\User::create(['name' => 'wyx', 'email' => 'wangyaxiandev@gmail.com', 'password' => bcrypt('123456')])
=> App\Models\User {#2966
     name: "wyx",
     email: "wangyaxiandev@gmail.com",
     updated_at: "2019-09-15 12:05:37",
     created_at: "2019-09-15 12:05:37",
     id: 1,
   }
```
其中，bcrypt方法是用于加密密码，>>> 代表artisan tinker命令行环境。