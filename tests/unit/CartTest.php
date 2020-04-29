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
        $this->tester->seeInDatabase('cart', ['created'=>'2009-05-24 00:00:00']);

        //$this->assertNotNull(DAO::getOne(Cart::class,["created"=>"2020-03-12 00:00:00"]));
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
        $cart = DAO::getById(Cart::class, 8);
        $item = DAO::getById(\models\Item::class, 5);
        $item2 = DAO::getById(\models\Item::class, 2);
        $item3 = DAO::getById(\models\Item::class, 4);

        $cart->addItem($item);
        $cart->addItem($item2);
        $cart->addItem($item3);

        $this->assertEquals(1710, $cart->getSubTotal());
        $this->assertEquals(1799.3, $cart->getTotal());
        $this->assertEquals(89.3, $cart->getTotalVAT());
    }

    public function testClear(){

    }
}