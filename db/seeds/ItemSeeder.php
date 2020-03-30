<?php


use Phinx\Seed\AbstractSeed;

class ItemSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data=[];
        for($i = 0; $i<25; $i++){
            $data[] = [
                'label' => 'item - number : ' . $i,
                'quantity' => $i+1,
                'unitPrice' => $i + 1 * 1.25
            ];
        }

        $this->table('item')->insert($data)->save();
    }
}
