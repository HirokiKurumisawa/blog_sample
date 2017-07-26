@extends('layouts.default')
 @section('content')

 <div class="col-xs-8 col-xs-offset-2">

     @foreach($posts as $post)

     <h2>タイトル：{{ $post->title }}
         <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
     </h2>
    <!--カテゴリーをクリックできるように変更↓-->     
     <p>カテゴリー：{!!  link_to("/blog/category/{$post->category->id}", $post->category->name, array('class' => '')) !!}</p>
    <!--カテゴリーをクリックできるように変更(2)↓--> 
     <!--カテゴリー：<a href="/blog/category/{{$post->category->id}}">{!!$post->category->name!!}</a>-->
     <p>{{ $post->content }}</p>
     <!--<p>{!! link_to("/blog/{$post->id}", '続きを読む', array('class' => 'btn btn-primary')) !!}</p>-->
     <a href="/blog/{{$post->id}}" class="btn btn-primary btn-sm">
    続きを読む
  　</a>

     <p>コメント数：{{ $post->comment_count }}</p>
     <hr />
     @endforeach

 </div>

 @stop
