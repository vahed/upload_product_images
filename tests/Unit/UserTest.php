<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Generator as Faker;
use App\Photos;
use App\Product;

class UserTest extends TestCase
{	
	//use DatabaseTransactions;
	/** @test */
	public function it_has_a_descr_record_in_photo_table(){

		$photo = new Photos;	
		$this->assertDatabaseHas('photos', ['descr' => 'A photograph representing the Automotive category']);
	}
	
	public function it_has_ten_column_record_in_photo_table(){
		$photos = new Photos;	
		$this->assertEquals(10, $photos->count());
	}
	
	public function create_a_record_in_photo_table(){
		$photo = new Photos;
		$photo->is = 1; $photo->descr = "This is a record test added to photos database table";
		$photo->save();
		$this->assertDatabaseHas('photos', ['descr' => 'This is a record test added to photos database table.222']);
	}
}
