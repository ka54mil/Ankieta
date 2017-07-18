<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('question_id', __('question id')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('question', __('question')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $question->has('question_id') ? $this->Html->link($question->question_id, ['controller' => 'Questions', 'action' => 'view', $question->question_id]) : '' ?></td>
                <td><?= $question->has('question') ? $this->Html->link($question->question, ['controller' => 'Questions','action' => 'view', $question->question_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->question_id], ['class' => 'glyphicon glyphicon-search','escape' =>false]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->question_id], ['class' => 'glyphicon glyphicon-pencil','escape' =>false]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->question_id], ['class' =>'glyphicon btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $question->question_id)]) ?>
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
