--TEST--
MongoDB\Driver\WriteError::getMessage()
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; ?>
<?php NEEDS('STANDALONE_30'); CLEANUP(STANDALONE_30) ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE_30);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['_id' => 1]);
$bulk->insert(['_id' => 1]);
$bulk->insert(['_id' => 1]);

try {
    $manager->executeBulkWrite(NS, $bulk);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e->getWriteResult()->getWriteErrors()[0]->getMessage());
}

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(100) "E11000 duplicate key error index: phongo.writeError_writeerror_getMessage_001.$_id_ dup key: { : 1 }"
===DONE===
