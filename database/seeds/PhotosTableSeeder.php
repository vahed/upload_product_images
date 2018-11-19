<?php

use Illuminate\Database\Seeder;
use App\Photos;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->delete();
		$json = file_get_contents("https://raw.githubusercontent.com/pricesearcher/web-developer-code-test/master/test_data.json");
		$jsonObj = json_decode($json);
		foreach($jsonObj as $obj){
			Photos::create(array(
				'id' => $obj->id,
				'descr' => $obj->descr
			));
		}
    }
}
