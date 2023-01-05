<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index (){
        // $post = new Post();
        // $posts = $post->all();


        $posts = Post::all();
        return $posts;

    }
    public function create (Request $request) {

        $new_post = [
            'title' => 'Meu Primeiro Post',
            'content' => 'Conteúdo qualquer',
            'author' => 'Paulo'
        ];

        //metodo 01
        // $post = new Post($new_post);
        // $post->save();
        // dd($post);

        //metodo 02

        $post = new Post();
        $post->title = "Meu Terceiro Post";
        $post->content = "Conteúdo qualquer";
        $post->author = "Blanca";
        $post->save();
        return $post;
    }

    public function show (Request $s) {
        $post = new Post();
        // $posts = $post->all();
        $post = $post->find(2);

        return $post;
    }

    public function update(Request $request) {
        // $post = Post::find(3);

        //mais de um post para alterar
        $posts = Post::where('id','>',0)->update([
            'author' => 'Desconhecido',
        ]);
        // $post->title = 'Meu Post atualizado';
        // $post->save();
        return $posts;
    }

    public function delete(Request $request) {
        $post = Post::find(1);
        // dd($post);

        if($post) {
            return $post->delete();
        }

        return 'Não existe post com esse id';

         //deletar tudo

    // $post = Post::where('id', '>', 0)->delete();
    // return $post;

        //soft_delete


    }


}
