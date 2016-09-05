NutritionXpert
==============

NutritionXpert allows you to create a menu plan for a specified time 
period. It gives you the necessary tools to manage your diet and monitor 
your intake.

Ingredient
==============
Ingredients are the basis for your nutrition. The app allows you to 
create your own ingredients as needed and edit or delete existing ones. 
Once finished the base data set of the app will come from 
http://www.naehrwertdaten.ch/ (the swiss database of food articles).
This database contains an exhaustive list of base and branded foods 
(including Coop and Migros articles).

Recipes
==============
As a very basic structure (at the moment) the app allows you to compose 
certain ingredients into a fixed "recipe". The recipes are to be 
interpreted as bundles of weighted ingredients for convenience.

Plan
==============
The plan consists of recipes and ingredients scheduled for a specified 
date, which allows the user to monitor the intake of the base 
nutritional values. Caloric intake can be measured and split up among 
the base nutritional values.

Future Development
==================
Features:

* Generate grocery list from specified amount of time (week or date range)
* Extend from base nutritional values to all available data (including vitamins and minerals)
* Recommended daily average to be factored in
* Calculator for caloric intake (based on weight and body fat etc)

Questions & Problems
====================

* Recipe and ingredients in Plan -> Inheritance relationship
--* Which type?
--* Calculated (with complex join) vs static with calculated rows
* Testing of Controllers (have a look at together)
* Testing of Forms
* Fixtures for Testing (practical example)
--* Example for containsName query