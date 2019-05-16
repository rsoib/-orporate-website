<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

	protected $fillable = ['com_name','com_email','com_text','com_site','user_id','article_id','parent_id'];

    public function article(){

    	return $this->belongsTo('Corp\Article');
    } 

    public function user(){

    	return $this->belongsTo('Corp\User');
    } 



}
