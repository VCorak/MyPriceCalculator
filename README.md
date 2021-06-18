![price](https://user-images.githubusercontent.com/68239365/122572944-89a12d00-d04e-11eb-83f9-ac0cc65a719c.png)
# MyPriceCalculator

Description
Exercise on PHP/OOP/MVC.

The Mission
Make a price calculator with the following entities:

 - [x] Customer (Firstname, Lastname)
 - [x] A customer group (Name)
 - [x] A product (product name, price in cents)
To calculate the price:
- [x] For the customer group: In case of variable discounts look for highest discount of all the groups the user has.
- [x] If some groups have fixed discounts, count them all up.
 - [x]Look which discount (fixed or variable) will give the customer the most value.
 Now look at the discount of the customer.
 - [x]In case both customer and customer group have a percentage, take the largest percentage.
 - [x]First subtract fixed amounts, then percentages!
 - [x]A price can never be negative.
Must-have features
- [x] A dropdown where you can select a Product and a Customer and you get the basic information of the product + the price.
- [x] Use a MVC pattern. You can use the MVC Boilerplate.
 - [x]Use separate objects for importing the entities with SQL, and for managing the entities.
Nice to have features
 - []An actual login page for a customer
 - [x]A table where you can see in detail how the price is calculated
 - []The possibility to have different prices for different quantities (look, 1 EUR per item for 1, 0.9 EUR per item for 100, ...)
 - []A category page for the different products
Project Planning
https://docs.google.com/spreadsheets/d/1LHroy3xV75rNEqmFXB6_hWa0peYXtfiK977wq8n6VDY/edit#gid=0
