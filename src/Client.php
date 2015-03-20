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

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getClient()}', {$this->getStylistId()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients *;");
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $client_name, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        function updateClient($updated_client)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$updated_client}' WHERE id = {$this->getId()};");
            $this->setClient($updated_client);
        }

        function deleteOneClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id={$this->getId()};");
        }
    }

?>
