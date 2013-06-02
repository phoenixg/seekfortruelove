TRUELOVE
========

- **项目名称：** TRUELOVE
- **正式域名：** seekfortruelove.org
- **技术架构：**
    - 开发框架：laravel 3
    - bundles ：
    - verify: http://bundles.laravel.com/bundle/verify 或 http://docs.toddish.co.uk/verify/
    - 前端前台框架：http://designmodo.github.io/Flat-UI/
    - 前端后台框架：
- **项目简介：** 20130409 重启项目，用于生产级，而非测试、实验、学习级

# 详细的文档，全部写在这里
##  安装指南 ##
    # 设置邮箱密码
    config/application.php 设置 mail_password

    # 设置应用程序基本配置和数据库配置
    config/application.php
    config/database.php

    # ubuntu 下安装imagick
    sudo apt-get install php5-imagick
    sudo apt-get install libmagickwand-dev
    sudo apt-get install imagemagick
    sudo pecl install imagick # 似乎不需要
    ;extension=/usr/lib/php5/20090626+lfs/imagick.so # 似乎不需要
    sudo service apache2 restart

    # 将目录权限授予apache群组，以解决sketch命令/文件的不生效问题
    sudo chown -R www-data:www-data /var/www/truelove/
    sudo chown -R phx:phx /var/www/truelove/ # 要让ST2能编辑，只能切换成这样

    # 去掉URI中的index.php
    # application/config/application.php 设置 'index' => ''
    # 使用本项目的.htaccess，并用下面的命令开启apache的URL rewrite模块
    sudo a2enmod rewrite # ubuntu 12.04
    sudo service apache2 restart

    # 移植数据库
    php artisan migrate:install
    php artisan migrate

##### 用户权限说明 #####
      verified :
            公开权限表
            0 账号已注册，未激活邮箱，未审核资料 [都不能]
            1 账号已注册，已激活邮箱，未审核资料 [能搜索，不能被搜索到]
            2 账号已注册，已激活邮箱，已审核资料 [都可以，即能被搜索到]
            9 账号被封禁 [都不能]

## 问题解决 ##
1 使用artisan安装bundles的时候，提示`“The bundle API is not responding.”`的解决方法 （ 参考了：http://forums.laravel.io/viewtopic.php?id=1835 ）

    首先确保开启了ssl模块，php.ini：
    extension= php _openssl.dll

    然后确保这项被开启，php.ini：
    allow_url_fopen = On

## URI 的设计 ##
    GET http://seekfortruelove.org/                                - 首页 done
    GET http://seekfortruelove.org/faq/                            - 常见问题
    GET http://seekfortruelove.org/memorabilia/                    - 大事记
    GET http://seekfortruelove.org/contact/                        - 联系我们
    GET http://seekfortruelove.org/privacy/                        - 隐私声明
    GET http://seekfortruelove.org/help/                           - 帮助中心
    GET http://seekfortruelove.org/documents/                      - 帮助中心

    GET http://seekfortruelove.org/login/                          - 登录
    GET http://seekfortruelove.org/search/                         - 搜索

    GET http://seekfortruelove.org/dashboard/                      - 用户控制面板
    GET http://seekfortruelove.org/dashboard/profile/              - 用户个人信息
    GET http://seekfortruelove.org/dashboard/image/                - 用户照片相册
    GET http://seekfortruelove.org/dashboard/personalad/           - 用户征婚启事
    GET http://seekfortruelove.org/dashboard/stats/                - 用户统计信息

    GET http://seekfortruelove.org/admin/dashboard/                - 管理员控制面板
    GET http://seekfortruelove.org/admin/dashboard/profile/        - 管理员个人信息
    GET http://seekfortruelove.org/admin/manage/                   - 管理员登录

## TODO / MEMO ##
- 禁止IE？
- 为什么一个无邪的想法要被别人的猜疑心阻拦？
- 当前注册数的实时显示
- 公开统计信息图表
- 想办法让注册的女生多一点，以免男生过多比例失衡
- 推荐浏览器：firefox，chrome，IE 6屏蔽
- 结婚要求、未来子女教育、如何煮饭、财产分配大权，对某事的看法
- 罪恶文化言辞仍然不被删，提倡清净却被删的氛围
- 禁止词过滤，不准不良关键词提交，如"一辈子"（佛教说法？）,缘分（增加了机会不平等、信息不对称，即有缘分的熟人、有关系的人，对其互相好）,但实在要提交也允许，不过需管理员告知
- 文档：争论的每一个细节记录文章发布，如关于收入的讨论
- 互动性设计，有互动才有人访问
- 隐私保密原则 如 qq交换
- 请我吃一包薯片（5元），星巴克（30元）、pizza（50元）
- 注册成功后分享至腾讯、新浪微博，用来推广，要用好推广媒介
- 不想再看它的功能
- 开放相册给它的功能
- 反可复制性设计，让这个站点拥有其他基督徒如果想复制却无法复制的元素
- 改成只开发在linux的目录下的git代码，放弃windows xampp环境下开发
- 通过实名制和照片身份认证的人员不仅有头像，还有高级菜单，可以显示统计信息
- 100%实名认证、身份认证、学历认证 真实性
- 必须是免费的证明，尽管免费但是提供超乎收费网站的功能和体验，极优异架构，设计思想
- 各主内交友网站对比专题论文、抗辩
- 征婚启事、爱情理念：如如何计划未来的子女教育
- 优秀的对话设计
- QRcode
- 个人信息页：他/她比我大/小 .. 岁
- 忘记密码
- dashboard 修改密码
- 谁、什么时候登录了，存进数据库(正好用于活跃度曲线)
- 审核、审核不通过理由，数据表
- 征集logo的设计
- 最近看过谁的浏览记录
- 对会编程的人开放设计提交，如css，js，后台管理员授权其安全性，比如可以做成js特效爱心








