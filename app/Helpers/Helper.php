<?php

namespace MyJesus\Helpers;
use Cookie;
use Illuminate\Support\Facades\Crypt;
use MyJesus\Models\Languages;

class Helper 
{
    public static function Current_Version()
	{
	    $version = 'Version 3.3';
		return $version;
	}
    public static function translation($id,$code,$keyword) 
    {
	    $view_language['details'] = Languages::viewLanguage();
		$language_token = base64_encode($id);
		foreach($view_language['details'] as $viewdata)
		{
		   if($code == 'en')
		   {
			    $check_en = Languages::en_Translate_check($id,$code);
				if($check_en == 0)
				{
				$endata = array('keyword_id' => $id, 'keyword_token' => $language_token,  'keyword_label' => $keyword, 'keyword_text' => $keyword, 'language_code' => $code, 'keyword_parent' => 0); 
				Languages::SaveData($endata);
				}
		   }
		   else
		   {
		        $check_other = Languages::other_Translate_check($id,$code);
				if($check_other == 0)
				{
				$endata = array('keyword_id' => uniqid(), 'keyword_token' => $language_token,  'keyword_label' => $keyword, 'keyword_text' => $keyword, 'language_code' => $code, 'keyword_parent' => $id); 
				Languages::SaveData($endata);
				}
		   }	
		} 
	    if($code == 'en')
		{
		   $tran_value['view'] = Languages::en_Translate($id,$code);
		}
		else
		{
		  $tran_value['view'] = Languages::other_Translate($id,$code);
		}
		return $tran_value['view']->keyword_text;
        
    }
	
}