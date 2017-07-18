<div class="answers index large-9 medium-8 columns content">
    <h3><?= __('Answers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('answer_id', __('Answer id')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer', __('Answer')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_id', __('Question id')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', __('User id')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answers as $answer): ?>
            <tr>
                <td><?= $answer->has('answer_id') ? $this->Html->link($answer->answer_id, ['controller' => 'Answers', 'action' => 'view', $answer->answer_id]) : '' ?></td>
                <td><?= $answer->has('answer') ? $this->Html->link($answer->answer, ['controller' => 'Answers', 'action' => 'view', $answer->answer_id]) : '' ?></td>
                <td><?= $answer->has('question_id') ? $this->Html->link($answer->question_id, ['controller' => 'Questions', 'action' => 'view', $answer->question_id]) : '' ?></td>
                <td><?= $answer->has('user_id') ? $this->Html->link($answer->user_id, ['controller' => 'Users', 'action' => 'view', $answer->user_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $answer->answer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $answer->answer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answer->answer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->answer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
