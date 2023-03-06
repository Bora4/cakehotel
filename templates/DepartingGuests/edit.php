<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DepartingGuest $departingGuest
 * @var string[]|\Cake\Collection\CollectionInterface $guests
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $departingGuest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $departingGuest->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Departing Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departingGuests form content">
            <?= $this->Form->create($departingGuest) ?>
            <fieldset>
                <legend><?= __('Edit Departing Guest') ?></legend>
                <?php
                    echo $this->Form->control('guest_id', ['options' => $guests]);
                    echo $this->Form->control('guest_departure_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
