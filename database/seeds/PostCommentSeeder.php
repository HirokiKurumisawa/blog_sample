<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Comment;
use App\Category;


class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';

	$commentdammy = 'ダミーコメントだよ。';

	for( $i = 1 ; $i <= 5 ; $i++) {
		$post = new Post;
		$post->title = "$i 番目の投稿";
		$post->content = $content;
		$post->cat_id = 1;
		$post->save();

		$maxComments = mt_rand(1, 3);
		for ($j=0; $j <= $maxComments; $j++) {
			$comment = new Comment;
			$comment->commenter = '名無し君';
			$comment->comment = $commentdammy;

			// モデル(Post.php)のCommentsメソッドを読み込み、post_idにデータを保存する
			$post->comments()->save($comment);
                        $post->increment('comment_count');
		}
	}
// カテゴリーを追加する
	$cat3 = new Category;
	$cat3->name = "衣類";
	$cat3->save();

	$cat4 = new Category;
	$cat4->name = "おもちゃ";
	$cat4->save();


    }
}