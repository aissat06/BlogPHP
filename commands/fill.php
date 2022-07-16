<?php
require 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create('fr_FR');
// var_dump($faker->paragraphs(rand(3,5), true));

$pdo = new PDO('mysql:dbname=totoblog;host=127.0.0.1', 'root', null, [
    // le mode d'erreur à utiliser
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$pdo->exec('SET FOREIGN_KEY_CHECKS=0');
// vider la base de données
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS=1');

$posts = [];
$categories = [];

// remplir la bdd des faux données manuellement
// on peut aussi utiliser la libraire faker
for ($i=0; $i < 20; $i++) { 
    $pdo->exec("INSERT INTO post SET name='{$faker->sentence(2)}', slug='{$faker->slug}', created_at='{$faker->date} {$faker->time}', content='{$faker->paragraphs(rand(3,5), true)}'");
    // recuper l'id de dernier enregistrement
    $posts[] = $pdo->lastInsertId();
}

for ($i=0; $i < 5; $i++) { 
    $pdo->exec("INSERT INTO category SET name='{$faker->sentence(2)}', slug='{$faker->slug}'");
    $categories[] = $pdo->lastInsertId();
}

foreach ($posts as $post) {
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach ($randomCategories as $categorie) {
        $pdo->exec("INSERT INTO post_category SET post_id=$post, category_id=$categorie");
    }
}

// creer un utilisateur
$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username='admin', password='$password'");