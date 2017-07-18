<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->question_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $question->has('question') ? $this->Html->link($question->question_id, ['controller' => 'Questions', 'action' => 'view', $question->question_id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($question->question)); ?>
    </div>
</div>
