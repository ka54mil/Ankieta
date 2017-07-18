<div class="answers view large-9 medium-8 columns content">
    <h3><?= h($answer->answer_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= $answer->has('answer') ? $this->Html->link($answer->answer->answer_id, ['controller' => 'Answers', 'action' => 'view', $answer->answer->answer_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $answer->has('question') ? $this->Html->link($answer->question->question_id, ['controller' => 'Questions', 'action' => 'view', $answer->question->question_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $answer->has('user') ? $this->Html->link($answer->user->user_id, ['controller' => 'Users', 'action' => 'view', $answer->user->user_id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($answer->answer)); ?>
    </div>
</div>
