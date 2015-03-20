<?php

    class Client
    {
        private $id;
        private $client;
        private $stylist_id;

        function __construct($id=null, $client, $stylist_id)
        {
            $this->id = $id;
            $this->client = $client;
            $this->stylist_id = $stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }


        function setClient($new_client)
        {
            $this->client = (string) $new_client;
        }

        function getClient()
        {
            return $this->client;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        // static function getAll()
        // {
        //     $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
        //     $restaurants = array();
        //     foreach($returned_restaurants as $restaurant) {
        //         $restaurant_name = $restaurant['restaurant_name'];
        //         $id = $restaurant['id'];
        //         $stylist_id = $restaurant['stylist_id'];
        //         $new_client = new Restaurant($id, $restaurant_name, $stylist_id);
        //         array_push($restaurants, $new_client);
        //     }
        //     return $restaurants;
        // }
        //
        // function getReviews()
        // {
        //     $reviews = array();
        //
        //     $returned_reviews = $GLOBALS['DB']->query("SELECT*FROM reviews WHERE restaurant_id={$this->getId()};");
        //     foreach($returned_reviews as $review)
        //     {
        //         $review_content = $review['review'];
        //         $id = $review['id'];
        //         $restaurant_id = $review['restaurant_id'];
        //         $new_review = new Review($id, $review_content, $restaurant_id);
        //         $review=$new_review->getReview();
        //         array_push($reviews, $review);
        //     }
        //     return $reviews;
        //
        // }
        //
        // function save()
        // {
        //     $statement = $GLOBALS['DB']->query("INSERT INTO restaurants (restaurant_name, stylist_id) VALUES ('{$this->getClient()}', {$this->getCuisineId()}) RETURNING id;");
        //     $result = $statement->fetch(PDO::FETCH_ASSOC);
        //     $this->setId($result['id']);
        // }
        //
        // static function deleteAll()
        // {
        //     $GLOBALS['DB']->exec("DELETE FROM restaurants *;");
        // }
        //
        // static function find($search_id)
        // {
        //     $found_restaurant = null;
        //     $restaurants = Restaurant::getAll();
        //     foreach($restaurants as $restaurant) {
        //         $restaurant_id = $restaurant->getId();
        //         if ($restaurant_id == $search_id) {
        //             $found_restaurant = $restaurant;
        //         }
        //     }
        //     return $found_restaurant;
        // }

    }


?>
