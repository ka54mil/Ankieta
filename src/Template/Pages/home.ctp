<div class="answers form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type' => 'post', 'url' =>['action' => 'answer/'.$this->Paginator->current($model = null)]]) ?>
    <?php foreach($answers as $key => $answer): ?>
        <fieldset>
            <?php
                echo $this->Form->control(null, ['value' => $answer->user_id, 'name' => 'user_id[]', 'type' => 'hidden']);
                echo $this->Form->control(null, ['value' => $answer->question_id, 'name' => 'question_id[]', 'type' => 'hidden']);
                foreach($questions as $question){
                    if($question->question_id == $answer->question_id){
                        echo $this->Form->control(null, ['value' => $question->question, 'disabled' => 'disabled']);
                        echo $this->Form->control(null, ['value' => $answer->answer, 'name' => 'answer[]']);
                    }
                }
            ?>
        </fieldset>
    <?php endforeach; ?>
    <ul class="pagination">
            <?= $this->Form->button(__('next question') . ' >', ['type' => 'submit']) ?>
        </ul>
    <?= $this->Form->end() ?>
</div>
