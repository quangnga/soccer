<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->input('club_id', ['options' => $clubs]);
            echo $this->Form->input('city_name');
            echo $this->Form->input('region_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
