<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm; 
?>

<?php $form = ActiveForm::begin(array(
    'options' => array('class' => 'form-horizontal', 'role' => 'form'),
    )); ?>
     <div class="form-group">
        <?php echo $form->field($model, 'name')->textInput(['class' => 'form-control']); ?>
    </div>
     <div class="form-group">
        <?php echo $form->field($model, 'username')->textInput(['class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?php echo $form->field($model, 'password')->textInput(['class' => 'form-control']); ?>
    </div>
     <div class="form-group">
        <?php echo $form->field($model, 'email')->textInput(['class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?php echo $form->field($model, 'mobile')->textInput(['class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <?php echo $form->field($model, 'gender')->textInput(['class' => 'form-control']); ?>
    </div>
    <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right']); ?>
<?php ActiveForm::end(); ?>