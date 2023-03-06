<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Guest> $guests
 */
?>
<div class="guests index content">
    <?= $this->Html->link(__('New Guest'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Guests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('room_id') ?></th>
                    <th><?= $this->Paginator->sort('entry_date') ?></th>
                    <th><?= $this->Paginator->sort('departure_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guests as $guest): ?>
                <tr>
                <td><?= $this->Number->format($guest->id) ?></td>
                    <td><?= h($guest->name) ?></td>
                    <td><?= $guest->has('room') ? $this->Html->link($guest->room->name, ['controller' => 'Rooms', 'action' => 'view', $guest->room->id]) : '' ?></td>
                    <td><?= h($guest->entry_date) ?></td>
                    <td><?= h($guest->departure_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $guest->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $guest->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $guest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id)]) ?>
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
