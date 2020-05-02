<?php

Auth::routes();
// 👆ログイン・新規登録で必要なルーティングが生成

Route::get('/', 'ArticleController@index')->name('articles.index');
// 👆Rubyなら「get '/', to: 'Article#index'」ルーティングに名前を設定

Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
// 👆Rubyなら「resources :Articles, except:[:index ,:show 」

Route::resource('/articles', 'ArticleController')->only(['show']);
// 👆Rubyなら「resources :Articles, only: :show 」

Route::prefix('articles')->name('articles.')->group(function () {
  Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
  Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});
// 👆いいねの付与と解除を状況に合わせて処理するためのグループルーティング