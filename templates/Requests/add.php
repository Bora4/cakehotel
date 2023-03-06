<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 * @var \Cake\Collection\CollectionInterface|string[] $guests
 * @var \Cake\Collection\CollectionInterface|string[] $foods
 */
?>
<script>
    function my_func(){
        var requestType = document.getElementById("request_type").value;
        var foodForm = document.getElementById("food_id");
        var label = document.getElementById('food_label');
        if(requestType == 'room_service'){
            foodForm.style.display = "none";
            label.style.display = "none";
        } else {
            foodForm.style.display = "block";
            label.style.display = "block";
        }
        
    }
</script>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <!-- <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requests form content">
            <?= $this->Form->create($request) ?>
            <fieldset>
                <legend><?= __('Add Request') ?></legend>
                <?php
                    echo $this->Form->control('request_type', ['type' => 'select', 'id' => 'request_type', 'options' => ['food' => 'Food', 'room_service' => 'Room Service'], 'onChange' => 'my_func()']);
                    echo $this->Form->label('Food', null, ['id' => 'food_label']);
                    echo $this->Form->control('food_id', ['options' => $foods, 'id' => 'food_id', 'empty' => true, 'label' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            <?= $this->Html->link("Back", ['action' => 'Back']); ?>
        </div>
    </div>
</div>
