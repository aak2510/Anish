This is a program for a Reverse Polish calculator. This calculator was developed on the Eclipse platform as a Maven project using strict TDD. This calculator can be run on any command line terminal and is yet to have a GUI view implemented (see tags and News changelog of when this would be done).

This calculator has the ability to calculate mathematical expressions written in either Reverse Polish Notation (Postfix) or in Infix. It deals with 4 kinds of operators, +, -, *, and / - and gives an returns an answer to 6 decimal places to allow for more accurate precision. Infix expressions are first converted to postfix using the notorious Shunting Yard Algorithm and are then evaluates as such.

This calculator was implemented using several design patterns which include MVC, Facade, Factory, Observer and adapter. These are the proper standards needed to cover up the complexities of this system, and to allow the user to utilise this application carefree.
