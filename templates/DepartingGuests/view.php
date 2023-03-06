<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DepartingGuest $departingGuest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Departing Guest'), ['action' => 'edit', $departingGuest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Departing Guest'), ['action' => 'delete', $departingGuest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departingGuest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Departing Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Departing Guest'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departingGuests view content">
            <h3><?= h($departingGuest->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Guest') ?></th>
                    <td><?= $departingGuest->has('guest') ? $this->Html->link($departingGuest->guest->name, ['controller' => 'Guests', 'action' => 'view', $departingGuest->guest->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($departingGuest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Guest Departure Date') ?></th>
                    <td><?= h($departingGuest->guest_departure_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
