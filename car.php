<?php
    class Car
    {
        public $make_model;
        public $price;
        public $miles;

        function __construct($car_model, $car_price, $car_miles)
        {
            $this->make_model = $car_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
        }
        function worthbuying($max_price)
        {
            return $this->price < ($max_price + 100);
        }
    }


    $car_1 = new Car("2014 Porsche 911", 114991, 7864);
    $car_2 = new Car("2011 Ford F450", 55995, 14241);
    $car_3 = new Car("2013 Lexus RX 350", 44700, 20000);
    $car_4 = new Car("Merceds Benz CLS550", 39900, 37979);

    $cars = array($car_1, $car_2, $car_3, $car_4);

    $cars_matching_search = array();
    foreach ($cars as $automobile) {
        if ($automobile->worthbuying($_GET["price"])) {
            array_push($cars_matching_search, $automobile);
        }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Jason and Carlos' Car Garage</title>
  </head>
  <body>
      <h1>Jason and Carlos' Car Garage</h1>
      <ul>
          <?php
              foreach($cars_matching_search as $automobile) {
                  echo "<li>" . $automobile->make_model . "</li>";
                  echo "<ul>";
                      echo "<li> $$automobile->price </li>";
                      echo "<li> Miles: $automobile->miles </li>";
                  echo "</ul>";
              }
          ?>
      </ul>
  </body>
</html>
