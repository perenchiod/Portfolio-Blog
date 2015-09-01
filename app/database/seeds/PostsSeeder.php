<?php
	
	use Faker\Factory as Faker;

	class PostsSeeder extends Seeder
	{
		
		public function run ()
		{
			$faker = Faker::create();

			for($i=0; $i<30; $i++) {
				$tags = ['funny', 'troll', 'sad', 'current', 'serious', 'music', 'gaming', 'technology', 'business'];
				$j = 0;
				$tempArray = [];
				$randomNum = mt_rand(1,3);

				$post = new Post();
				$post->title = $faker->catchPhrase . " " . $faker->catchPhrase;
				$post->body = $faker->realText(200, 2);
				$post->picture = $faker->image($dir = '/tmp', $width = 640, $height = 480);
				$post->user_id = User::all()->random(1)->id;

				do{
					$tag = $tags[mt_rand(0 , sizeof($tags) - 1)];
					if($j <= 1) {
						array_push($tempArray, $tag);
						unset($tags[$tag]);
					} else {
						$tempArray = ["$tag"];
						unset($tags[$tag]);
					}
					//var j to determine how many elements have been pushed
					$j++;
					$randomNum--;
				}while($randomNum == 0);
				
				$post->tags = implode(", ", $tempArray);

				$post->save();
			}

		}
	}



?>