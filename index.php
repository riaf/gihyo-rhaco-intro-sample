<?php
require_once '__init__.php';
Rhaco::import('generic.Urls');
Rhaco::import('model.Todo');
Rhaco::import('model.Category');

$db = new DbUtil(Category::connection());
$patterns = array(
	// リスト
	'^$' => array(
		'class' => 'generic.Views',
		'method' => 'read',
		'args' => array(new Todo(), new C(Q::eq(Todo::columnClose(), false), Q::fact())),
		'template' => 'list.html',
	),
	// generic.Views を使用する場合は、設定を省略できます。
	'^detail/(\d+)$' => array('method' => 'detail', 'args' => array(new Todo(), new C(Q::fact()))),
	'^create$' => array('method' => 'create', 'args' => array(new Todo(), Rhaco::url())),
	'^update/(\d+)$' => array('method' => 'update', 'args' => array(new Todo(), null, Rhaco::url())),
	'^delete/(\d+)$' => array('method' => 'delete', 'args' => array(new Todo(), null, Rhaco::url())),
	
    // Category:: depends のサンプル
    '^cat/(\d+)$' => array('method' => 'detail', 'args' => array(new Category(), new C(Q::depend()))),
);
$parser = Urls::parser($patterns, $db);
$parser->setVariable('categories', $db->select(new Category()));
$parser->write();
