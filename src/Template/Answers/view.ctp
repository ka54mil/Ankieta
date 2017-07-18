<div class="answers view large-9 medium-8 columns content">
    <h3><?= h($answer->answer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Answer id') ?></th>
            <td><?= $answer->has('answer_id') ? $this->Html->link($answer->answer_id, ['controller' => 'Answers', 'action' => 'view', $answer->answer_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question id') ?></th>
            <td><?= $answer->has('question_id') ? $this->Html->link($answer->question_id, ['controller' => 'Questions', 'action' => 'view', $answer->question_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User id') ?></th>
            <td><?= $answer->has('user_id') ? $this->Html->link($answer->user_id, ['controller' => 'Users', 'action' => 'view', $answer->user_id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($answer->answer)); ?>
    </div>
</div>
