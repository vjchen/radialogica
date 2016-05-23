<?

function spiral($height,$width,$position_x,$position_y){

    //Check to see if height and width of grid are set.
    if(!$height || !$width)
    {
        return 'No height/width specified';
    }


    $num = 1; //Set number to populate grid.
    $end_point = $width * $height; //End position on grind to signal function to end.

    //Set starting directions to guide spiral.
    $north = 1;
    $south = 2;
    $west = 1;
    $east = 2;

    //Set starting position for spiral.
    $position = 1;
    $position_x -= 1;
    $position_y -= 1;

    //Create grid
    $grid = [];
    for($i=0;$i<$height;$i++)
    {
        for($j=0;$j<$width;$j++){
            $grid[$i][$j] = $num;

            $num++;
        }
    }

    //Get spiral started.
    $array = [];
    array_push($array, $grid[$position_x][$position_y]);

    //Split spiral into 4 directions that it can possibly go in.  Since spiral is a static shape and follows a certain pattern,
    //iterate through each direction and grab values at the index if a value even exists.  Continue until reaches end point.
    //Thinking of how to do this recursively but coming up with too many edge cases had me do it this way.
    while(count($array) < $end_point)
    {
        switch($position % 4){
            case 0:

                for($i=0; $i<$east; $i++){
                    $position_y += 1;

                    isset($grid[$position_x][$position_y])? array_push($array,$grid[$position_x][$position_y]):false;
                }

                $position = 1;
                $east = $east + 2;
                break;
            case 1:

                for($i=0; $i<$north; $i++){
                    $position_x -= 1;

                    isset($grid[$position_x][$position_y])? array_push($array,$grid[$position_x][$position_y]):false;
                }

                $position++;
                $north = $north + 2;
                break;
            case 2:

                for($i=0; $i<$west; $i++){
                    $position_y -= 1;

                    isset($grid[$position_x][$position_y])? array_push($array,$grid[$position_x][$position_y]):false;
                }

                $position++;
                $west = $west + 2;
                break;
            case 3:

                for($i=0; $i<$south; $i++){
                    $position_x += 1;

                    isset($grid[$position_x][$position_y])? array_push($array,$grid[$position_x][$position_y]):false;
                }

                $position++;
                $south = $south + 2;
                break;
        }
    }

    return $array;
}

define('HEIGHT',2);
define('WIDTH',4);
define('START_X',1);
define('START_Y',2);

spiral(HEIGHT,WIDTH,START_X,START_Y);