<?php

use Illuminate\Database\Seeder;
use App\Suggestion;
class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedSuggestion();
    }

    public function seedSuggestion()
    {
    	$file = fopen(base_path()."/database/seeds/csv/SuggestionSeeder.csv","r");
        $columns = fgetcsv($file);
        while(! feof($file)) {
            $values = fgetcsv($file);
            if (!$values) {
                break;
            }
            $rows = array_combine($columns, $values);
            $category = array_shift($rows);
            $weight = array_pop($rows);
            foreach ($rows as $key =>$value) {
                $criteria = 'short_name';
                Suggestion::firstOrCreate([
                      'category' => $category,
                      'criteria' =>$criteria,
                      'weight' => $weight
                ]);
            }
        }
    }
}
