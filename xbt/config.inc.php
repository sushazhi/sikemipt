<?php
/**************************注意*****************************
1、请勿分表forum_thread
2、设置不同的权重请在插件sikemi目录下上传相应权重命名的图片
************************************************************/


//应用程序数据库连接参数
$dbhost = 'localhost';			// 数据库服务器
$dbuser = 'root';				// 数据库用户名
$dbpw = 'root';					// 数据库密码
$dbname = 'discuz';				// 数据库名
$pconnect = 0;					// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'pre_';   			// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定

//上传下载权重 暂时不从数据库获取$_G['cache']['plugin']['sicau_pt_x2']['test'];
$upload_weight['top']=1;		//置顶上传权重
$upload_weight['highlight']=1;//高亮上传权重
$upload_weight['normal']=1;		//正常上传权重
$upload_weight['digest1']=1.2;		//精华1上传权重
$upload_weight['digest2']=1.3;		//精华2上传权重
$upload_weight['digest3']=1.5;		//精华3上传权重

$down_weight['top']=0;          //置顶下载权重
$down_weight['highlight']=0.5;  //高亮下载权重  0.5
$down_weight['normal']=1;       //正常下载权重1
$down_weight['digest1']=0.7;       //精华1下载权重0.7
$down_weight['digest2']=0.5;       //精华2下载权重0.5
$down_weight['digest3']=0.3;       //精华3下载权重0.3

$upload_credit=3;                               //上传积分编号
$down_credit=4;                                 //下载积分编号
$tracker_url="http://bt.sicau.me/xbt/announce.php?pid=";//tracker地址
$ucenter_url="http://ucenter.sicau.me/";               //UCenter地址:用来头像显示
$help_url="http://bt.sicau.me/thread-295911-1-1.html";  //做种教程地址，在发帖页面显示，请自行修改
