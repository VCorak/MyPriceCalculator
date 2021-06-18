
<?php

class CustomerLoader extends ConnectDatabase

{
    private array $customers;

    public function __construct()
    {
        $con = ConnectDatabase::connect();
        $handle = $con->prepare('SELECT * FROM customer');
        $handle->execute();
        $selectedCustomers = $handle->fetchAll();

        foreach ($selectedCustomers as $customer) {
            $this->customers[] = new Customer((int)$customer['id'], $customer['firstname'], $customer['lastname'], (int)$customer['group_id'], (int)$customer['fixed_discount'], (int)$customer['variable_discount']);
        }
    }

    public function getAllCustomers(): array
    {
        return $this->customers;
    }

    public function getCustomerById(int $id) : Customer
    {
        foreach ($this->customers as $customer) {
            if ($customer->getId() === $id) {
                return $customer;
            }
        }
    }

}

