# CodeFoo2018Application

### Introduction

Hello! I am Brock Sauvage, a fourth-year Interdiscplinary Computing student at the University of Kansas. A bit about me -- I enjoy living purely on coffee, discussing the merits of double-bladed lightsabers (they're so cool,) and taking long walks through Stack Overflow. I'm an apsiring programmer and journalist with a keen eye for design and a love for web development. However, above all else, I am a nerd -- one of the main reasons I am so passionate about IGN! Having regularly frequented IGN's website for many years, I've been able to witness the evolution of a media outlet centered around my favorite thing: geek culture. Furthermore, I've been consistently inspired by the work that IGN's developers and journalists have produced, whether that be engaging content or quality website interface design. That's why I'm applying to Code Foo 2018; I desire to have a role in the development of products that have been used by millions.

I believe that I would be a good fit for Code Foo 2018 for a variety of reasons. Having previously interned in a role where I worked as a front end developer, I gained experience with REST APIs, JavaScript frameworks such as AngularJS, responsive web design, and general UI/UX design. In this position, I was responsible for the development of a web-based software that would be used by company employees to display important client information. I worked with a team of developers to create an effective, easily usable application that would serve company and employee needs. Additionally, I have served for three semesters as a web developer in a student advertising agency at the University of Kansas, utilizing HTML5, CSS3, and JavaScript to work on client projects that have gone on to be used by many people. In each of these rolls, it has been important to effectively communicate with those I am working with in order to efficently develop quality products. For these reasons, I believe that I would be an excellent choice for the Code Foo program.



### A Towering Problem

To tackle this problem, I am going to start by doing some background research. Thankfully, Thanos wasn't able to destroy the internet, so we'll use that to our advantage. To faithfully recreate the late Eiffel Tower, we'll need to gather some information on it. Primarily, I'm looking for the volume of the stucture, since this will give us a good estimate of how many Geomags to use. A quick goole search yields immediate results; the Eiffel Tower has a volume of 930m^3. (Wordpress, Mr. Reid) Excellent. Now, we need to find the volume of a Geomag.

Another Google search tells us that a Geomag Rod is 27mm long, with a maximum diameter of 7.4mm. The spheres that connect the rods are about 12.7mm in diameter. (Geomag Wiki) Using these values to calculate the volume of a single Geomag and sphere, we end up with 1161.23mm^3 and 804.40 mm^3, respectively. We're going to go ahead and make the assumption that when we're constructing the tower, we'll be using the rods and spheres in a one-to-one relationship such that each Geomag will eventually connect to a sphere on both ends of the rod. Knowing this, we can add the two values we obtained to get 1965.63mm^3, or about 0.002m^3 (rounding the result of the conversion.)

Now, it's just a matter of seeing how many times the volume we obtained for the Geomag unit can fit inside the volume of the Eiffel Tower. Dividing the volume of the Eiffel Tower by the volume of a Geomag unit, we see that it would take approximately 450,000 Geomags to reconstruct the Eiffel Tower. Sacrebleu, indeed.

With the total number of Geomag units we'll need figured out, we can start drafting a construction process. My first reaction is to hire an architectural engineer, but that wouldn't be any fun. We'll do this ourselves. Yet again, we'll take advantage of Thanos's oversight and do a quick Google search for Eiffel Tower blueprints. Wikimedia Commons provides several architectural drawings of the tower, including dimensional detailing. Utilizing one that displays the cross section of the base, we can measure and mark off the construction site and show where the legs of the tower will stand. From there, we can use the collection of the blueprints and begin building with a "bottom-up" approach. Here, we'll essentially add layer by layer to the base of the tower until it's complete, consulting the blueprints for accuracy. With any luck, we'll end up with a wonderful reacreation of the Eiffel Tower. Violá!

###### Sources
http://geomag.wikia.com/wiki/Geomag_Weights_and_Measures
http://wordpress.mrreid.org/2011/02/11/an-interesting-fact-about-the-eiffel-tower/
https://commons.wikimedia.org/wiki/Category:Architectural_drawings_of_the_Eiffel_Tower

### Crossing the Road

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

### Conclusion

Thank you for taking the time to look through my application! I originally heard about Code Foo from postings on the IGN website. I've seen it posted annually for a few years now, so I thought I'd give it a shot! If you have any questions, please feel free to reach out to me at bsauvage14@gmail.com. Thank you for your consideration!
