<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Criterion;

class SuggestionController extends Controller
{
    public function getSuggestion(Request $request)
    {   
        $c =array(); 
        $r = [
        	['name'=>'season', 'value'=>'autumn', 'operator'=>'='],
        	['name'=>'season', 'value'=>'autumn', 'operator'=>'>']
        ];
    	foreach ($r as $criteria) {
    		$shortName = Criterion::where('name', $criteria['name'])
    		           ->Where('value', $criteria['value'])
    		           ->where('operator', $criteria['operator'])
    		           ->pluck('short_name');
    		array_push($c, $shortName);           
    	}
    	dd($c);
    }

    public function updateWeight(Request $request)
    {   
    	Suggestion::where('category', $request->category)
    	->where('criteria', $request->criteria)
    	->update(['weight'=> $request->weight]);
    }
}
