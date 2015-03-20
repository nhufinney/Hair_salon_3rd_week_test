<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";


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

    $app->post("/stylists", function() use ($app) {
        $new_stylist = new Stylist($_POST['stylist']);
        $new_stylist->save();
        return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    });

    // $app->get("/stylists/{id}", function($id) use ($app)
    // {
    //     $stylist= Stylist::find($id);
    //     return $app['twig']->render('stylists.twig', array('stylist' => $stylist, 'clients'=>$stylist->getClients()));
    // });

    // $app->post("/delete_cuisines", function() use ($app) {
    //     Stylist::deleteAll();
    //     return $app['twig']->render('index.twig');
    // });
    //
    // $app->get("/stylists/{id}/edit", function($id) use ($app) {
    //     $stylist = Stylist::find($id);
    //     return $app['twig']->render('cuisine_edit.twig', array('stylist' => $stylist));
    // });
    //
    // $app->patch("/stylists/{id}", function($id) use ($app) {
    //     $new_stylist = $_POST['new_stylist'];
    //     $stylist = Stylist::find($id);
    //     $stylist->updateType($new_stylist);
    //     return $app['twig']->render('stylists.twig', array('stylist' => $stylist, 'restaurants' => $stylist->getRestaurants()));
    // });
    //
    // $app->delete("/stylists/{id}", function($id) use ($app) {
    //     $stylist = Stylist::find($id);
    //     $stylist->delete();
    //     return $app['twig']->render('index.twig', array('stylists' => Stylist::getAll()));
    // });
//_____________________________________________________________

    // $app->post("/relevant_restaurants", function() use ($app){
    //     $new_restaurant = $_POST['restaurant'];
    //     $cuisine_id = $_POST['cuisine_id'];
    //     $restaurant = new Restaurant($id=null, $new_restaurant, $cuisine_id);
    //     $restaurant->save();
    //     $stylist = Stylist::find($cuisine_id);
    //     return $app['twig']->render('stylists.twig', array('stylist'=>$stylist, 'restaurants'=>$stylist->getRestaurants()));
    // });
    //
    // $app->post("/restaurant_review", function() use ($app) {
    //     $new_review = $_POST['new_review'];
    //         $restaurant_id = $_POST['restaurant_id'];
    //         $review = new Review($id=null, $new_review, $restaurant_id);
    //         $review->save();
    //         $restaurant = Restaurant::find($restaurant_id);
    //         $reviews = $restaurant->getReviews;
    //         return $app['twig']->render('restaurant_review.twig', array('restaurant'=>$restaurant, 'reviews'=>$reviews));
    // });
    //
    // $app->get("/restaurants/{id}/edit", function($id) use ($app){
    //     $restaurant = Restaurant::find($id);
    //     return $app['twig']->render('restaurant_review.twig', array('restaurant'=>$restaurant, 'reviews'=>$restaurant->getReviews()));
    // });
    //
    //


    // $app->post("/delete_restaurants", function() use ($app) {
    //     Restaurant::deleteAll();
    //     return $app['twig']->render('index.twig');
    // });


    return $app;



?>
