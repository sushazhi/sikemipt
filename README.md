思可觅pt插件备份

安装指南(http://ratwu.com/2011/05/discuzx-bt-plugin/)

注：本插件适用于discuzX2.0 utf8版本，其他版本尚未测试，安装前请备份数据。若要正式使用，最好先本地全新安装一遍配置熟悉后再正式使用。本插件测试时间较短，难免有bug，建议有php基础的人安装和使用。

第一步：下载压缩包，解压后将文件上传到网站根目录，保持目录结构，配置xbt/config.php文件，修改数据库等相关参数。到后台安装“思可觅”插件。

第二步：设置上传下载两种积分并启用，默认值上传积分编号是3，下载积分编号是4，填入到xbt/config.php文件中。

第三步：设置可以发布资源的版块和相关用户特殊主题权限。到论坛后台添加资源区，并限定该区只能发布资源主题，如下图所示。



插件刚安装好任何用户都没有权限发布资源主题的，包括管理员，到用户标签下设置各个用户发布资源的权限。

第四步：在“工具-计划任务”标签下添加计划任务“清除过期种子”设定每小时执行一次，选择文件为：cron_delete_peers_hourly.php目的是清除由于意外断网等原因造成的无效种子信息。

第五步：在static/js/forum_post.js文件中第74行添加。是为了检查用户在发布资源时是否选择种子文件。

else if(theform.torrent && theform.torrent.value==””){ showDialog(‘您没有选择种子文件’); return false; }
如图：



第六步：修改template\default\forum\post.htm文件，84行form添加属性

enctype=”multipart/form-data”
如图：



第七步：修改source\function\function_delete.php文件末尾加上：

function deletetorrent($tids){

$query=DB::query(“select url FROM “.DB::table(‘xbtit_files’).” WHERE tid IN   ($tids)”); while($row=DB::fetch($query)){

@unlink($row[‘url’]); }

DB::delete(‘xbtit_files’, “tid IN ($tids)”);

DB::delete(‘xbtit_peers’, “tid IN ($tids)”);

}
并在function deletethread（）中 361行DB::query(“DELETE FROM “.DB::table(‘forum_threadrush’).” WHERE tid IN ($tids)”, ‘UNBUFFERED’);后，加上deletetorrent($tids);

如图

此处为添加删除帖子的时删除数据库种子信息和删除种子文件的功能。放入回收站时并不删除，从回收站删除时才删除。至此，配置完成。
