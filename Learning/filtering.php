<?php
$books = [
    [
        "title" => "Book 1",
        "isbn" => "ISBN 1",
        "author" => "Autor 1",
        "publisher" => "Publisher 1",
        "year" => 2009
    ],
    [
        "title" => "Book 2",
        "isbn" => "ISBN 2",
        "author" => "Autor 2",
        "publisher" => "Publisher 2",
        "year" => 1999
    ],
    [
        "title" => "Book 3",
        "isbn" => "ISBN 3",
        "author" => "Autor 3",
        "publisher" => "Publisher 3",
        "year" => 2020
    ]

];

//==============Generic Solution=================
//$filter= function ($items,$fn){
//    $filteredItems = [];
//
//    foreach($items as $item){
//        if($fn($item)){
//            $filteredItems[] = $item;
//        }
//    }
//    return $filteredItems;
//};
//$filteredBooks = $filter($books,function($book){
//    return $book["year"] <= 2021;
//});

//==============Built In Array_Filter=================

$filteredBooks = array_filter($books, function($book){
    return $book["title"] == "Book 1"; //Only Render Book Which have title "BOOk 1"
})
?>

<!--===============Html OutPut==================-->
<h2>Favourite Books List:</h2>
<ul>
    <?php foreach ($filteredBooks as $book): ?>
    <li><?= $book["title"] ?> (<?= $book["year"] ?>) By <?= $book["author"] ?></li>
    <?php endforeach; ?>
</ul>




