@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article) <!-- 繰り返し構文 -->
      @include('articles.card')
    @endforeach
  </div>
@endsection

<!-- メモ -->
<!-- クラス名はMDBootstrapで用意されている属性値を使っている -->