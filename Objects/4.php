<?php

class Movie{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }
    function getPG(array $PG):array{
        $list = [];
        foreach ($PG as $movie){
            if (strpos($movie->rating, "PG")!==false) {
                $list[] = $movie;
            }
        }
        return $list;
    }

}

$a = new Movie("Casino Royale","Eon Productions","PG13");
$b = new Movie("Glass","Buena Vista International","PG13");
$c = new Movie("Spider-Man: Into the Spider-Verse","Columbia Pictures","PG");
$d = new Movie("Venom","Columbia Pictures","R");

var_dump($a->getPG([$a,$b,$c,$d]));

