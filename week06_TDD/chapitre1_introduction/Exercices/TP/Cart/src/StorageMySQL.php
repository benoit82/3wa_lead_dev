<?php
namespace Cart;

use Cart\Storable;
use Cart\Product;
use PDO;

class StorageMySQL implements Storable{

    public function __construct(private PDO $pdo)
    {
    }

    public function setValue(string $name, float $price):void{
        $req = $this->pdo->prepare('SELECT * FROM product WHERE name=:name');
        $req->execute([':name' => $name]);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $product = $req->fetch();
        $req->closeCursor();
        
        if($product){
            $newPrice = $product->price + $price;
            $request = "UPDATE product SET total=:price WHERE name=:name";
            $req = $this->pdo->prepare($request);
            $req->execute([':price' =>$newPrice , ':name' => $name] );
        }


   }

    public function restore(string $name):void{
        if(array_key_exists($name, $this->storage) === true)
            unset( $this->storage[$name] );
    }

    public function reset():void{
        $this->storage = [];
    }

    // TODO refactoring responsability ?
    public function total():float{

        return array_sum($this->storage);
    }

    public function getStorage():array{

        return $this->storage;
    }
}