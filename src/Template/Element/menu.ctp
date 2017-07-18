<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Table[]|\Cake\Collection\CollectionInterface $entities
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questions <span class="glyphicon glyphicon-search"></span>'), ['controller' => 'Questions', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users <span class="glyphicon glyphicon-user"></span>'), ['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers <span class="glyphicon glyphicon-text-background"></span>'), ['controller' => 'Answers', 'action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?> </li>
    </ul>
</nav>