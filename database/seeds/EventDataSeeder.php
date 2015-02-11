<?php
/**
 * Created by PhpStorm.
 * User: andrea.terzani
 * Date: 11/02/2015
 * Time: 12:33
 */

class EventDataSeeder extends Seeder {

    public function run()
    {
        DB::table('events')->delete();

        Event::create(array('title' => 'Event test 1',
                            'description'=>'Description for event',
                            'user_id'=>1));
    }

}