<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Training'), ['action' => 'edit', $training->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Training'), ['action' => 'delete', $training->id], ['confirm' => __('Are you sure you want to delete # {0}?', $training->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trainings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Training'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trainings view large-9 medium-8 columns content">
    <h3><?= h($training->start_date) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($training->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Of Users') ?></th>
            <td><?= $this->Number->format($training->number_of_users) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($training->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($training->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Training Time') ?></th>
            <td><?= h($training->training_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clubs') ?></h4>
        <?php if (!empty($training->clubs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Training Id') ?></th>
                <th><?= __('Club Name') ?></th>
                <th><?= __('Phone1') ?></th>
                <th><?= __('Phone2') ?></th>
                <th><?= __('Address') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($training->clubs as $clubs): ?>
            <tr>
                <td><?= h($clubs->id) ?></td>
                <td><?= h($clubs->training_id) ?></td>
                <td><?= h($clubs->club_name) ?></td>
                <td><?= h($clubs->phone1) ?></td>
                <td><?= h($clubs->phone2) ?></td>
                <td><?= h($clubs->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clubs', 'action' => 'view', $clubs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clubs', 'action' => 'edit', $clubs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clubs', 'action' => 'delete', $clubs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clubs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
