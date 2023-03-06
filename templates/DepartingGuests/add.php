<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DepartingGuest $departingGuest
 * @var \Cake\Collection\CollectionInterface|string[] $guests
 */
?>
<div class="row">
    Bu sayfanin pek bir islevi yok, veritabaninda olusturdugum bir event her gece 00:00'da guests tablosundaki
    misafirlarin departure datelerine bakar ve eger gunu geldiyse onlari departing guests tablosuna aktarir.
    Misafirin guests tablosundan silinmesi, /departing-guests/index'te misafirin satirindaki 'depart' butonuna bastiktan
    sonra tamamlanir.

    Bunun sebebi ise kurdugum senaryoya gore misafirin depart tarihi geldiginde esyalarini toplar resepiyona gider ve cikis islemini tamamlar
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Departing Guests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departingGuests form content">
            <?= $this->Form->create($departingGuest) ?>
            <fieldset>
                <legend><?= __('Add Departing Guest') ?></legend>
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

