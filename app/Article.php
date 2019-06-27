<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //  

    protected $fillable = ['art_title','art_img','art_alias','art_text','art_desc','keywords','meta_desc','category_id','user_id'];
    

    public function user(){

    	return $this->belongsTo('Corp\User','user_id');
    }

	 public function category(){

    	return $this->belongsTo('Corp\Category');
    }   

    public function comments(){
        
        return $this->hasMany('Corp\Comment');
    } 


}
