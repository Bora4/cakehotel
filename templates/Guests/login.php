<?php
/**
 * @var \App\View\AppView $this
 */
echo "bu sayfanin amaci misafirlerin odasinda bir tablet gibi bir seyden oda servisi veya yemek talep etmeleri icindir. ideal bir projede bunun ayri bir uygulama olmasini tercih ederim.
Guvenlik ve authentication olarak bir sey yok. Istediginiz userin IDsini kullanarak o user adina request yaratabilirsiniz. Kullandiginiz id session'a current_guest_id adina atanir";
 echo $this->Form->create();
 echo $this->Form->control('ID', ['type' => 'number', 'required' => 'true']);
 echo $this->Form->submit(__('Login'), ['name' => 'my_button']);
 echo $this->Form->end();
 echo $this->Html->link("User Login", ['controller' => 'Users', 'action' => 'login']);
