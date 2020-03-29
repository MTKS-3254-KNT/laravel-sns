<div class="card mt-3"><!-- 要素のカード化 -->
  <div class="card-body d-flex flex-row"><!-- カードの全体に間隔を設ける -->
    <i class="fas fa-user-circle fa-3x mr-2"></i><!-- アイコンの作成 -->
    <div>
      <div class="font-weight-bold">{{ $article->user->name }}</div><!-- 文字を太字にする -->
      <div class="font-weight-lighter">{{ $article->created_at->format('Y/m/d H:i') }}</div><!-- フォントの色味を位置段階補足する -->
    </div>

  @if( Auth::id() === $article->user_id )
    <!-- ドロップダウン -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
            <i class="fas fa-pen mr-2"></i>記事を修正する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
              <i class="fas fa-trash-alt mr-2"></i>記事を削除する
            </a>
          </div>
        </div>
      </div>
      <!-- ドロップダウン -->
      <!-- modal -->
      <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{ $article->title }}を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
    @endif
  </div>
  <div class="card-body pt-0 pb-3"><!-- カードの全体に間隔を設ける、上下の間隔は別途指定 -->
    <h3 class="h4 card-title"><!-- サイズ変更し、カードに適した間隔を設けてくれる -->
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}"> 
        {{ $article->title }}
      </a>
    </h3>
    <div class="card-text"><!-- カードに適したフォントに調整してくれる -->
      {!! nl2br(e( $article->body )) !!}
    </div>
  </div>
  <!-- Vueコンポーネントの組み込み -->
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <article-like
        :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}"
      >
      </article-like>
    </div>
  </div>
  <!-- Vueコンポーネントの組み込み -->
</div>
