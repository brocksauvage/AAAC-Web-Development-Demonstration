<?php
  class Grid {
    $grid
    __construct($size){

    }

    generateGrid($size){
      for($i = 0; i < $size; $i++){
        $grid[i] = [];
        for($j = 0; j < $size; $j++){
          $grid[i][j] = " 0 ";
        }
      }
    }

    printGrid(){

    }
  }

?>
