<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Shop Class
require ('database/Shop.php');

// require Register Class
require ('database/Register.php');


// require Login Class
require ('database/Login.php');

// require Book class
require('database/Book.php');

// require Edit class
require('database/Edit.php');



// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Shop = new Shop($db );

$Register = new Register($db );

$login = new Login($db);

$Book = new Book($db);

$Edit = new Edit($db);