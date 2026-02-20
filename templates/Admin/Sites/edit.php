<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $site->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $site->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sites form content">
            <?= $this->Form->create($site) ?>
            <fieldset>
                <legend><?= __('Edit Site') ?></legend>
                <?php
                    echo $this->Form->control('uuid');
                    echo $this->Form->control('domain');
                    echo $this->Form->control('status');
                    echo $this->Form->control('config');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
