<?php

namespace App;

class Yam
{
    public function __construct(
        private array $scores = [],
        private array $stats = ["Brelan" => 0, "Carré" => 0, "Double paire" => 0, "Yam" => 0],
    ) {
    }

    public function lancerDes(int $nbEssais = 50)
    {
        for ($i = 1; $i <= $nbEssais; $i++) {
            $essai = [];
            // lancé des 5 dés
            for ($j = 1; $j <= 5; $j++) {
                $essai[] = random_int(1, 6);
            }
            $this->scores[] = $essai;
        }
    }

    public function analyserParties()
    {
        if (empty($this->scores)) throw new \Exception("Aucune partie n'a été lancé !");
        // on compte le nombre de chiffre commun
        foreach ($this->scores as $partie) {
            $lancees = array_count_values($partie);
            if (array_search(2, $lancees) === 2) $this->stats["Double paire"]++; // cas du double pair
            foreach ($lancees as $key => $numIdentique) {
                $tmp = [];
                match ($numIdentique) {
                    3 => $this->stats["Brelan"]++,
                    4 => $this->stats["Carré"]++,
                    5 => $this->stats["Yam"]++,
                    default => "",
                };
            }
        }
    }

    public function showStats(): string
    {
        $afficher = "";
        foreach ($this->stats as $key => $value) {
            $afficher .= "$key : $value" . PHP_EOL;
        }
        return $afficher;
    }
}
