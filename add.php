<?php
require './__init__.php';
Rhaco::import('generic.Views');

Rhaco::import('model.Todo');

$views = new Views();

$views->create(new Todo());
$views->write();
