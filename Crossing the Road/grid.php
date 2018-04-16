<?php

//
//Written by: Brock Sauvage
//Date: 04/15/18
//File: grid.php
//

class Grid{

  //
  //Our private member variables.
  //$grid = the 2D array that will represent our road
  //$gridSize = the size of the grid to make, obtained from user input in the DOM
  //$startPos = the randomly generated position we start at
  //
  private $grid;
  private $gridSize;
  private $startPos;

  //
  //Brief: Constructor for the Grid class. Generates and populates a 2D array to serve as the grid.
  //Parameters: ($size: the size of the grid we want to generate)
  //Return: None
  //
  function __construct($size){

    //
    // Create the 2d array to be used as the grid, and fill it with random values
    //
    $myGrid = [];
    for($i = 0; $i < $size; $i++){
      $myGrid[$i] = [];
      for($j = 0; $j < $size; $j++){
        $myGrid[$i][$j] = $this->randomizePotholes();
      }
    }

    //
    // Secure a start position after road is filled
    //
    $start = rand(0, $size - 1);
    $this->startPos = [0, $start];
    $myGrid[0][$start] = "S";

    //
    // Ensure at least one pothole is on the Grid at a random position
    //
    do{
      $x = rand(0, $size - 1);
      $y = rand(0, $size - 1);
    }while($y == $start);

    $this->gridSize = $size;
    $myGrid[$x][$y] = "X";
    $this->grid = $myGrid;
  }

  private function randomizePotholes(){
    //
    // Creates a random int such that ~20% of the spots are potholes
    //
    $key = rand(1, 5);
    if($key == 1){
      return "X";
    }else{
      return "O";
    }
  }

  //
  //Brief: A public printing function to display the grid in our DOM
  //Parameters: None
  //Return: None
  //
  public function displayTable(){
    //
    // Use the grid we made to make an HTML table with the values
    //
    echo "<table>";
    for($i = count($this->grid) - 1; $i >= 0 ; $i--){
      echo "<tr>";
      for($j = 0; $j < count($this->grid); $j++){
        echo "<td> " . $this->grid[$j][$i] . " </td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }

  //
  //Brief: Public function updateGrid. Updates values in the grid to show traversal.
  //Parameters: ($x: the x-coordinate of the space we're updating)
  //            ($y: the y-coordinate of the space we're updating)
  //Return: None
  //
  public function updateGrid($x, $y){
    $this->grid[$x][$y] = "W";
  }

  //
  //Brief: Public function getGrid. Returns the 2D array $grid
  //Parameters: None
  //Return: $grid, our 2D array
  //
  public function getGrid(){
    return $this->grid;
  }

  //
  //Brief: Public function getSize. Returns the size of our grid.
  //Parameters: None
  //Return: $gridSize, the size of our grid.
  //
  public function getSize(){
    return $this->gridSize;
  }

  //
  //Brief: Public function getStart. Returns an array with the coords of the start position.
  //Parameters: None
  //Return: $startPos, a 2D array with the x-coord and y-coord of our start position.
  //
  public function getStart(){
    return $this->startPos;
  }
}

?>
