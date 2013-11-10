<!-- File: /app/View/Pages/edit.ctp -->

<h1>Edit Page</h1>
<?php
    echo $this->Form->create('Page');
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Page');