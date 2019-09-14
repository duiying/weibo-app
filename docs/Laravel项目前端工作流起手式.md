# Laravel项目前端工作流起手式

### Yarn的安装
官方文档：https://yarnpkg.com/en/docs/install  

本次是在CentOS下进行安装。  

```bash
# 在CentOS，Fedora和RHEL上，您可以通过我们的RPM包存储库安装Yarn。
curl --silent --location https://dl.yarnpkg.com/rpm/yarn.repo | tee /etc/yum.repos.d/yarn.repo
# 如果您还没有安装Node.js，还应该配置 NodeSource存储库。
curl --silent --location https://rpm.nodesource.com/setup_8.x | bash -
# 安装
yum -y install yarn
```

### 安装项目的包
安装项目的所有包
```bash
yarn install --no-bin-links
```
安装cross-env
```bash
# cross-env能够提供一个设置环境变量的scripts，让你能够以unix方式设置环境变量，然后在windows上也能兼容运行。
yarn add cross-env
```

### Laravel Mix前端资源编译
在webpack.mix.js文件中指定了Mix的任务。

运行Mix任务进行编译。  
```bash
# 开发模式，编译生成的文件未被压缩，便于开发调试。
npm run dev 或 npm run development
# 生产模式，编译生成的文件经过了压缩。
npm run prod 或 npm run production
```
