##### Instructions


### Crossing the Road: A OOP PHP Demonstration

This section was implemented in PHP because of the language's ability to dynamically generate HTML, as well as pulling elements and value from the DOM. This allows for the grid size to be changed easily via user input, and for the results to be displayed effectively. 

To implement a solution, I took advantage of some of PHP's object-oriented properties. Namely, the class system. Two classes were created: one for our grid, and one for the "chicken" that will traverse the grid. Starting with the grid generation, I utilized random number generation to populate the grid with open spaces ("O") or potholes ("X"). Using the ratio of open spaces to potholes in the example grid from the Code Foo website, I decided that potholes would generate with a 20% probability, meaning that about 20% of our grid would contain potholes. This was so that any randomly generated grid would be likely to contain solutions, but still have potholes to work around. After every spot in the grid had a value, a starting position for Henny was chosen (marked with an S on the grid.) To do this, a number between 0 and the size of the grid was generated, marked on our grid, and stored as a variable in the grid object. Next, I had to guarantee that at least one pothole was present on the grid, since the method of random number generation I used didn't ensure that was the case. A random x-coordinate and y-coordinate were calculated, and if the value of that space was not equal to the starting point, a pothole would be placed in that position. With this, the grid was completed.

Next, I created the chicken object, which would act as the pathfinding algorithm to find possible solutions to crossing the grid. From the starting point obtained from the grid object, the chicken would check in the three directions for possible movement: up, right, and down. If a space was deemed to be valid to move to, the chicken would move to that space and mark it on the grid as visited. This continues until the chicken reaches the rightmost side of the grid. To ensure that all possible solutions were kept track of, the grid and an array of visited coordinates were passed by value into recursive function calls. Once a solution was found, the path the chicken followed would be printed, the current recursive call would end, and the algorithm would continue to find the remaining solutions. During the process, if a solution was found, a variable representing the possible number of solutions was incremented to give us our final answer.

The algorithm that was implemented works for grids of size 2x2 or larger, though it is not recommended that grids of sizes larger than 7x7 are attempted due to the number of possible solutions that are likely to be present.

To run this program:
1. Use the command line to cd to the directory "Crossing the Road"
2. In the command line, run 'php -S localhost:8000'
3. Use any browser to navigate to http://localhost:8000

### Front End Application

This section was complete using a combination of HTML5, CSS3, AngularJS, Bootstrap, and Bootstrap UI. AngularJS was utilized in order to easily make JSONP requests and display the obtained data in the DOM view. The framework's ng-repeat functionality made it simple to create module blocks and display information for each piece of content. Bootstrap was used for general styling and element arrangement. This task was made easy thanks to it's built-in grid system. In particular, Bootstrap was chosen because of it's "responsive first" philosphy, making it simple ot build a page that fits a variety of resolutions. Finally, Bootstrap UI was utilized to create the tab system to switch between video and article content.

To view the webpage, ensure that you are connected to the internet and click on the **home.html** file.
