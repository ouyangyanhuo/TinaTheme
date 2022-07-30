<!--
- TinaTheme - Backup
- 主题数据备份
- Origin Link：https://blog.zezeshe.com/archives/typecho-templates-backup-and-restore.html
-->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $db = Typecho_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:TinaTheme'));
    $ysj = $sjdq['value'];
    if(isset($_POST['type'])){ 
        if($_POST["type"]=="备份模板数据"){
        if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:TinaThemebf'))){
            $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:TinaThemebf');
            $updateRows= $db->query($update);
            echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
        }else{
            if($ysj){
                $insert = $db->insert('table.options')->rows(array('name' => 'theme:TinaThemebf','user' => '0','value' => $ysj));
                $insertId = $db->query($insert);
                echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
?>    
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
                }
            }
        }
    if($_POST["type"]=="还原模板数据"){
        if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:TinaThemebf'))){
            $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:TinaThemebf'));
            $bsj = $sjdub['value'];
            $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:TinaTheme');
            $updateRows= $db->query($update);
            echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
        }else{
            echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
        }
    }
    if($_POST["type"]=="删除备份数据"){
        if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:TinaThemebf'))){
            $delete = $db->delete('table.options')->where ('name = ?', 'theme:TinaThemebf');
            $deletedRows = $db->query($delete);
            echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
        }else{
            echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
            }
        }
    }
echo '<h2>主题备份</h2><form class="protected" action="?TinaThemebf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
?>