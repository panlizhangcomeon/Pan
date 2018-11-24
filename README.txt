
URL 为 localhost/{项目名}/{模块}/{控制器}/{方法}

默认模块为 index , 默认控制器为 indexController ,默认方法为 index()

项目应用 ---pan/app

入口文件 --- pan/index.php

公共函数库 --- pan/common/function.php

基类 --- pan/core/pan.php

路由解析类 --- pan/core/lib/route.php

数据库加载类 --- pan/core/lib/model.php

配置加载文件： pan/core/config/...

日志驱动类： pan/core/lib/drive/log/file.php    加载框架的时候自动运行加载日志驱动

日志文件: pan/log/XXXXXXXXXX/log.php (XXXXXXXXXX表示年月日时，每小时的日志存储在一个文件)

支持自定义路由 myroute/xxx   ，只需要在 pan/core/route.php中加入相关配置即可 
					例如： 'ROUTE' => [
								'doc' => ['index', 'index', 'doc']
							]    
							输入 localhost/pan/myroute/doc   即可访问 localhost/pan/index/index/doc

加载的类库：
利用composer 加载了一个非常酷炫的错误显示类 flip/whoops

利用composer 加载了一个非常酷炫的变量类 symfony/var_dumper  ，可以使用dump()打印变量，‘效果装逼’

利用composer 加载了最轻的PHP数据库框架以加速开发 catfan/medoo ，数据库操作方法在 app/index/model/cModel.php

利用composer 加载了Twig模板引擎 twig/twig
             html中使用 { 变量名 }
             模板布局为layout.html
             layout.html：
             <header></header>为头部   <footer></footer>为尾部   <content></content>为内容
             content标签中 {% block content %} 开始标签      {% endblock %} 闭合标签

             index.html:
             {% extends "layout.html" %} 继承模板布局
             {% block content %} 开始标签    中间写 { 变量名 }   {% endblock %} 闭合标签

             