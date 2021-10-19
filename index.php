<?php
//1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п. или любой другой области. Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. Приведите пример использования. ВАЖНОЕ.

class Product {
    public $brand;
    public $model;
    public $description;
    public $price;

    public function __construct(string $brand, string $model, string $description, int $price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->description = $description;
        $this->price = $price;
    }

    public function productInfo() {
        echo "<b>Производитель:</b> {$this->brand} <br>
              <b>Модель:</b> {$this->model} <br>
              <b>Описание:</b> {$this->description} <br>
              <b>Цена:</b> {$this->price} <br>";
    }
}

class DiscountedProduct extends Product {
    public $discount;

    public function __construct(string $brand, string $model, string $description, int $price, int $discount)
    {
        parent::__construct($brand, $model, $description, $price);
        $this->discount = $discount;
    }

    public function productDiscountInfo() {
        $this->productInfo();
        $this->price -= ($this->price * $this->discount/100);
        echo "<b>Цена со скидкой:</b> {$this->price}";
    }
}

$product = new Product("Apple", "iPhone 13", "Просто хороший телефон", 69990);
$product->productInfo();
$product1 = new DiscountedProduct("Apple", "iPhone 13 Pro", "Просто телефон", 99990, 10);
$product1->productDiscountInfo();

//2* Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:
//echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
//что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5

//3. Дан код:
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); // 1
//$a2->foo(); // 2
//$a1->foo(); // 3
//$a2->foo(); // 4
//Что он выведет на каждом шаге? Почему?
    // Выведет он последовательность, потому что мы обращаемся к методу в единственном экземпляре.

//    Немного изменим п.5:
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo(); // 1
//$b1->foo(); // 1
//$a1->foo(); // 2
//$b1->foo(); // 2
//4. Объясните результаты в этом случае.
    //При создании наследственного класса создался и наследственный метод, и теперь при создании нового объекта, каждый объект будет обращаться к собственному методу.


//5. *Дан код:
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
//$a1->foo(); // 1
//$b1->foo(); // 1
//$a1->foo(); // 2
//$b1->foo(); // 2
//Что он выведет на каждом шаге? Почему?
    //Выведет тоже самое, что и прерыдущий пример, разница в примерах только в "()" (Если я правильно понял, то скобки не обязательны).