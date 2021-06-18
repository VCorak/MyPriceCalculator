<?php
declare(strict_types=1);

class HomepageController
{
    // RENDER FUNCTION / both $_GET and $_POST variables available (if needed)
    public function render(array $GET, array $POST)

    {
        // CREATING NEW OBJECTS

        // GETTING ALL THE PRODUCTS
        $loader = new ProductLoader();
        $products = $loader->getAllProducts();

        // GETTING ALL THE CUSTOMERS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomer = new CustomerLoader();
        $customers = $loaderCustomer->getAllCustomers();

        // GETTING ALL THE CUSTOMER GROUPS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomerGroup = new CustomerGroupLoader();
        $allCustomerGroups = $loaderCustomerGroup->getAllCustomerGroups();

        // DECLARING VARIABLES

        $selectFinalPrice = '';
        $selectCustomerFixed = '';
        $selectBestVarDisc = '';
        $selectCustomerId = '';
        $selectCustomerFullName = '';
        $selectProductName = '';

        if (isset($_POST['submit'])){
            $product = $loader->getProductById((int)$_POST["product"]);
            $selectProductName = $product->getName();
            $customer = $loaderCustomer->getCustomerById((int)$_POST["customer"]); // loading customer database to get the id's- this is calling a method to get the object!!!
            $selectCustomerFullName = $customer->getFullName();// then get me full name of that customer
            $calculate = new Calculator((int)$_POST["customer"], (int)$_POST["product"]); // creating new object for calculating discounts
            $calculate->calculatorFunc();
            $selectFinalPrice = $calculate->getFinalPrice();
            $selectCustomerFixed = $calculate->getCustomerFixed();
            $selectBestVarDisc = $calculate->getBestVarDisc();
            $selectCustomerId = $calculate->getIdCustomer();

        }

        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}