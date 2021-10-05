<?php

use PHPUnit\Framework\TestCase;

use App\{ModelPrepare, User};
use Symfony\Component\Yaml\Parser;

class UserPrepareTest extends TestCase
{

  protected $model;
  protected $users;

  public function setUp(): void
  {
    $this->pdo = new \PDO('sqlite::memory:');
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $this->pdo->exec(
      "CREATE TABLE IF NOT EXISTS user
          (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR( 225 ),
            createdAt DATETIME
          )
            "
    );

    $this->model = new ModelPrepare($this->pdo);
    $yaml = new Parser();
    $this->users = $yaml->parse(file_get_contents(__DIR__ . '/_data/seed.yml'))['users'];
  }

  /**
   * @test count method insert
   */
  public function testSeedsCreate()
  {
    $this->model->hydrate($this->users);
    $usersInDb = $this->model->all();

    $this->assertEquals(count($this->users), count($usersInDb));
  }

  /**
   * @test save method insert
   */
  public function testInsertSave()
  {
    $benoit = new User;
    $benoit->username = "Benoit";
    $this->model->save($benoit);

    $this->assertEquals($this->model->find(1), $this->model->all()[0]);
  }

  /**
   * @test save method update
   */
  public function testUpdateSave()
  {
    $this->model->hydrate($this->users);
    $userAlan = $this->model->find(1);
    $this->assertEquals($userAlan->username, "joe");

    $userAlan->username = "Benoit";
    $this->model->update($userAlan);
    $userId1 = $this->model->find(1);
    
    $this->assertSame($userAlan->username, $userId1->username);
    $this->assertNotEquals($userId1->username, "joe");
    $this->assertSame($userId1->username, "Benoit");
  }

  /**
   * @test delete resource by id
   */
  public function testDelete()
  {
    $this->model->hydrate($this->users);
    $userAlan = $this->model->find(1);
    $this->model->delete(1);

    $nbUsersDb = count($this->model->all());

    $this->assertEquals($nbUsersDb, count($this->users)-1);
    $this->assertNotContains($userAlan, $this->model->all());
  }
}
