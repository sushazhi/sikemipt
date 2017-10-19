<?php
if(!defined('IN_DISCUZ')) {
        exit('Access Denied');
}                
if(isset($_POST['refreshsr']))
{
   refresh_shareratio();
}
template('refreshshareratio', "sikemi","source/plugin/sikemi/templates");
function refresh_shareratio()
{
	global $_G;
    $credits_query=DB::query("select * from ".DB::table('common_member_count')." where uid={$_G['uid']}");
    $credit=mysqli_fetch_assoc($credits_query);
    $upload_credit=$credit['extcredits3'];
    $down_credit=$credit['extcredits4'];
    if ($down_credit==0)
    {
       DB::query("update ".DB::table('common_member_count')." set extcredits5='0.000' where uid={$_G['uid']}");
    }else{
        $ratio=$upload_credit/$down_credit;
        if($ratio>999.999)
        {
           DB::query("update ".DB::table('common_member_count')." set extcredits5='999.999' where uid={$_G['uid']}");
        }else{
	        DB::query("update ".DB::table('common_member_count')." set extcredits5='{$ratio}' where uid={$_G['uid']}");
            }
        }
        mysqli_free_result($credits_query);
}
?>