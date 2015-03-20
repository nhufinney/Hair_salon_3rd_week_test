<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";


    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Client::deleteAll();
        //     Stylist::deleteAll();
        //     Review::deleteAll();
        // }

        function test_getId()
        {
            //Arrange
            $stylist = "Federic";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Jessica";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_setId()
        {
            //Arrange
            $stylist = "Tom";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Marry";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setId(79);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(79, $result);
        }

        function test_setClientName()
        {
            //Arrange
            $stylist = "Tom Hank";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Cameron";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client, $stylist_id);
            $client_name2 = "Alba";
            $test_client->setclient($client_name2);


            $test_client->save();

            //Act
            $result = $test_client->getClient();

            //Assert
            $this->assertEquals("Alba", $result);
        }


        function test_setStylistId()
        {
            //Arrange
            $id = null;

            $stylist = "Obama";
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "George";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $id, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setStylistId(70);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(70, $result);
        }

        function test_getSytlistId()
        {
            //Arrange
            $stylist = "Mommy";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Daughter";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }


        // function test_getAll()
        // {
        //     //Arrange
        //     $stylist = "Pizza";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist, $id);
        //     $test_stylist->save();
        //
        //     $client = "Hot Lips";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client = new Client($id, $client, $stylist_id);
        //     $test_client->save();
        //
        //     $client2 = "Sizzle Pie";
        //     $test_client2 = new Client($id, $client2, $stylist_id);
        //     $test_client2->save();
        //
        //     //Act
        //     $result = Client::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_client, $test_client2], $result);
        // }
        //
        // function test_save()
        // {
        //     //Arrange
        //     $stylist = "Italian";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist, $id);
        //     $test_stylist->save();
        //
        //     $client = "Mamamamas";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client = new Client($client, $id, $stylist_id);
        //
        //     //Act
        //     $test_client->save();
        //
        //     //Assert
        //     $result = Client::getAll();
        //     $this->assertEquals($test_client, $result[0]);
        // }
        //
        // function test_deleteAll()
        // {
        //     //Arrange
        //     $stylist = "Sandwiches";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist, $id);
        //     $test_stylist->save();
        //
        //     $client = "Pot Belly";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client = new Client($client, $id, $stylist_id);
        //     $test_client->save();
        //
        //     $client_name2 = "Honey Hole";
        //     $test_client2 = new Client($client_name2, $id, $stylist_id);
        //     $test_client2->save();
        //
        //     //Act
        //     Client::deleteAll();
        //
        //     //Assert
        //     $result = Client::getAll();
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_find()
        // {
        //     //Arrange
        //     $stylist = "Fancy";
        //     $id = null;
        //     $test_stylist = new Stylist($stylist, $id);
        //     $test_stylist->save();
        //
        //     $client = "Jakes";
        //     $stylist_id = $test_stylist->getId();
        //     $test_client = new Client($id, $client, $stylist_id);
        //     $test_client->save();
        //
        //     $client_name2 = "Finns";
        //     $test_client2 = new Client($id, $client_name2, $stylist_id);
        //     $test_client2->save();
        //
        //     //Act
        //     $result = Client::find($test_client->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_client, $result);
        // }
        //
        // function test_getReviews()
        // {
        //     $client = "Pizza";
        //     $id = null;
        //     $stylist_id = 2;
        //     $test_client = new Client($id, $client, $stylist_id);
        //     $test_client->save();
        //
        //     $review_content = "Tasty";
        //     $client_id = $test_client->getId();
        //     $test_review = new Review($id, $review_content, $client_id);
        //     $test_review->save();
        //
        //     $review_content2 = "Icky";
        //     $client_id = $test_client->getId();
        //     $test_review2 = new Review($id, $review_content2, $client_id);
        //     $test_review2->save();
        //
        //     //Act
        //     $result = $test_client->getReviews();
        //
        //     //Assert
        //     $this->assertEquals("Tasty", $result[0]->getReview());
        //
        //
        // }


    }


?>
