<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DepartingGuest> $departingGuests
 */
?>
<div class="departingGuests index content">
    Misafirin guests tablosundan ve departing guests tablosundan silinip, butun requestlerinin silinmesi ve misafirin old guests tablosuna eklenmesi icin
    depart linki kullanilmali. Test amaciyla buraya bir sey eklemek istiyorsaniz linkin yanina /add ekleyebilir veya var olan bir misafirin id'sini ve departure_datesini
    (dogru olmak zorunda degil herhangi bir check bulunmamakta) insert edebilirsiniz.
    <!-- <?= $this->Html->link(__('New Departing Guest'), ['action' => 'add'], ['class' => 'button float-right']) ?> kurdugum senaryoya gore kullanicilarin kendisi departin guests eklememeli
bunu veri tabaninda olusturdugum daily_check eventi her gece 00:00da guest tablosundaki misafirlerin departure_datelerine bakarak yapar-->
    <h3><?= __('Departing Guests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('guest_id') ?></th>
                    <th><?= $this->Paginator->sort('guest_departure_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departingGuests as $departingGuest): ?>
                <tr>
                    <td><?= $this->Number->format($departingGuest->id) ?></td>
                    <td><?= $departingGuest->has('guest') ? $this->Html->link($departingGuest->guest->name, ['controller' => 'Guests', 'action' => 'view', $departingGuest->guest->id]) : '' ?></td>
                    <td><?= h($departingGuest->guest_departure_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $departingGuest->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $departingGuest->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $departingGuest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departingGuest->id)]) ?>
                        <?= $this->Html->link(__('Depart'), ['action' => 'depart', $departingGuest->id,$departingGuest->guest_id]) ?>
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
