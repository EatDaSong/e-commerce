<?php

$form = new \app\form('post','#');

var_dump($form);

echo $form->begin_form();
echo $form->input('text','test');
echo $form->submit('test');
echo $form->end_form();