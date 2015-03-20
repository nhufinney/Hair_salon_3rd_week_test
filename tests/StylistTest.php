<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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

        function test_deleteAll()
        {
            //Arrange
            $stylist = "John";
            $stylist2 = "Frieda";
            $id = null;
            $test_Stylist = new Stylist($stylist, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($stylist2, $id);
            $test_Stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_save()
        {
            //Arrange
            $stylist = "Vidal Sasson";
            $id = null;
            $test_Stylist = new Stylist($stylist, $id);
            $test_Stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist = "Paul";
            $id1 = 3;
            $stylist2 = "Mitchell";
            $id2= 5;
            $test_Stylist = new Stylist($stylist, $id1);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($stylist2, $id2);
            $test_Stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_find()
        {
            //Arrange
            $stylist = "Ken";
            $id = 1;
            $stylist2 = "Paves";
            $id2=2;
            $test_Stylist = new Stylist($stylist, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($stylist2, $id2);
            $test_Stylist2->save();

            //Act
            $result = Stylist::find($test_Stylist->getId());

            //Assert
            $this->assertEquals($test_Stylist, $result);
        }

        function test_updateStylist()
        {
            //Arrange
            $stylist = "John";
            $id = 1;
            $test_stylist = new Stylist ($stylist, $id);
            $test_stylist->save();

            $new_stylist = "Diana";

            //Act
            $test_stylist->updateStylist($new_stylist);

            //Assert
            $this->assertEquals("Diana", $test_stylist->getStylist());

        }

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
