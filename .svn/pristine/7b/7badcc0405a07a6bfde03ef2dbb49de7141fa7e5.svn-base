<?php
namespace App\Repository\Customer;

use App\Models\Customer;

class CustomerRepository implements ICustomerRepository
{
    /**
     * $customer variable to create ICustomerRepository object
     * @var ICustomerRepository
     */
    protected $customer;

    /**
     * CustomerRepository constructor.
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomerCountBy($username, $password)
    {
        return $this->customer->where(['username' => $username, 'password' => $password])->count();
    }

}