<?php
use \models\Cart;
use Ubiquity\orm\DAO;

class CartTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testSave()
    {
        $cart = new Cart();
        $cart->setCreated("2020-03-12 00:00:00");
        $cart->setCustomer(null);
        $cart->setItems(null);
        Cart::save($cart);
        $this->assertNotNull(DAO::getOne(Cart::class,["created"=>"2020-03-12 00:00:00"]));
    }

    public function testDelete(){
        Cart::delete(19);
        $this->assertNull(DAO::getById(Cart::class,19));
    }

    public function testUpdate(){
        $cart = DAO::getById(Cart::class,1);
        $cart->setCreated("2020-12-11 00:00:00");
        Cart::update($cart);
        $this->assertEquals($cart->getCreated(),DAO::getById(Cart::class,1)->getCreated());
    }
}