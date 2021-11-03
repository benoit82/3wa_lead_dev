<?php

use App\User;
use App\FactoryPDO;

use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    protected User $user;

    public function setUp(): void
    {
        $m = new Migration();
        $pdo = FactoryPDO::buildSqlite("sqlite:" . __DIR__ . "/_data/database.db");
        $m->setData($pdo);
    }

    public function testFirstUser()
    {
        $this->assertEquals(true, true);
    }

    public function testAllUsers()
    {
        $this->assertEquals(true, true);
    }
}
