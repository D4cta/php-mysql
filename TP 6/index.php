<?php

const RESULT_WINNER = 1;
const RESULT_LOSER = -1;
const RESULT_DRAW = 0;
const RESULT_POSSIBILITIES = [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW];


class Player{
    private $level;

    public function getLevel(){
        return $this->level;
    }

    public function setLevel($level){
        $this->level = $level;
    }


}

class Encounter{

    public static function probabilityAgainst(int $levelPlayerOne, int $againstLevelPlayerTwo){

        return 1/(1+(10 ** (($againstLevelPlayerTwo - $levelPlayerOne)/400)));

    }

    public static function setNewLevel(Player &$levelPlayerOne, Player $againstLevelPlayerTwo, int $playerOneResult){
        if (!in_array($playerOneResult, RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Invalid result. Expected %s',implode(' or ', RESULT_POSSIBILITIES)));
        }
    
        $levelPlayerOne->setLevel( $levelPlayerOne->getLevel() + (int) (32 * ($playerOneResult - self::probabilityAgainst($levelPlayerOne->getLevel(), $againstLevelPlayerTwo->getLevel()))));
    
    }
}


$greg = new Player();
$jade = new Player();

$greg->setLevel(400);
$jade->setLevel(800);


$gregLevel = $greg->getLevel();
$jadeLevel = $jade->getLevel();

echo sprintf(
    'Greg à %.2f%% chance de gagner face a Jade',
    Encounter::probabilityAgainst($gregLevel, $jadeLevel)*100
).PHP_EOL;

// Imaginons que greg l'emporte tout de même.
Encounter::setNewLevel($greg, $jade, RESULT_WINNER);
Encounter::setNewLevel($jade, $greg, RESULT_LOSER);

echo sprintf(
    'les niveaux des joueurs ont évolués vers %s pour Greg et %s pour Jade',
    $greg->getLevel(),
    $jade->getLevel()
);

exit(0);
