<?php

use App\User;
use App\Message;
use App\Category;
use App\Item;
use App\Requirement;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('items')->delete();
        DB::table('categories')->delete();
        DB::table('requirements')->delete();
        DB::table('messages')->delete();
		
		$user1 = User::create(array(
			'name' => 'Sayyed Shozib Abbas',
			'dob' => '1996-07-26',
			'mobile' => '03009849845',
			'email' => '14bscssabbas@seecs.edu.pk',
			'address' => 'House 123 Street 1 Sector A Islamabad',
			'password' => bcrypt('cd@12345'),
		));
		
		$user2 = User::create(array(
			'name' => 'Sayyed Shehzer Abbas',
			'dob' => '2001-07-24',
			'mobile' => '03315760946',
			'email' => 'shehzerabbas@gmail.com',
			'address' => 'House 456 Street 2 Sector A Islamabad',
			'password' => bcrypt('cd@12345'),
		));
		
		$this->command->info('user seeds finished.');
		
		$cat1 = Category::create(array(
			'name' => 'category 1',
		));
		
		$cat2 = Category::create(array(
			'name' => 'category 2',
		));
		
		$this->command->info('category seeds finished.');
		
		$item1 = Item::create(array(
			'name' => 'Item 1',
			'description' => 'Item 1 desc',
			'location' => 'Rawalpindi',
			'worth' => 500,
			'paymentAllowed' => 0,
			'itemStatus' => 'Posted',
			'category_id' => $cat1->id,
			'user_id' => $user1->id
		));
		
		$item2 = Item::create(array(
			'name' => 'Item 2',
			'description' => 'Item 2 desc',
			'location' => 'Islamabad',
			'worth' => 200,
			'paymentAllowed' => 0,
			'itemStatus' => 'Posted',
			'category_id' => $cat2->id,
			'user_id' => $user1->id
		));
		
		$item3 = Item::create(array(
			'name' => 'Item 3',
			'description' => 'Item 3 desc',
			'location' => 'Rawalpindi',
			'worth' => 1000,
			'paymentAllowed' => 0,
			'itemStatus' => 'Posted',
			'category_id' => $cat1->id,
			'user_id' => $user2->id
		));
		
		$this->command->info('items seeds finished.');
		
		$req1 = Requirement::create(array(
			'name' => 'requirement 1',
			'description' => 'description 1',
			'user_id' => $user1->id
		));
		
		$req2 = Requirement::create(array(
			'name' => 'requirement 2',
			'description' => 'description 2',
			'user_id' => $user2->id
		));
		
		$req3 = Requirement::create(array(
			'name' => 'requirement 3',
			'description' => 'description 3',
			'user_id' => $user1->id
		));
		
		$req4 = Requirement::create(array(
			'name' => 'requirement 4',
			'description' => 'description 4',
			'user_id' => $user1->id
		));
		
		$this->command->info('requirements seeds finished.');
		
		$mess1 = Message::create(array(
			'description' => 'description 1',
			'to_id' => $user1->id,
			'from_id' => $user2->id,
			'item_id' => $item3->id
		));
		
		$mess2 = Message::create(array(
			'description' => 'description 1',
			'to_id' => $user2->id,
			'from_id' => $user1->id,
			'item_id' => $item2->id
		));
		
		$this->command->info('messages seeds finished.');
    }
}
