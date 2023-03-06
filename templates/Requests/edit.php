<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 * @var string[]|\Cake\Collection\CollectionInterface $guests
 * @var string[]|\Cake\Collection\CollectionInterface $foods
 * @var string[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $request->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requests form content">
            <?= $this->Form->create($request) ?>
            <fieldset>
                <legend><?= __('Edit Request') ?></legend>
                <?php
                    echo $this->Form->control('guest_id', ['options' => $guests]);
                    echo $this->Form->control('request_type');
                    echo $this->Form->control('food_id', ['options' => $foods, 'empty' => true]);
                    echo $this->Form->control('employee_id', ['options' => $employees, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
