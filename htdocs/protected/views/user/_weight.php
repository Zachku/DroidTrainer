<div class="row"> 
    <?php echo CHtml::label('Weight', false); ?>
    <?php echo CHtml::activeDropDownList($set_model, 'weight', $weights, array('prompt' => 'Choose weight:')); ?> 
</div>