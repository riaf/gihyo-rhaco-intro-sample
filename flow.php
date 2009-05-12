<?php
require './__init__.php';
Rhaco::import('generic.Flow');
Rhaco::import('database.DbUtil');

Rhaco::import('model.Category');
Rhaco::import('model.Todo');

$db = new DbUtil(Category::connection());
$flow = new Flow();

$flow->setVariable('categories', $db->select(new Category()));
$flow->setVariable('object_list', $db->select(new Todo(), new C(Q::fact())));

$flow->write('list.html');
