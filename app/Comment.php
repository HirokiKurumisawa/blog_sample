<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*public function Post()
    {
        return $this->belongsTo('App\Post','foreign_key');
    }*/
    protected $fillable = ['commenter', 'comment', 'post_id'];# ホワイトリスト_複数代入時に代入を許可する属性を配列で設定


}
