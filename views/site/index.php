<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php use yii\helpers\Html; ?>

<?php echo Html::a('Create New User', array('site/create'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<table class="table table-striped table-hover">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>UserName</td>
        <td>Email</td>
        <td>Mobile</td>
        <td>Gender</td>
    </tr>
    <?php foreach ($models as $user): ?>
        <tr>
            <td><?php echo $user -> id ?></td>
            <td><?php echo $user -> name ?></td>
            <td><?php echo $user-> username ?></td>
            <td><?php echo $user-> email ?></td>
            <td><?php echo $user-> mobile ?></td>
            <td><?php echo $user-> gender ?></td>
            <td>
                <?php echo Html::a('update', array('site/create', 'id'=>$user->id)); ?>
                <?php echo Html::a('delete', array('site/delete', 'id'=>$user->id), array('data-method'=>'post')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
