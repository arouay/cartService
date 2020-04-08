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

    public function testGetCartsBy(){
        $field = "customer";
        $var = "arouay abdelalim";
        $this->assertNotNull(Cart::getCartsBy($field,$var));
    }

    public function testGetItemsBy(){
        $testCart = DAO::getById(Cart::class,1);
        $testItems = $testCart->getItemsBy("id",1);
        $this->assertContains($testItems,DAO::getById(\models\Item::class,1));
    }

    public function testAddItem(){
        $testItem = DAO::getById(\models\Item::class,1);
        $testCart = DAO::getById(Cart::class, 1);
        $testCart->addItem($testItem);
        Cart::update($testCart);
        $returnTestCart = DAO::getById(Cart::class, 1);
        $this->assertNotNull($returnTestCart->getItemsBy("id",1));
    }

    public function testRemoveItem(){
        $testCart = DAO::getById(Cart::class, 1);
        $testCart->removeItem(1);
        Cart::update($testCart);
        $returnTestCart = DAO::getById(Cart::class, 1);
        $this->assertNull($returnTestCart->getItemsBy("id",1));
    }

    public function testUpdateItem(){

    }

    public function testGetTotal(){
        $testCart = new Cart();
        $testItem = new \models\Item();
        $testItem2 = new \models\Item();
        $testItem->setUnitPrice(100);
        $testItem2->setUnitPrice(50.25);
        $testCart->addItem($testItem);
        $testCart->addItem($testItem2);
        $this->assertEquals($testCart->getTotal(), 150.25);
    }

    public function testClear(){

    }
}