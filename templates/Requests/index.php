<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Request> $requests
 */
?>
<div class="requests index content">
    <!-- <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Requests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('guest_id') ?></th>
                    <th><?= $this->Paginator->sort('request_type') ?></th>
                    <th><?= $this->Paginator->sort('food_id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $this->Number->format($request->id) ?></td>
                    <td><?= $request->has('guest') ? $this->Html->link($request->guest->name, ['controller' => 'Guests', 'action' => 'view', $request->guest->id]) : '' ?></td>
                    <td><?= h($request->request_type) ?></td>
                    <td><?= $request->has('food') ? $this->Html->link($request->food->name, ['controller' => 'Foods', 'action' => 'view', $request->food->id]) : '' ?></td>
                    <td><?= $request->has('employee') ? $this->Html->link($request->employee->name, ['controller' => 'Employees', 'action' => 'view', $request->employee->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
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
