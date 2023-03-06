<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OldGuest $oldGuest
 * @var \Cake\Collection\CollectionInterface|string[] $guests
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Old Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="oldGuests form content">
            <?= $this->Form->create($oldGuest) ?>
            <fieldset>
                <legend><?= __('Add Old Guest') ?></legend>
                <?php
                    echo $this->Form->control('guest_id', ['options' => $guests]);
                    echo $this->Form->control('guest_name');
                    echo $this->Form->control('guest_age');
                    echo $this->Form->control('guest_room_id');
                    echo $this->Form->control('guest_entry_date');
                    echo $this->Form->control('guest_departure_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
