<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\AOSTest;
use App\Http\Controllers\Controller;
use Request;

class AOSTestController extends Controller
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index(){
		// return view('aostest'); // Asiga aostest.blade.php como vista de éste método
		$aostest = AOSTest::all(); //Trae todos los registros de la tabla asiganada al controlador medienta el modelo
		// return $aostest; // Retorna en json la info traida en el paso anterior.
		// return view('aostest', compact('aostest')); // Asigna la vista aostest.blade.php y pasa los resultados como una variable a dicha vista
		return response()->json([
			'msg'		=> 'success',
			'thematics'	=> $aostest->toArray()
		]); // Retorna los resultados como json en la estructura definida
    }
    /**
     * [store description]
     * @return [type] [description]
     */
	public function store(){
		$input = Request::all();

		$info = AOSTest::create([
			'name'	=> $input['thematic'],
			'slug'	=> $this->slugify($input['thematic']),
		]);

		// return redirect('aostest');
		return response()->json([
			'msg'		=> 'success1',
			'thematic'	=> $info->toArray()
		]); // Retorna los resultados como json en la estructura definida
	}

	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id){

		$aostest = AOSTest::find($id);

		return response()->json([
			'msg'		=> 'success2',
			'thematic'	=> $aostest->toArray()
		]);
	}
	
	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update($id){
		$input = Request::all();

		$aostest = AOSTest::find($id);
		$aostest->name = $input['thematic'];
		$aostest->slug = $this->slugify($input['thematic']);
		$aostest->save();
		return response()->json([
			'msg'		=> 'success3',
			'thematic'	=> $aostest->toArray(),
			'input'		=> $input,
		]);
	}	

	/**
	 * [destroy description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function destroy($id){
		$aostest = AOSTest::find($id);
		$aostest->delete();
		return response()->json([
			'msg'		=> 'success4',
		]);
	}

	/**
	 * [slugify description]
	 * @param  [type] $text [description]
	 * @return [type]       [description]
	 */
	static public function slugify($text){ 
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		// trim
		$text = trim($text, '-');
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// lowercase
		$text = strtolower($text);
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text)){
			return 'n-a';
		}
		return $text;
	}
}
