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
            <?= $this->Html->link(__('Edit Guest'), ['action' => 'edit', $guest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Guest'), ['action' => 'delete', $guest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Guest'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
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
                    <th><?= __('Age') ?></th>
                    <td><?= $this->Number->format($guest->age) ?></td>
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
            <div class="related">
                <h4><?= __('Related Departing Guests') ?></h4>
                <?php if (!empty($guest->departing_guests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Guest Id') ?></th>
                            <th><?= __('Guest Departure Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($guest->departing_guests as $departingGuests) : ?>
                        <tr>
                            <td><?= h($departingGuests->id) ?></td>
                            <td><?= h($departingGuests->guest_id) ?></td>
                            <td><?= h($departingGuests->guest_departure_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DepartingGuests', 'action' => 'view', $departingGuests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DepartingGuests', 'action' => 'edit', $departingGuests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DepartingGuests', 'action' => 'delete', $departingGuests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departingGuests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Old Guests') ?></h4>
                <?php if (!empty($guest->old_guests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Guest Id') ?></th>
                            <th><?= __('Guest Name') ?></th>
                            <th><?= __('Guest Age') ?></th>
                            <th><?= __('Guest Room Id') ?></th>
                            <th><?= __('Guest Entry Date') ?></th>
                            <th><?= __('Guest Departure Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($guest->old_guests as $oldGuests) : ?>
                        <tr>
                            <td><?= h($oldGuests->id) ?></td>
                            <td><?= h($oldGuests->guest_id) ?></td>
                            <td><?= h($oldGuests->guest_name) ?></td>
                            <td><?= h($oldGuests->guest_age) ?></td>
                            <td><?= h($oldGuests->guest_room_id) ?></td>
                            <td><?= h($oldGuests->guest_entry_date) ?></td>
                            <td><?= h($oldGuests->guest_departure_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OldGuests', 'action' => 'view', $oldGuests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OldGuests', 'action' => 'edit', $oldGuests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OldGuests', 'action' => 'delete', $oldGuests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldGuests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Requests') ?></h4>
                <?php if (!empty($guest->requests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Guest Id') ?></th>
                            <th><?= __('Request Type') ?></th>
                            <th><?= __('Food Id') ?></th>
                            <th><?= __('Employee Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($guest->requests as $requests) : ?>
                        <tr>
                            <td><?= h($requests->id) ?></td>
                            <td><?= h($requests->guest_id) ?></td>
                            <td><?= h($requests->request_type) ?></td>
                            <td><?= h($requests->food_id) ?></td>
                            <td><?= h($requests->employee_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>