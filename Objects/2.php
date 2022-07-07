<?php
class Point{
    public int $px;
    public int $py;

    public function __construct(int $x, int $y)
    {
        $this->px = $x;
        $this->py = $y;
    }
    function swapPoints(Point $p1, Point $p2){
        $holderX = $p1->px;
        $holderY = $p1->py;

        $p1->px = $p2->px;
        $p1->py = $p2->py;

        $p2->px = $holderX;
        $p2->py = $holderY;

    }

}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);
echo "(" . $p1->px . ", " . $p1->py . ")";
echo "(" . $p2->px . ", " . $p2->py . ")";