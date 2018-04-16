<?php

//
//Written by: Brock Sauvage
//Date: 04/15/18
//File: chicken.php
//

class Chicken{

  //
  //Brief: Private member variables for the Chicken class
  //Size = size of the grid that represents the road we are traversing.
  //Solution Count = number of possible solutions for crossing the road.
  //
  private $size;
  private $solutionCount;
  private $theRoad;

  //
  //Brief: Constructor for the Chicken class.
  //Parameters: ($gridSize: the size of the grid)
  //
  function __construct($gridSize, $myGrid){
    $this->size = $gridSize;
    $this->solutionCount = 0;
    $this->theRoad = $myGrid;
  }

  //
  //Public function findPath. Navigates through the maze by checking all possible directions
  //and recursively calling itself to ensure all possible solutions are found.
  //Parameters: ($x: the x-coordinate the chicken is at)
  //            ($y: the y-coordinate the chicken is at)
  //            ($maze: the grid, passed by value so the recursive calls aren't working with the same grid)
  //            ($printArray: an array that stores the spaces we've visited as arrays of size 2, for x and y coords)
  //Return: None
  //
  public function findPath($x, $y, $maze, $printArray){

    //Mark our current position as visited
    $maze[$x][$y] = "W";

    //Push our current position into $printArray
    array_push($printArray, [$x, $y]);

    //Check if a solution has been found.
    if($this->isFinished($x)){
      $this->printTracks($printArray);
      return;
    }

    //Check right
    if($this->checkSpace($x+1, $y, $maze)){
      $this->findPath($x+1, $y, $maze, $printArray);
    }
    //Check up
    if($this->checkSpace($x, $y+1, $maze)){
      $this->findPath($x, $y+1, $maze, $printArray);
    }
    //Check down
    if($this->checkSpace($x, $y-1, $maze)){
      $this->findPath($x, $y-1, $maze, $printArray);
    }
  }

  //
  //Brief: Private function checkSpace. Checks the validity of a space that the chicken might
  //       move to.
  //Parameters: ($x: the x-coordinate of the space we want to move to.)
  //            ($y: the y-coordinate of the space we want to move to.)
  //            ($grid: the current grid in scope, so we can check if a space is valid)
  //Return: True if the space is a valid move, false otherwise.
  //
  private function checkSpace($x, $y, $grid){
    if(!($x >= $this->size || $x < 0) || !($y >= $this->size || $y < 0)){
      if($grid[$x][$y] == "O"){
        return true;
      }
    }
    return false;
  }

  //
  //Brief: Private function isFinished. Checks whether or not a solution has been finished.
  //       Also increments the solution count variable if a solution has been found.
  //Parameters: ($x: the x-coordinate of the space we are currently at.)
  //Return: True if $x == $size-1, meaning that the chicken crossed the road. False otherwise.
  //
  private function isFinished($x){
    //Check if we have reached the other side of the road.
    if($x == ($this->size-1)){
      //Increment solutionCount;
      $this->solutionCount++;
      return true;
    }
    return false;
  }

  //
  //Brief: Private printTracks. Just a "pretty print" function to make the solutions look good.
  //Parameters: ($array: the array of values to be printed.)
  //Return: None
  //
  private function printTracks($array){
    //Variable that helps us find the end of the array
    $i = 0;
    //For each value in the print array, print its contents.
    foreach($array as $coord){
      echo "(" . $coord[0] . ", " . $coord[1] . ")";
      $i++;
      if(sizeof($array) != $i){
        echo " -> ";
      }
    }
    echo "<br>";
  }

  //
  //Brief: Public function getSolutionCount. Returns the variable $solutionCount upon calling.
  //Parameters: None
  //Return: $solutionCount, the number of solutions that we have found.
  //
  public function getSolutionCount(){
    return $this->solutionCount;
  }
}
 ?>
