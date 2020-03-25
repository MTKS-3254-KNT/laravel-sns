@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)<!-- 繰り返し構文 -->
      <div class="card mt-3"><!-- 要素のカード化 -->
        <div class="card-body d-flex flex-row"><!-- カードの全体に間隔を設ける -->
          <i class="fas fa-user-circle fa-3x mr-1"></i><!-- アイコンの作成 -->
          <div>
            <div class="font-weight-bold"><!-- 文字を太字にする -->
              {{ $article->user->name }}
            </div>
            <div class="font-weight-lighter"><!-- フォントの色味を位置段階補足する -->
            {{ $article->created_at->format('Y/m/d H:i') }}
            </div>
          </div>
        </div>
        <div class="card-body pt-0 pb-2"><!-- カードの全体に間隔を設ける、上下の間隔は別途指定 -->
          <h3 class="h4 card-title"><!-- サイズ変更し、カードに適した間隔を設けてくれる -->
            {{ $article->title }}
          </h3>
          <div class="card-text"><!-- カードに適したフォントに調整してくれる -->
            {!! nl2br(e( $article->body ) ) !!}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

<!-- メモ -->
<!-- クラス名はMDBootstrapで用意されている属性値を使っている -->