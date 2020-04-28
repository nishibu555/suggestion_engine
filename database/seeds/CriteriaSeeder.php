<?php

use Illuminate\Database\Seeder;
use App\Criterion;

class CriteriaSeeder extends Seeder
{
        private $criteria = ['season', 'occasion'];
        public $operator = [
          ['sign'=>'>', 'name'=>'isGreaterThan'],
          ['sign'=>'<', 'name'=>'isLessThan'],
          ['sign'=>'=', 'name'=>'']
        ];
        public $season = ['all', 'autumn', 'winter'];
        public $occasion = ['all', 'mothers day', 'easter sunday'];

    public function run()
    {
        foreach ($this->criteria as $criterionName) {
        	foreach ($this->$criterionName as $criterionValue) {
        		foreach ($this->operator as $operator) {
        			if($operator['sign'] == '=')
        				$short_name =  $criterionName."_".$criterionValue;
        			else 
        				$short_name =  $criterionName."_".$operator['name']."_".$criterionValue;
                    Criterion::firstOrCreate([
	                    'name' => $criterionName,
	                    'value' => $criterionValue,
	                    'operator' => $operator['sign'],
	                    'short_name' => $short_name
                    ]);
        		}
        	}
        }
    }
}
