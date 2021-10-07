<?php

use PHPUnit\Framework\TestCase;
use Cart\{Product, StorageMySQL};
use \PDO;

class StorageMySQLTest extends TestCase
{
    private static $pdo;
    private array $products;

    public function setup(): void
    {
        $this->products = [
            'apple' => new Product('apple', 10.5),
            'raspberry' => new Product('raspberry', 13),
            'strawberry' => new Product('strawberry', 7.5),
            'orange' => new Product('orange', 7.5),
        ];
        extract($this->products);
        $this->storage = new StorageMySQL(self::$pdo);
    }

    public static function setUpBeforeClass(): void
    {
        self::$pdo = new PDO("mysql:host=localhost:3306; dbname=fruittest", 'root', '');
    }


    private function getProductFromDB(string $name)
    {
        $req = self::$pdo->query("SELECT * FROM product WHERE name='" . $name . "'");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $product = $req->fetch();
        $req->closeCursor();
        return $product;
    }

    /**
     * @test testStorageValuesUpdateInDB test if we update correctly the DB by setValue Method
     */
    public function testStorageValuesUpdateInDB()
    {
        extract($this->products);
        $initialApple = $this->getProductFromDB($apple->getName());

        $this->storage->setValue($apple->getName(), $apple->getPrice() * 2 * 1.2);
        $newApple = $this->getProductFromDB($apple->getName());
        $this->assertEquals($newApple->total, $initialApple->total + $apple->getPrice() * 2 * 1.2);
    }

    /**
     * @test testStorageValuesInsertInDB test if we insert correctly the DB by setValue Method
     */
    public function testStorageValuesInsertInDB()
    {
        extract($this->products);
        $initialOrange = $this->getProductFromDB($orange->getName());
        $this->assertFalse($initialOrange);

        $this->storage->setValue($orange->getName(), $orange->getPrice() * 2 * 1.2, $orange->getPrice());
        $neworange = $this->getProductFromDB($orange->getName());
        $this->assertEquals($neworange->total, $orange->getPrice() * 2 * 1.2);
        $this->assertEquals($neworange->price, $orange->getPrice());
        $this->assertEquals($neworange->name, $orange->getName());
    }

    /**
     * @test testSInsertExceptionPriceAt0 test if we set a unit price at 0 or lower setValue Method
     */
    public function testSInsertExceptionPriceAt0()
    {
        extract($this->products);
        $initialOrange = $this->getProductFromDB($orange->getName());
        $this->assertFalse($initialOrange);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Le prix unitaire ne peux pas être égal ou inférieur à 0");
        $this->storage->setValue($orange->getName(), $orange->getPrice() * 2 * 1.2, 0);
    }

    /**
     * @test testRestoreException test if we attempt a product from DB by Restore Methd
     */
    public function testRestoreException()
    {
        extract($this->products);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Vous ne pouvez pas retirer un produit inexistant.");
        $this->storage->restore($orange->getName());
    }
    /**
     * @test testRestore test if we remove a product from DB by Restore Methd
     */
    public function testRestore()
    {
        extract($this->products);
        $initialApple = $this->getProductFromDB($apple->getName());
        $this->assertEquals($initialApple->name, $apple->getName());

        $this->storage->restore($apple->getName());
        $finalApple = $this->getProductFromDB($apple->getName());
        $this->assertFalse($finalApple);
    }

    public function tearDown(): void
    {
        self::$pdo->exec("
        DROP DATABASE IF EXISTS fruittest ;
        CREATE DATABASE fruittest DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
        use fruittest;
        CREATE TABLE IF NOT EXISTS 
        product (
            ID INT NOT NULL AUTO_INCREMENT, 
            name VARCHAR(100), 
            price DECIMAL(7,2), 
            total DECIMAL(7,2) NOT NULL DEFAULT 0.00, 
            PRIMARY KEY(id) )ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

        INSERT INTO product (name, price) VALUES  ('apple', 10.5), ('raspberry',13), ('strawberry', 7.8);
        ");
    }

    public static function tearDownAfterClass(): void
    {
        self::$pdo = null;
    }
}
