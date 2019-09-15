# 以Article模型为例介绍模型的创建和规范

## 目录

### Article模型的创建
模型类使用 单数 形式来命名：
```bash
php artisan make:model Article
```
上述方式创建的模型类默认是放在app目录下，我们需要将其放在app/Models目录下：
```bash
# 删除刚才创建的模型
rm app/Article.php
# 为创建模型命令指定命名空间
php artisan make:model Models/Article
```
如果需要在创建模型的同时顺便创建数据库迁移文件，可以使用--migration或-m选项：
```bash
# 删除刚才创建的模型
rm app/Models/Article.php
# 为创建模型命令指定命名空间
php artisan make:model Models/Article -m
```

### Eloquent数据模型
正常情况下，一个最小代码的Eloquent模型如下所示：
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
}
```
Eloquent表命名约定
```
Eloquent默认情况下会使用模型类的下划线命名法与复数形式名称来作为数据表的名称生成规则，如：
Article模型对应articles表
User模型对应users表
BlogPost模型对应blog_posts表

如果需要自定义数据表名，可以通过table属性来定义：
protected $table = 'my_articles';
```