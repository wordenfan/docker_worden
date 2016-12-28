--TEST--
PHPC-705: Do not unnecessarily wrap filters in $query (profiled query)
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; CLEANUP(STANDALONE_30) ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE_30);

$command = new MongoDB\Driver\Command(['profile' => 2]);
$cursor = $manager->executeCommand(DATABASE_NAME, $command);
$result = current($cursor->toArray());

printf("Set profile level to 2 successfully: %s\n", (empty($result->ok) ? 'no' : 'yes'));

$manager->executeQuery(NS, new MongoDB\Driver\Query(["x" => 1]));

$query = new MongoDB\Driver\Query(
    [
        'op' => 'query',
        'ns' => NS,
    ],
    [
        'sort' => ['ts' => -1],
        'limit' => 1,
    ]
);
$cursor = $manager->executeQuery(DATABASE_NAME . '.system.profile', $query);
$profileEntry = current($cursor->toArray());

var_dump($profileEntry->query);

$command = new MongoDB\Driver\Command(array('profile' => 0));
$cursor = $manager->executeCommand(DATABASE_NAME, $command);
$result = current($cursor->toArray());

printf("Set profile level to 0 successfully: %s\n", (empty($result->ok) ? 'no' : 'yes'));

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
Set profile level to 2 successfully: yes
object(stdClass)#%d (%d) {
  ["x"]=>
  int(1)
}
Set profile level to 0 successfully: yes
===DONE===
