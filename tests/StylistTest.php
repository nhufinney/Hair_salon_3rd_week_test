<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        // }

        function test_getStylist()
        {
            //Arrange
            $stylist = "Paul Mitchell";
            $id = null;
            $test_Stylist = new Stylist($stylist, $id);

            //Act
            $result = $test_Stylist->getStylist();

            //Assert
            $this->assertEquals($stylist, $result);
        }

        function test_setStylist()
        {
            //Arrange
            $stylist = "Jonathan Antin";
            $id = null;
            $test_Stylist = new Stylist($stylist, $id);
            //$test_Stylist->save();

            //Act
            $test_Stylist->setStylist("Tabatha");

            $result = $test_Stylist->getStylist();

            //Assert
            $this->assertEquals($result, "Tabatha");
        }

        function test_getId()
        {
            //Arrange
            $stylist = "Tabatha Coffey";
            $id = 3;
            $test_Stylist = new Stylist($stylist, $id);

            //Act
            $result = $test_Stylist->getId();

            //Assert
            $this->assertEquals(3, $result);

        }

        function test_setId()
        {
            //Arrange
            $stylist = "Frederic Fekkai";
            $id = null;
            $test_Stylist = new Stylist($stylist, $id);

            //Act
            $test_Stylist->setId(5);
            $result = $test_Stylist->getId();

            //Assert
            $this->assertEquals(5, $result);
        }

        // function test_getAll()
        // {
        //     //Arrange
        //     $food_type1 = "Mexican";
        //     $id1 = null;
        //     $food_type2 = "Pizza";
        //     $id2 = null;
        //     $test_Stylist1 = new Stylist($food_type1, $id1);
        //     $test_Stylist1->save();
        //     $test_Stylist2 = new Stylist($food_type2, $id2);
        //     $test_Stylist2->save();
        //
        //     //Act
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_Stylist1, $test_Stylist2], $result);
        // }
        //
        // function test_save()
        // {
        //     //Arrange
        //     $stylist = "Food truck";
        //     $id = null;
        //     $test_Stylist = new Stylist($stylist, $id);
        //     $test_Stylist->save();
        //
        //     //Act
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals($test_Stylist, $result[0]);
        // }
        //
        // function test_deleteAll()
        // {
        //     //Arrange
        //     $food_type1 = "Mexican";
        //     $id1 = null;
        //     $food_type2 = "Pizza";
        //     $id2 = null;
        //     $test_Stylist1 = new Stylist($food_type1, $id1);
        //     $test_Stylist1->save();
        //     $test_Stylist2 = new Stylist($food_type2, $id2);
        //     $test_Stylist2->save();
        //
        //     //Act
        //     Stylist::deleteAll();
        //     $result = Stylist::getAll();
        //
        //     //Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_find()
        // {
        //     //Arrange
        //     $food = "Noodle";
        //     $id = 1;
        //     $food2 = "Mitchell";
        //     $id2=2;
        //     $test_Stylist = new Stylist($food, $id);
        //     $test_Stylist->save();
        //     $test_Stylist2 = new Stylist($food2, $id2);
        //     $test_Stylist2->save();
        //
        //     //Act
        //     $result = Stylist::find($test_Stylist->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_Stylist, $result);
        // }
        //
        // function test_updateType()
        // {
        //     //Arrange
        //     $stylist = "Japanese";
        //     $id = 1;
        //     $test_cuisine = new Stylist ($stylist, $id);
        //     $test_cuisine->save();
        //
        //     $new_food_type = "Chinese";
        //
        //     //Act
        //     $test_cuisine->updateType($new_food_type);
        //
        //     //Assert
        //     $this->assertEquals("Chinese", $test_cuisine->getStylist());
        //
        // }
        //
        // function testDeleteCusine()
        // {
        //     //Arrange
        //     $cuisine = "Prime Steak";
        //     $id = 1;
        //     $test_cuisine = new Stylist($cuisine, $id);
        //     $test_cuisine->save();
        //
        //     $cuisine2 = "Lobster";
        //     $id2=2;
        //     $test_cuisine2 = new Stylist($cuisine2, $id2);
        //     $test_cuisine2->save();
        //
        //     //Act
        //     $test_cuisine->delete();
        //
        //     //Assert
        //     $this->assertEquals([$test_cuisine2], Stylist::getAll());
        // }
        //
        // function testDeleteStylistTypeFromRestaurant()
        // {
        //     //Arrang
        //     $cuisine = "Sea Crab";
        //     $id = null;
        //     $test_cuisine = new Stylist($cuisine, $id);
        //     $test_cuisine->save();
        //
        //     $restaurant = "Mom Kitchen";
        //     $cuisine_id = $test_cuisine->getId();
        //     $test_restaurant = new Restaurant($id, $restaurant, $cuisine_id);
        //     $test_restaurant->save();
        //
        //     //Act
        //     $test_cuisine->delete();
        //
        //     //Assert
        //     $this->assertEquals([], Restaurant::getAll());
        // }

    }



?>
