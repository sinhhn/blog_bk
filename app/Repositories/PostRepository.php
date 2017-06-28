<?php
/**
 * Created by PhpStorm.
 * User: hoangngocsinh
 * Date: 2017/06/15
 * Time: 16:55
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Post;

class PostRepository
{

    public static function getPostById($id)
    {
        return DB::table('posts')->where('id', $id)->first();
    }

    public static function createPost($title, $body)
    {
        $post = new Post();
        $post->title = $title;
        $post->body = $body;
        return $post;
    }
}