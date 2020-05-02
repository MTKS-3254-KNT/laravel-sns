<?php
// PHPの記述宣言

namespace App\Http\Controllers;
// ネームスペース（在住地）

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
// クラスメソッドの使用宣言

class ArticleController extends Controller
// 他のコントローラクラスを継承
{

    public function __construct()
    // アクセス装飾子付き関数定義
    // publicはどこからでもアクセス可能な修飾子、何も付けない場合はpublicを指定したものと同じになる
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    // アクセス装飾子付き関数定義
    {
    $articles = Article::all()->sortByDesc('created_at');
    // create時間基準に全ての記事を取得し、変数に代入
    
    return view('articles.index', ['articles' => $articles]);
    // Viewの表示をするための返り値
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }
    
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        // 記事モデルとLikeモデルのアソシエーション、detachでユーザーidが同じテーブルを削除
        $article->likes()->attach($request->user()->id);
        // 記事モデルとLikeモデルのアソシエーション、attachで新規作成しユーザーidをテーブルに記録

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        // 記事モデルとLikeモデルのアソシエーション、detachでユーザーidが同じテーブルを削除

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }



}