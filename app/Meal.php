<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

	/*
	*Attributes that are mass assignable
	*/
	protected $fillable = ['name'];

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function foods(){

    	return $this->hasMany(Food::class);
    }

		public function calculateProtein(){
			$totalProtein=0;
				foreach($this->foods as $food){
				$totalProtein = $totalProtein + $food->protein;
				}
			return $totalProtein;
		}

		public function calculateCarbs(){
			$totalCarbs=0;
				foreach($this->foods as $food){
				$totalCarbs = $totalCarbs + $food->carbs;
				}
			return $totalCarbs;
		}

		public function calculateFat(){
			$totalFat=0;
				foreach($this->foods as $food){
				$totalFat = $totalFat + $food->fat;
				}
			return $totalFat;
		}

		public function calculateCalories(){
			$totalCals=0;
				foreach($this->foods as $food){
				$totalCals += ($food->fat * 9);
				$totalCals += ($food->carbs * 4);
				$totalCals += ($food->protein * 4);
				}
			return $totalCals;
		}
}
