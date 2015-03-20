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
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $stylist = "Daddy";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Sons";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $id, $stylist_id);

            //Act
            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist = "Federic";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Jess";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client, $stylist_id);
            $test_client->save();

            $client2 = "Suzan";
            $test_client2 = new Client($id, $client2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $stylist = "Tom";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Obama";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client, $stylist_id);
            $test_client->save();

            $client_name2 = "Washington";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $stylist = "Tom";
            $id = null;
            $test_stylist = new Stylist($stylist, $id);
            $test_stylist->save();

            $client = "Jerry";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client, $stylist_id);
            $test_client->save();

            $client_name2 = "Cartoon";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }
        
    }
?>
