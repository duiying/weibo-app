# Laravel Mix

### 介绍
Laravel Mix是一款前端任务自动化管理工具，使用了工作流的模式对制定好的任务依次执行。Mix提供了简单流畅的API，让你能够对你的Laravel应用定义Webpact编译任务。Mix支持许多常见的CSS与JS预处理器，通过简单的调用，你可以轻松地管理前端资源。我们可以在webpack.mix.js中制定一些资源文件的编译、压缩等任务。  

Laravel已默认为我们生成了webpack.mix.js文件，并集成了laravel-mix模块。  

webpack.mix.js
```js
// webpack.mix.js的解析引擎是Node.js，在Node.js中require关键词是对模块进行引用。
const mix = require('laravel-mix');

// Mix提供了一些函数来帮助你使用JS文件，像是编译ECMAScript 2015、模块编译、压缩、以及简单地合并纯JS文件。
// 而且，这些都不需要自定义配置。
// js方法的第二个参数用来指定自定义生成的js文件的输出目录
// sass方法用于将sass文件编译为css文件，第二个参数用来指定自定义生成的css文件的输出目录
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
```

### 使用
首先，使用以下命令安装npm依赖：
```bash
npm install
```
Webpack编译：
```bash
npm run dev
```
当修改了webpack.mix.js或resources/js/app.js或resources/sass/app.scss文件，都要重新进行编译。