<?php

//
//Written by: Brock Sauvage
//Date: 04/15/18
//File: index.php
//

include 'grid.php';
include 'chicken.php';

startCrossing();

function initializeDoc(){
  //
  // Start our HTML file and include our JS file
  //
  echo "<html><head><script src = 'test.js'></script></head><body>";

  //
  // Form used to generate a table of size n
  //
  echo "<form><b>Grid Size: </b>" . "<input value = '4' type = 'number' name = 'size'><input type = 'submit'></form>";
}

function startCrossing(){
  //
  //Create DOM
  //
  initializeDoc();

  //
  //Generate grid and display on DOM
  //
  if($_GET["size"] != 4){
    $gridSize = 4;
  }else{
    $gridSize = $_GET["size"];
  }
  $myGrid = new Grid($gridSize);
  $myGrid->displayTable();

  //
  //Create Henry the Chicken and set him loose to cross the road.
  //
  $theChicken = new Chicken($gridSize, $myGrid);
  $startCoords = $myGrid->getStart();
  $theChicken->findPath($startCoords[0], $startCoords[1], $myGrid->getGrid(), []);

  //
  //Display final solution if it exists.
  //
  $solutionCount = $theChicken->getSolutionCount();
  if($solutionCount == 0){
    echo "<b>No possible solutions (and no ticket refunds)</b>";
  }else{
    echo "<b> Number of possible solutions: </b>" . $solutionCount;
  }
  echo "</body></html>";
}


?>
