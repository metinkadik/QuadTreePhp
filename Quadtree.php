 <?php
class Node {

        public $NW, $NE, $SE, $SW;
        public $x, $y;

        function __construct($x = null, $y = null) {
            $this->x = $x;
            $this->y = $y;
        }

        public function init() {
            $this->NW = new Node();
            $this->SW = new Node();
            $this->SE = new Node();
            $this->NE = new Node();
        }

    }
	
	$root = new Node($lat[0], $long[0]); //First data
	
        $root->init();

        function insert($x, $y) {
            global $root;


            $root = insertt($root, $x, $y);
        }

        function insertt(Node $h, $x, $y) {

            if ($h->x == null) {

                $h->init();
                $h->x = $x;
                $h->y = $y;

                return $h;
            } else if (less($x, $h->x) && less($y, $h->y)) { //SW
                insertt($h->SW, $x, $y);
            } else if (less($x, $h->x) && !less($y, $h->y)) {//SE
                insertt($h->SE, $x, $y);
            } else if (!less($x, $h->x) && !less($y, $h->y)) {//NE
                insertt($h->NE, $x, $y);
            } else if (!less($x, $h->x) && less($y, $h->y)) {//NW
                insertt($h->NW, $x, $y);
            }
            return $h;
        }

        function less($k1, $k2) {
            return $k1 < $k2;
        }
		
		?> 