<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="requests view content">
            <h3><?= h($request->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Guest') ?></th>
                    <td><?= $request->has('guest') ? $this->Html->link($request->guest->name, ['controller' => 'Guests', 'action' => 'view', $request->guest->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Request Type') ?></th>
                    <td><?= h($request->request_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Food') ?></th>
                    <td><?= $request->has('food') ? $this->Html->link($request->food->name, ['controller' => 'Foods', 'action' => 'view', $request->food->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $request->has('employee') ? $this->Html->link($request->employee->name, ['controller' => 'Employees', 'action' => 'view', $request->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
