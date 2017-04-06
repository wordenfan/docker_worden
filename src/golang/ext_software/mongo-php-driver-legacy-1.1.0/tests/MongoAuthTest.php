<?php
require_once 'PHPUnit/Framework.php';
include 'Mongo/Auth.php';
include 'Mongo/Admin.php';

/**
 * Test class for MongoCollection.
 * Generated by PHPUnit on 2009-04-10 at 13:30:28.
 */
class MongoAuthTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var    MongoAdmin
     * @access protected
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MongoAdmin();
        $this->object->login("testUser", "testPass");
    }

    public function testAdminBasic() {
        // make sure it behaves like a normal connection
        $this->object->selectCollection("phpunit", "c")->drop();
        $this->object->selectCollection("phpunit", "c")->insert(array("foo"=>"bar"));
        $x = $this->object->selectCollection("phpunit", "c")->findOne();
        $this->assertEquals("bar", $x["foo"]);
    }

    public function testAddUser() {
        /* check auth methods */
        $this->object->addUser("fred", "ted");
        MongoAuth::getHash("fred", "ted");
        $a2 = new MongoAdmin();
        $this->assertTrue($a2->connected);
        $a2->login("fred", "ted");
        $this->assertTrue($a2->loggedIn, json_encode($a2));

        $x = $this->object->changePassword("fred", "ted", "foobar");
        $this->assertEquals(1, $x['ok'], json_encode($x));

        $a2 = new MongoAdmin();
        $a2->login("fred", "ted");
        $this->assertFalse($a2->loggedIn);

        $a2 = new MongoAdmin();
        $a2->login("fred", "foobar");
        $this->assertTrue($a2->loggedIn);

        $this->object->deleteUser("fred");
        $a2 = new MongoAdmin();
        $a2->login("fred", "foobar");
        $this->assertFalse($a2->loggedIn);
    }
}

?>
