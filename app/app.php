<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";


    use Symfony\Component\Debug\Debug;
    Debug::enable();

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app = new Silex\Application();

    $app['debug']=true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    $app->delete("/deleteAll", function() use ($app) {
        $delete_all_stylists= "";
        $delete_all_stylists = new Stylist ($id=null, $delete_all_stylists);
        $delete_all_stylists->deleteAll();
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/stylist", function() use ($app) {
        $new_stylist = new Stylist($_POST['stylist']);
        $new_stylist->save();
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylist/{id}", function($id) use ($app)
    {
        $stylist= Stylist::find($id);
        return $app['twig']->render('stylist.twig', array('stylist' => $stylist, 'clients'=>$stylist->getClients()));
    });

    $app->post("/relevant_clients", function() use ($app){
        $new_client = $_POST['client'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($id=null, $new_client, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist.twig', array('stylist'=>$stylist, 'clients'=>$stylist->getClients()));
    });

    $app->get("/stylist/{id}/edit", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist_edit.twig', array('stylist' => $stylist));
    });

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $updated_stylist = $_POST['stylist'];
        $stylist = Stylist::find($id);
        $stylist->updateStylist($updated_stylist);
        return $app['twig']->render('stylist.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->delete("/stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/client/{id}/edit", function($id) use ($app){
        $client = Client::find($id);
        return $app['twig']->render('client_edit.twig', array('client'=>$client));
    });

    $app->patch("/client/{id}", function($id) use ($app) {
        $updated_client = $_POST['client'];
        $client = Client::find($id);
        $client->updateClient($updated_client);
        return $app['twig']->render('client_edit.twig', array('client'=>$client));
    });

    $app->delete("/client/{id}", function($id) use ($app) {
        $client = Client::find($id);
        $client->deleteOneClient();
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    return $app;
?>
