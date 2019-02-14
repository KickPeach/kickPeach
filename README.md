# KickPeach

> 一个提供模块化服务的现代PHP小框架


正如在框架设计的初心上所说，市面上已经那么多的框架了，还造什么轮子，再次重申一下。造轮子不是目的，造轮子的过程中汲取到知识才是目的，共勉。

框架的使用文档以及组件文档可访问[https://kickpeach.github.io/](https://kickpeach.github.io/)

## 框架的组织方式

kickpeach项目目录参考Laravel的文件组织方式进行组织，采取组件化开发，灵活扩展升级每个组件，主要由以下几个组件完成：

可查看[组织](https://github.com/KickPeach)进行源码的阅读

```cmd
Kickpeach　
        kickPeach----> 最终可以使用的框架,也就是当前所在项目
        framework----> 框架的核心文件
        queue----> 任务队列组件
        database----> 数据库组件
        mdCalls----> 提供模块化服务的组件
        kickpeach.github.io---->框架的使用文档
```

其他模块都有模块的文档

## 框架的设计思路

```cmd

入口文件
        ----> 注册错误(和异常)处理函数
        ----> 加载配置文件
        ----> 请求
        ----> 路由　
        ---->中间件
        ---->（控制器 <----> 数据模型）
        ----> 响应
        ----> 视图渲染数据
```

- 阅读源码的方式

    composer create kickpeach/kickpeach testkickpeach,composer update下载载源码下来之后，按照上面流程，可以看到框架源码的具体实现，从index.php入口看起。kickpeach只是framework的扩展，基于framework，完全可以自定义有自己风格的框架。
核心源码都在framework,在看源码的时候，你就会深入了解到什么叫self,static，继承，抽象，与接口。

- 模块化组织
    个人觉得Laravel的容器太重，虽然好用，但是还是不太想用这个，因此，这里使用了MdCalls组件来解决依赖方式，可见框架中mdcalls目录，mdcalls支持rpc与框架内调用，内置了database,queue以及redis服务，具体使用方式可见文档

- 自动加载
   
   使用composer和命名空间，遵循psr-4规范
   
- 异常模块

   错误捕获，异常捕获，让错误可以被异常一样捕捉，并且友好的提示错误，关键函数set_error_handler，set_exception_handler，register_shutdown_function

- 路由
   解析请求，基于fastroute组件开发，支持自定义路由以及默认路由，为了不占内存，缓存了路由，获得待处理的的模块，控制器和方法
   
- 控制器
   获取每个控制器定义的中间件，先经过中间件解析处理，最后才控制器
   
- 中间件
   借鉴了Laravel的pipeline编写了路由中间件
 
- 响应
  模板引擎使用twig组件，支持变量赋值以及模板，支持json响应
  
- 数据库
   采用第三方database组件方式，利用mdcalls提供服务
   
- 其他友好函数
  日志工具类，文件读取文件，日志读取类，配置文件读取类

- queue
  任务队列组件，支持延时队列以及失败任务重试
  
## TODO

- [ ] 请求参数的验证模块
- [ ] 集成[php-debugbar](https://github.com/maximebf/php-debugbar)
- [ ] 使用kickpeach做一个demo

## 帮助kickpeach改进

欢迎给Kickpeach提issue:[https://github.com/KickPeach/kickPeach/issues](https://github.com/KickPeach/kickPeach/issues)
  
  