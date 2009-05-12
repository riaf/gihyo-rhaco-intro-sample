<?php
require './__init__.php';
Rhaco::import('generic.Views');

Rhaco::import('model.Category');
Rhaco::import('model.Todo');

$views = new Views();

$views->read(new Todo(), new C(Q::fact()));
$views->setVariable('categories', $views->dbUtil->select(new Category()));

$views->write('list.html');
