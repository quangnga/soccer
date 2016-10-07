<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cities Region'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="citiesRegions index large-9 medium-8 columns content">
    <h3><?= __('Cities Regions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citiesRegions as $citiesRegion): ?>
            <tr>
                <td><?= $citiesRegion->has('city') ? $this->Html->link($citiesRegion->city->id, ['controller' => 'Cities', 'action' => 'view', $citiesRegion->city->id]) : '' ?></td>
                <td><?= $citiesRegion->has('region') ? $this->Html->link($citiesRegion->region->name, ['controller' => 'Regions', 'action' => 'view', $citiesRegion->region->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $citiesRegion->city_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $citiesRegion->city_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $citiesRegion->city_id], ['confirm' => __('Are you sure you want to delete # {0}?', $citiesRegion->city_id)]) ?>
                </td>
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
