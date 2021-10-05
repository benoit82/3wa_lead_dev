<?php

use PHPUnit\Framework\TestCase;

use App\{User, Model};

class UserTest extends TestCase
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
            username VARCHAR( 225 )
          )
            "
    );

    $this->model = new Model($this->pdo);
    $this->users = [
      ['username' => 'Alan'],
      ['username' => 'Sophie'],
      ['username' => 'Bernard'],
    ];
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
    $this->assertEquals($userAlan->username, "Alan");

    $userAlan->username = "Benoit";
    $this->model->update($userAlan);
    $userId1 = $this->model->find(1);
    
    $this->assertSame($userAlan->username, $userId1->username);
    $this->assertNotEquals($userId1->username, "Alan");
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
