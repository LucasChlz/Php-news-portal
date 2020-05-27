<?php

namespace Source\Util;

class Utility
{
    public static function alertJs($msg)
    {
        echo "<script>alert('.$msg.')</script>";
    }

    public static function generateSlug($str){
        $str = mb_strtolower($str);
        $str = preg_replace('/(â|á|ã)/', 'a', $str);
        $str = preg_replace('/(ê|é)/', 'e', $str);
        $str = preg_replace('/(í|Í)/', 'i', $str);
        $str = preg_replace('/(ú)/', 'u', $str);
        $str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
        $str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
        $str = preg_replace('/( )/', '-',$str);
        $str = preg_replace('/ç/','c',$str);
        $str = preg_replace('/(-[-]{1,})/','-',$str);
        $str = preg_replace('/(,)/','-',$str);
        $str=strtolower($str);
        return $str;
    }
    
    public static function imgValidates($image){
        if($image['type'] == 'image/jpeg' ||
            $image['type'] == 'image/jpg' ||
            $image['type'] == 'image/png')
        {
            return true;
        }else{
            return false;
        }
    }

    public static function uploadImg($image){
        $imageType = explode('.',$image['name']);
        $imageName = uniqid().'.'.$imageType[count($imageType) -1];
        if(move_uploaded_file($image['tmp_name'],URL_DIR.'/views/Images/'.$imageName)){
            return $imageName;
        }else{
            return false;
        }
    }


}

