<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author gelpi
 */
class Game {

    public $id;
    public $word;
    public $tried;
    public $player;

    public function __construct($player) {
        $this->player = $player;
    }

//
//    @property
//    def errors(self):
//        return ''.join(set(self.tried) - set(self.word))
//
    public function errors() {
        return array_diff(array_unique($this->tried), array_unique($this->word));
    }

//
//    @property
//    def current(self):
//        return ''.join([c if c in self.tried else '_' for c in self.word])
    public function current() {
        for ($i = 0; $i < count($this->word); $i++) {
            if (in_array($this->word[$i], $this->tried)) {
                $a .= $this->word[$i];
            } else {
                $a .= "_";
            }
        }
        return $a;
    }

//    @property
//    def points(self):
//        return 100 + 2*len(set(self.word)) + len(self.word) - 10*len(self.errors)
//
//    # Play
    public function points() {
        return 100 + 2 * count(array_unique($this->word)) + count($this->word) - 10 * count($this->errors);
    }
//    def try_letter(self, letter):
//        if not self.finished and letter not in self.tried:
//            self.tried += letter
//            db.session.commit()
    public function try_letter($letter) {
        if (!$this->finished() and (!in_array($letter,$this->tried) )) {
            $this->tried[] = $letter;
        }
    }
//    # Game status
//
//    @property
//    def won(self):
//        return self.current == self.word
    public function won () {
        return $this->current == join('',$this->word);
    }
//    @property
//    def lost(self):
//        return len(self.errors) == 6
    public function lost() {
        return (count($this->errors) == 6);
    }
//    @property
//    def finished(self):
//        return self.won or self.lost
    public function finished() {
        return ($this->won or $this->lost);
    }
//
}
