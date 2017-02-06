<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        public $image_path;

        function __construct($car_model, $car_price, $car_miles, $car_image)
        {
            $this->make_model = $car_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
            $this->image_path = $car_image;
        }
        function setModel($new_model)
        {
            $this->make_model = $new_model;
        }
        function getModel()
        {
            return $this->make_model;
        }
        function setPrice($new_price)
        {
            $this->$price = $new_price;
        }
        function getPrice()
        {
            return $this->price;
        }
        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
        }
        function getMiles()
        {
            return $this->miles;
        }
        function worthbuying($max_price)
        {
            return $this->price < ($max_price + 100);
        }
    }


    $car_1 = new Car("2014 Porsche 911", 114991, 7864, "img/porsche.jpg");
    $car_2 = new Car("2011 Ford F450", 55995, 14241, "img/ford.jpg");
    $car_3 = new Car("2013 Lexus RX 350", 44700, 20000, "img/lexus.jpg");
    $car_4 = new Car("Mercedes Benz CLS550", 39900, 37979, "img/mercedes.jpg");

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
                  $current_model = $automobile->getModel();
                  $current_price = "$" . $automobile->getPrice();
                  $current_miles = $automobile->getMiles();
                  echo "<div class='row' > <div class = 'col-sm-4'>";
                  echo "<img src=$automobile->image_path >";
                  echo "</div>";
                  echo "<div class = 'col-sm-4'>";
                  echo "<li> $current_model </li>";
                  echo "<ul>";
                  echo "<li> $current_price </li>";
                  echo "<li> Miles: $current_miles </li>";
                  echo "</ul>";
                  echo "</div></div>";
              }
          ?>
      </ul>
  </body>
</html>
