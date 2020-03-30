<?php


use Phinx\Seed\AbstractSeed;

class CartSeeder extends AbstractSeed
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

        $data = [];
        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'created'       => date('Y-m-d H:i:s'),
                'id'      => $i+1,
                'id'          =>$i+1
            ];
        }

        $this->table('cart')->insert($data)->save();
    }
}
