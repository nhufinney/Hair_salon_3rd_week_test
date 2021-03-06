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

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stylists (stylist) VALUES ('{$this->getStylist()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists *;");
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $stylist_name = $stylist['stylist'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($stylist_name, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function find ($search_id)
        {
            $found_cuisine = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist)
            {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id)
                {
                    $found_cuisine = $stylist;
                }
            }
            return $found_cuisine;

        }

        function updateStylist($new_stylist)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist = '{$new_stylist}' WHERE id = {$this->getId()};");
            $this->setStylist($new_stylist);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id={$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id={$this->getId()};");

        }


        function getClients()
        {
            $clients = array();
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            foreach($returned_clients as $client) {
                $client_name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $client_name, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }


    }

?>
