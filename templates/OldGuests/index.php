<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OldGuest> $oldGuests
 */
?>
<div class="oldGuests index content">
    kullanicilarin istege gore old guests tablosuna veri eklememesi lazim, bu sadece departing guests tablosundan bir misafirin 'depart' edilerek yapilmasi lazim
    <h3><?= __('Old Guests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('guest_name') ?></th>
                    <th><?= $this->Paginator->sort('guest_age') ?></th>
                    <th><?= $this->Paginator->sort('guest_room_id') ?></th>
                    <th><?= $this->Paginator->sort('guest_entry_date') ?></th>
                    <th><?= $this->Paginator->sort('guest_departure_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oldGuests as $oldGuest): ?>
                <tr>
                <td><?= $this->Number->format($oldGuest->id) ?></td>
                    <td><?= h($oldGuest->guest_name) ?></td>
                    <td><?= $this->Number->format($oldGuest->guest_age) ?></td>
                    <td><?= $this->Number->format($oldGuest->guest_room_id) ?></td>
                    <td><?= h($oldGuest->guest_entry_date) ?></td>
                    <td><?= h($oldGuest->guest_departure_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $oldGuest->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oldGuest->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oldGuest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldGuest->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
