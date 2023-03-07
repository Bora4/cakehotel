<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OldGuest $oldGuest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Old Guest'), ['action' => 'edit', $oldGuest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Old Guest'), ['action' => 'delete', $oldGuest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldGuest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Old Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="oldGuests view content">
            <h3><?= h($oldGuest->id) ?></h3>
            <table>
            <tr>
                    <th><?= __('Guest Name') ?></th>
                    <td><?= h($oldGuest->guest_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($oldGuest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Age') ?></th>
                    <td><?= $this->Number->format($oldGuest->guest_age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Room Id') ?></th>
                    <td><?= $this->Number->format($oldGuest->guest_room_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Entry Date') ?></th>
                    <td><?= h($oldGuest->guest_entry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Departure Date') ?></th>
                    <td><?= h($oldGuest->guest_departure_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
