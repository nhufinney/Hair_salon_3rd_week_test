<?php

    class Stylist
    {
        private $stylist;
        private $id;

        function __construct($stylist, $id = null)
        {
            if($id !== null) {
                $this->id = $id;
            }
            $this->stylist = $stylist;
        }

        function setStylist($new_stylist)
        {
            $this->stylist = (string) $new_stylist;
        }

        function getStylist()
        {
            return $this->stylist;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        // static function getAll()
        // {
        //     $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
        //     $cuisines = array();
        //     foreach($returned_cuisines as $cuisine) {
        //         $stylist = $cuisine['stylist'];
        //         $id = $cuisine['id'];
        //         $new_cuisine = new Cuisine($stylist, $id);
        //         array_push($cuisines, $new_cuisine);
        //     }
        //     return $cuisines;
        // }

    //     function getRestaurants()
    //     {
    //         $restaurants = array();
    //         $returned_restaurants = $GLOBALS['DB']->query("SELECT*FROM restaurants WHERE cuisine_id = {$this->getId()};");
    //         foreach($returned_restaurants as $restaurant) {
    //             $restaurant_name = $restaurant['restaurant_name'];
    //             $id = $restaurant['id'];
    //             $cuisine_id = $restaurant['cuisine_id'];
    //             $new_restaurant = new Restaurant($id, $restaurant_name, $cuisine_id);
    //             array_push($restaurants, $new_restaurant);
    //         }
    //         return $restaurants;
    //     }
    //
    //     function save()
    //     {
    //         $statement = $GLOBALS['DB']->query("INSERT INTO cuisines (stylist) VALUES ('{$this->getStylist()}') RETURNING id;");
    //         $result = $statement->fetch(PDO::FETCH_ASSOC);
    //         $this->setId($result['id']);
    //     }
    //
    //     static function deleteAll()
    //     {
    //         $GLOBALS['DB']->exec("DELETE FROM cuisines *;");
    //     }
    //
    //     static function find ($search_id)
    //     {
    //         $found_cuisine = null;
    //         $cuisines = Cuisine::getAll();
    //         foreach ($cuisines as $cuisine)
    //         {
    //             $cuisine_id = $cuisine->getId();
    //             if ($cuisine_id == $search_id)
    //             {
    //                 $found_cuisine = $cuisine;
    //             }
    //         }
    //         return $found_cuisine;
    //
    //     }
    //
    //     function updateType($new_stylist)
    //     {
    //         $GLOBALS['DB']->exec("UPDATE cuisines SET stylist = '{$new_stylist}' WHERE id = {$this->getId()};");
    //         $this->setStylist($new_stylist);
    //     }
    //
    //     function delete()
    //     {
    //         $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id={$this->getId()};");
    //         $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE cuisine_id={$this->getId()};");
    //
    //     }
    //
    }

?>
