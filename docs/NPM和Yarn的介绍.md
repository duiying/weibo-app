# NPM和Yarn的介绍

### NPM
NPM是Node.js的包管理和任务管理工具，NPM有个类似composer.json文件的package.json文件，Laravel默认为每个新建的项目自动生成该文件，并在该文件中默认集成了一些较为常用的扩展包。  

package.json
```json
{
    "private": true,
    "scripts": {
        "dev": "npm run development",
        "development": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
        "watch": "npm run development -- --watch",
        "watch-poll": "npm run watch -- --watch-poll",
        "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
        "prod": "npm run production",
        "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --no-progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
    },
    "devDependencies": {
        "axios": "^0.18",
        "bootstrap": "^4.1.0",
        "cross-env": "^5.2.1",
        "jquery": "^3.2",
        "laravel-mix": "^4.0.7",
        "lodash": "^4.17.5",
        "popper.js": "^1.12",
        "resolve-url-loader": "^2.3.1",
        "sass": "^1.15.2",
        "sass-loader": "^7.1.0",
        "vue": "^2.5.17",
        "vue-template-compiler": "^2.6.10"
    }
}
```

在package.json文件中指定了要安装模块的名称和版本号，可以使用下面命令进行安装。
```bash
npm install
```
在开始安装之前，npm install命令会先检查node_modules文件夹是否存在要安装的模块，如果该模块已存在，则跳过，接着安装下一模块。安装完成后，所有的第三方模块都将被下载到node_modules文件夹中。  

可以使用下面命令强制安装所有模块，不管该模块之前是否安装过。
```bash
npm install -f
```

Laravel默认集成了一些NPM扩展包，重点看以下几个：
```
bootstrap       bootstrap NPM扩展包
jquery          jQuery NPM扩展包
laravel-mix     Laravel官方提供的静态资源管理工具
vue             vue.js前端框架
```
这些扩展包，为Laravel提供了一套完整的前端工作流。

### Yarn
Yarn是Facebook在2016年10月开源的一个新的包管理器，Yarn在保留NPM原有工作流特性的基础上，使之变得更快、更安全、更可靠。  

可以使用下面命令来安装当前项目的所有包：
```bash
yarn install
```
当执行yarn install时，Yarn会先判断当前目录中是否存在yarn.lock文件，如果存在的话，按照文件中指定的包版本进行安装，否则读取package.json文件中的内容并发送到服务器上解析，解析成功后把结果写入yarn.lock文件中，最后安装扩展包。  

Laravel自带yarn.lock文件，此文件的作用与composer.lock一致，是为了保证项目依赖包版本号绝对一致而存在的。  
可以使用下面的命令安装指定的包：
```bash
yarn add [package]
```
