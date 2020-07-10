<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

class Article extends Model
{
        use Searchable;

        
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'r2f_new_actualite_testing_copy';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['contenutext','contenuJson','id','idcat','admin_creator_id'];
    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
       'created_at' => 'datetime:Y-m-d',
       'updated_at' => 'datetime:Y-m-d',
       'dateactu' =>'datetime:Y-m-d',
       'contenuJson' => 'array'
    ];
    

    public function getArtistsAttribute(){

        return $this->artists()->orderBy('rank')->get();
    }

    public function getIsFeaturedAttribute(){

        if($featured = \App\Models\FeaturedArticle::where('article_id',$this->id)->first()){

            return ['date_start' => $featured->date_start, 'date_end' => $featured->date_end];

        }else{

            return null;

        }
    }

    public static function published(){

        return self::where('status',2);
    }


    public function getDateActuAttribute(){

        return Carbon::parse($this->created_at)->isoFormat('MMM Do YY');
    }


    public function getCreatorAttribute(){


    	return \App\Models\Administrator::findOrFail($this->admin_creator_id);
    }

    public function getCategoryAttribute(){

        return \App\Models\Category::findOrFail($this->idcat);
    }
    
    public function getAvatarAttribute(){

        if($this->type == 1){

            return "https://cd1.rap2france.com/public/medias/news/".$this->id."/660x330/mdpi/".$this->image;
        }
         
        return "http://rapvue.test/images/admin/articles/avatars/optimized/".$this->image; 
    

    }
    public function getContenuFormatAttribute(){

        if($this->type == 1 ){

            return ['type' => "raw", 'contenu' => html_entity_decode($this->contenu)  ];
       
        }else{

            return ['type' => "json" , 'contenu' => $this->contenuJSON];
        }
    }

    

    public function getHashtagsAttribute(){

        return $this->hashtags()->get();

    }

    public static function fetchByTag($tag){

        return self::where('tag',$tag)->first();
    }


    public function artists()

    {

        return $this->belongsToMany(\App\Models\Artist::class, 'r2f_new_article_artist')
                    ->withPivot('rank');

    }

    public function hashtags()

    {

        return $this->belongsToMany(\App\Models\Hashtag::class, 'r2f_new_actualités_hashtags');

    }
}
