<?php 

namespace App\Controllers;

/**
 * just for the sake of understanding
 */
class Test extends BaseController
{
	
	public function test(): string 
	{
		return view('vue_template');
	}
}