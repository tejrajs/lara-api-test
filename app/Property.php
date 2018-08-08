<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //Table Name
	protected $table = "properties";
	 
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	
			'name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'
	];
	
	public function scopeBetween($query, $fprice=0, $sprice=0)
	{
		return $query->whereBetween('price', [$fprice, $sprice]);
	}
}
