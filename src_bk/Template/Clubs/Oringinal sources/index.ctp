<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?php if($is_admin){ ?>
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trainings'), ['controller' => 'Trainings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Training'), ['controller' => 'Trainings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
    <?php }?>
</nav>
<div class="clubs index large-9 medium-8 columns content">
    <h3><?= __('Clubs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('training_id') ?></th>
                <th><?= $this->Paginator->sort('club_name') ?></th>
                <th><?= $this->Paginator->sort('phone1') ?></th>
                <th><?= $this->Paginator->sort('phone2') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <?php if($is_admin){ ?>
                <th class="actions "><?= __('Actions') ?></th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clubs as $club): ?>
            <tr>
                <td><?= $this->Number->format($club->id) ?></td>
                <td><?= $club->has('training') ? $this->Html->link($club->training->start_date, ['controller' => 'Trainings', 'action' => 'view', $club->training->id]) : '' ?></td>
                <td><?= h($club->club_name) ?></td>
                <td><?= $this->Number->format($club->phone1) ?></td>
                <td><?= $this->Number->format($club->phone2) ?></td>
                <td><?= h($club->address) ?></td>
                <td><?= h($club->city) ?></td>
                <?php if($is_admin){ ?>
                <td class="actions  ">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $club->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $club->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?>
                </td>
                <?php }?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>


<?php
    
?>

