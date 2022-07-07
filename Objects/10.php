<?php

class Application
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
        $a = new Video("The Matrix");
        $b = new Video("Godfather II");
        $c = new Video("Star Wars Episode IV: A New Hope");
        $store->addMovie($a);
        $store->addMovie($b);
        $store->addMovie($c);

    }

    function run()
    {

        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies()
    {
        $newMovie = readline("Enter movie name: ");
        $this->store->addNewMovie($newMovie);
    }

    private function rent_video()
    {
        $title = readline("Enter movie name: ");
        array_filter($this->store->inventory(), function (Video $video) use ($title) {
            if ($video->getTitle() == $title) {
                $this->store->check($video);
            }else echo "There is no such movie" . PHP_EOL;
        });
    }

    private function return_video()
    {
        $title = readline("Enter movie you want to return: ");
        array_filter($this->store->getInventory(), function (Video $video) use ($title) {
            if ($video->getTitle() == $title) {
                $this->store->returnMovie($video);
            }
        });
    }

    private function list_inventory()
    {
        echo "------------------" . PHP_EOL;
        foreach ($this->store->inventory() as $video) {
            if (!$video->isChecked()) {
                echo $video->getTitle() . PHP_EOL;
            }
        }
        echo "------------------" . PHP_EOL;
    }
}

class Video
{
    private string $title;
    private bool $checked = false;
    private float $avgRating;
    private array $ratings;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

    public function getAvgRating(): float
    {
        return $this->avgRating;
    }

    public function rate(int $rating)
    {
        $this->ratings[] = $rating;

        $this->avgRating = array_sum($this->ratings) / count($this->ratings);
    }

    public function checkOut()
    {
        $this->checked = true;
    }

    public function returnBack()
    {
        $this->checked = false;
    }

}

class VideoStore
{
    private array $inventory = [];
    private Video $video;

    public function addNewMovie(string $name)
    {
        $this->inventory[] = new Video($name);
    }

    public function addMovie(Video $video)
    {
        $this->inventory[] = $video;
    }
    public function getInventory(){
        return $this->inventory;
    }
    public function inventory(): array
    {
        return array_filter($this->inventory, function ($video) {
            if (!$video->isChecked()) {
                return $video;
            }
        });

    }

    public function check(Video $video)
    {
        if (!$video->isChecked()) {
            $video->checkOut();
        } else {
            echo "No such movie available" . PHP_EOL;
        }
    }

    public function returnMovie(Video $video)
    {
        if ($video->isChecked()) {
            $video->returnBack();
        } else {
            echo "There is no such movie" . PHP_EOL;
        }
    }
}


/*$a = new Video("The Matrix");
$b = new Video("Godfather II");
$c = new Video("Star Wars Episode IV: A New Hope");

$a->rate(10);
$a->rate(7);
$a->rate(8);
echo $a->getAvgRating() . PHP_EOL;

$b->rate(10);
$b->rate(10);
$b->rate(10);

$store = new VideoStore();
$store->addMovie($a);
$store->addMovie($b);
$store->addMovie($c);


$store->check($b);
var_dump($store->inventory());
$b->returnBack();
var_dump($store->inventory());*/
$app = new Application(new VideoStore());
$app->run();