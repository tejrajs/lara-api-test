<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Property;
use App\Transformer\PropertyTransformer;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;

class PropertyController extends Controller
{
	protected $respose;
	
	public function __construct(Response $response)
	{
		$this->response = $response;
	}
	public function search()
	{
		//Get the task
		$properties = QueryBuilder::for(Property::class)
			->allowedFilters([Filter::scope('between'),'name', Filter::exact('price'), Filter::exact('bedrooms'), Filter::exact('bathrooms'), Filter::exact('storeys'), Filter::exact('garages')])
			->paginate(100);
	
		if (!$properties) {
			return $this->response->errorNotFound('Property Not Found');
		}
		
		// Return a properties
		return $this->response->withPaginator($properties, new  PropertyTransformer());
	}
	public function index()
	{
		//Get all property
		$properties = Property::paginate(15);
		// Return a collection of $property with pagination
		return $this->response->withPaginator($properties, new  PropertyTransformer());
	}
	
	public function show($id)
	{
		//Get the property
		$property = Property::find($id);
		if (!$property) {
			return $this->response->errorNotFound('Property Not Found');
		}
		// Return a single property
		return $this->response->withItem($property, new  PropertyTransformer());
	}
	
	public function destroy($id)
	{
		//Get the property
		$property = Property::find($id);
		if (!$property) {
			return $this->response->errorNotFound('Property Not Found');
		}
	
		if($property->delete()) {
			return $this->response->withItem($property, new  PropertyTransformer());
		} else {
			return $this->response->errorInternalError('Could not delete a property');
		}
	
	}
	
	public function store(Request $request)  {
		if ($request->isMethod('put')) {
			//Get the property
			$property = Property::find($request->property_id);
			if (!$property) {
				return $this->response->errorNotFound('Property Not Found');
			}
		} else {
			$property = new Property;
		}
	
		$property->id = $request->input('property_id');
		$property->name = $request->input('name');
		$property->price = $request->input('price');
		$property->bedrooms = $request->input('bedrooms');
		$property->bathrooms = $request->input('bathrooms');
		$property->storeys = $request->input('storeys');
		$property->garages = $request->input('garages');
		//$property->user_id =  1; //$request->user()->id;
	
		if($property->save()) {
			return $this->response->withItem($property, new  PropertyTransformer());
		} else {
			return $this->response->errorInternalError('Could not updated/created a property');
		}
	
	}
}
