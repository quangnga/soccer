<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cities Region'), ['action' => 'edit', $citiesRegion->city_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cities Region'), ['action' => 'delete', $citiesRegion->city_id], ['confirm' => __('Are you sure you want to delete # {0}?', $citiesRegion->city_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cities Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="citiesRegions view large-9 medium-8 columns content">
    <h3><?= h($citiesRegion->city_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $citiesRegion->has('city') ? $this->Html->link($citiesRegion->city->id, ['controller' => 'Cities', 'action' => 'view', $citiesRegion->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $citiesRegion->has('region') ? $this->Html->link($citiesRegion->region->name, ['controller' => 'Regions', 'action' => 'view', $citiesRegion->region->id]) : '' ?></td>
        </tr>
    </table>
</div>
