<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1>All users</h1>
<?php
foreach($users as $user){
    echo '<div>';
    echo $user->name, " ", $user->email, " ", $user->user_id;
    echo '</div>';
}
