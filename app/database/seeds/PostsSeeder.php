<?php
	
	use Faker\Factory as Faker;

	class PostsSeeder extends Seeder
	{
		public function run ()
		{
			$faker = Faker::create();

			for($i=0; $i<30; $i++) {
				$post = new Post();
				$post->title = $faker->catchPhrase . " " . $faker->catchPhrase;
				$post->body = $faker->bs;
				$post->user_id = User::all()->random(1)->id;
				$post->save();
			}

		}
	}



?>