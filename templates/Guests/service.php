<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Guest $guest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(('New Request'), ['controller' => 'Requests', 'action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="guests view content">
            <h3><?= h($guest->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($guest->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Room') ?></th>
                    <td><?= $guest->has('room') ? $this->Html->link($guest->room->name, ['controller' => 'Rooms', 'action' => 'view', $guest->room->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($guest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entry Date') ?></th>
                    <td><?= h($guest->entry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Date') ?></th>
                    <td><?= h($guest->departure_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
