# 使用laravel-lang来实现消息验证的多语言设置

我们想让报错信息显示中文，可以使用：https://github.com/overtrue/laravel-lang 。  

首先，安装该扩展包：
```bash
composer require "overtrue/laravel-lang:~3.0"
```
去配置文件注册服务提供器：  

config/app.php
```php
Illuminate\Translation\TranslationServiceProvider::class,

替换为：

Overtrue\LaravelLang\TranslationServiceProvider::class,
```

修改项目语言：  

config/app.php
```php
'locale' => 'zh-CN',
```