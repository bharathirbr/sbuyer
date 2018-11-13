<?php
namespace App\Helpers;
use Session;
use Image;

class MyFunction {
    
    public static function image_upload($image_name,$normal_image,$thump_image)
     {     	
                  if($_POST)
                    {                   	
                        $photo = @$image_name ;
                        if($photo)
                      {
                            if(@Session::get('user_id')[0]['id'] !=''){
                                $var = @Session::get('user_id')[0]['id'].'_';
                            }else{
                                 $var ='';
                            }
                        $imagename = $var.time().'.'.$photo->getClientOriginalExtension();    
                        $destinationPath = public_path($thump_image);
                        $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
                        $thumb_img->save($destinationPath.'/'.$imagename,80);                                    
                        $destinationPath = public_path($normal_image);
                        $photo->move($destinationPath,$imagename);
                        return $imagename;
                     }else{
                     	return false;
                     }
                    }
                 else{                 	
                    	return false;
                    }
       
     }
     public static function images($normal_image,$thump_image)
     {                   
     	      if($normal_image){$normal_image = url('/public/images/'.$normal_image) ; return $normal_image ; }else{$thump_image = url('/public/images/'.$thump_image) ; return $thump_image ; }               
     } 

     public static function generateRandomString($length)
     {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }
}