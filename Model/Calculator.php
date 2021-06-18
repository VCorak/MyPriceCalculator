<?php
declare(strict_types=1);

class Calculator
{

// DECLARING THE PROPERTIES

// PRODUCT
private int $idProduct;
private float $price;

// CUSTOMER
private int $idCustomer;
private int $customerName;
private int $customerLastName;
private int $customerFixed;
private int $customerVariable;

// GROUP
private int $sumFixedGroupDisc;
private array $groupVariable;
private array $groupFixed;
private int $maxGroupDisc;
private string $bestGroupDisc;


public function __construct(int $idCustomer, int $idProduct)
{
$this->idCustomer = $idCustomer;
$this->idProduct = $idProduct;

}

// METHODS

public function getDisc()
{
if (isset($this->idCustomer)) { // if customer id is checked

// LOADING CUSTOMER DATA
$loaderCustomer = new CustomerLoader();
$allCustomers = $loaderCustomer->getAllCustomers();

// WE NEED CUSTOMER ID IN ORDER TO AVOID DOUBLE NAMES (COULD GIVE US WRONG RESULTS)
$customer = $loaderCustomer->getCustomerById($this->idCustomer);


// LOADING GROUP DATA
$loaderCustomerGroup = new CustomerGroupLoader();
$allCustomerGroups = $loaderCustomerGroup->getAllCustomerGroups();

// LOADING THE GROUP ID AND ITS DISCOUNTS
$customerGroup = $customer->getGroupId();
$this->customerFixed = $customer->getFixedDiscount();
$this->customerVariable = $customer->getVariableDiscount();

// LOADING THE CUSTOMER GROUP ID AND ITS DISCOUNTS
$group = $loaderCustomerGroup->getCustomerGroupById((int)$customerGroup);
$this->groupFixed = array($group->getFixedDiscount());
$this->groupVariable = array($group->getVariableDiscount());

// PARENT ID!!!
$parentID = $group->getParentId(); // if user in this customer group also has parent id

while ($parentID > 0) { // parent ID has to be bigger than 0, starts from 1 or it is null
$group = $loaderCustomerGroup->getCustomerGroupById((int)$parentID); // check if group id has also parent id
$fixed = $group->getFixedDiscount(); //  check if it has a fixed discount
if (isset($fixed)) {
array_push($this->groupFixed, $group->getFixedDiscount()); // if it has push it to array
}
$variable = $group->getVariableDiscount(); // check if it has a variable discount
if (isset($variable)) {
array_push($this->groupVariable, $group->getVariableDiscount()); // if it has push it to array
}
$parentID = $group->getParentId();
}
}
}

// GET PRODUCT ORIGINAL PRICE FROM WHICH WE GONNA CALCULATE DISCOUNTS
public function getPrice()
{
$loader = new ProductLoader();
$allProducts = $loader->getAllProducts();

if (isset($this->idProduct)) {
$product = $loader->getProductById((int)$_POST["product"]);

$this->price = $product->getPrice();
}
}

public function calculatorFunc()
{
    $this->getDisc();
    $this->getPrice();

    $this->maxVarGroupDisc = max($this->groupVariable); // find max value of variable group discount
    $this->sumFixedGroupDisc = array_sum($this->groupFixed); // summarize all fixed discounts pushed to the array

    if ($this->maxVarGroupDisc > $this->customerVariable) { // if max variable group discount is bigger than customer variable discount->
        $this->bestVarDisc = $this->maxVarGroupDisc; // make it best variable discount for customer
    } else {
        $this->bestVarDisc = $this->customerVariable; // if it is not bigger leave customer variable discount as best for customer
    }
    // calculation of final price
    $this->finalPrice = (($this->price - ($this->customerFixed * 100) - ($this->sumFixedGroupDisc * 100)) * (1 - $this->bestVarDisc / 100)) / 100;

    // round -> returns a float, 2 (= precision), returns 2 digits after the comma
    $this->finalPrice = round($this->finalPrice, 2);

    //if the total price is negative change total price to zero
    if ($this->finalPrice < 0) {
        $this->finalPrice = 0;
    }

}

// GETTERS

public function getIdCustomer(): int
{
return $this->idCustomer;
}

public function getIdProduct(): int
{
return $this->idProduct;
}

public function getCustomerFixed(): int
{
return $this->customerFixed;
}

public function getCustomerVariable(): int
{
return $this->customerVariable;
}

public function getGroupFixed(): array
{
return $this->groupFixed;
}

public function getSumFixedGroupDisc(): int
{
return $this->sumFixedGroupDisc;
}

public function getGroupVariable(): array
{
return $this->groupVariable;
}

public function getmaxVarGroupDisc(): int
{
return $this->maxVarGroupDisc;
}

public function getPrice2(): float
{
return $this->price;
}

public function getBestGroupDisc(): string
{
return $this->bestGroupDisc;
}

public function getBestVarDisc(): int
{
return $this->bestVarDisc;
}


public function getFinalPrice(): float {
    return $this->finalPrice;
    }
}
