# SASS语法基础

### 介绍
Sass是一种可用于编写CSS的语言，借助Sass我们可以少写很多CSS代码，并使样式代码的编写更加灵活多变。

### 样式文件导入
Sass可以使用@import来导入其它的样式文件。如：
```sass
// 导入node_modules/bootstrap/scss/bootstrap.scss文件
@import '~bootstrap/scss/bootstrap';
```
也可以使用下面代码来对单独一个文件进行导入：
```sass
@import "node_modules/bootstrap/scss/_alert.scss";
```

### 变量
Sass允许在代码中加入变量，所有的变量均以$开头。
```sass
$navbar-color: #3c3e42;
.navbar-inverse {
    background-color: $navbar-color;
}
```
上面代码定义了一个$navbar-color变量，在编译成功后，变量将被替换为它对应的值。

### 嵌套
Sass允许在选择器中进行相互嵌套，减少代码量。
```css
body div {
  color: red;
}
body h1 {
  margin-top: 10px;
}
```
可以写成：
```sass
body { 
    div {
      color: red; 
    }
    h1 {
        margin-top: 10px;
    } 
}
```

### 引用父选择器
在Sass嵌套中使用&对父选择器进行引用。
```css
a {
    color: white;
}
a:hover {
  color: blue;
}
```
可写为：
```sass
a {
  color: white;
  &:hover {
      color: blue;
  } 
}
```
