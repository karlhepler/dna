<?php

namespace App\Http\Controllers;

use NonAppable\Webster\Api;
use Illuminate\Http\Request;
use NonAppable\Webster\References\IntermediateDictionary;

class ApiController extends Controller
{
	/**
	 * Search the API for a word
	 *
	 * @param Request $request
	 * @param Api $webster
	 * @param IntermediateDictionary $intermediate
	 * @return Response
	 */
	public function search(Request $request, Api $webster, IntermediateDictionary $intermediate)
	{
		$webster->setDictionary($intermediate);

		return response()->json(
			$webster->search($request->input('q'))->toArray()
		);
	}
}
