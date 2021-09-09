# Questionnaire

* [Lien énoncés](https://github.com/Antoine07/SOLID/blob/main/SOLID_PHP/SUPPORTS/Part2_solid/part1_solid.md#question-01)

## [Question 01](https://github.com/Antoine07/SOLID/blob/main/SOLID_PHP/SUPPORTS/Part2_solid/part1_solid.md#question-01)
La classe `User` a trop de responsabilité, elle ne devrait pas comporter la méthode `store()`
```php
<?php
class User {
    public function __construct(private string $name, private int $age){}
    // ...
}

class Store {
    public function __construct(private ConnectDB $connect){}
       public function saveUser(User $user) {
           // Store attributes into a database...
    }
    // ...
}

class ConnectDB {
    // ...
}
```

## [Question 02](https://github.com/Antoine07/SOLID/blob/main/SOLID_PHP/SUPPORTS/Part2_solid/part1_solid.md#question-02)

Il faudrait ajouter une interface (par exemple `Figure`) qui serait implémenté par toutes les classes afin d'uniformiser les signatures de méthode de calcul pour chacune d'entre elle : [fichiers réponses](./annexe-questionnaire/question-02/)

## [Question 03](https://github.com/Antoine07/SOLID/blob/main/SOLID_PHP/SUPPORTS/Part2_solid/part1_solid.md#question-03)

1. C'est le principe de Liskov qui est brisé car les signatures des méthodes ne sont pas les mêmes : la méthode dans `Cat` (`speak()`) ne renvoie rien et c'est un setter alors que sa classe parente `Feline` renvoie un résultat de type `string`.
Quand la fonction est donc appellé dans la classe `SubCatInfo` par la méthode `info`, elle s'attend à retourner un résultat alors que `$cat->speak()` ne retourne rien.

2. Oui, c'est le principe de Liskov car les méthodes de la classe enfant utilisant les méthodes de la classe parente peuvent être surchargé mais doivent respecter la signature (mêmes arguments appellé, type de retour de résultat respecté).

3. Le respect de la signature de la méthode n'était pas respecté et il a fallu  mettre le 3ème paramètre avec une valeur par défault pour respecter le principe SOLID.