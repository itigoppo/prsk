# ヒストリファイルを指定
HISTFILE=/var/log/httpd/.zsh_history

# ヒストリに保存するコマンド数
HISTSIZE=10000

# ヒストリファイルに保存するコマンド数
SAVEHIST=10000

# 重複するコマンド行は古い方を削除
setopt hist_ignore_all_dups

# 直前と同じコマンドラインはヒストリに追加しない
setopt hist_ignore_dups

# コマンド履歴ファイルを共有する
setopt share_history

# 履歴を追加 (毎回 .zsh_history を作るのではなく)
setopt append_history

# 履歴をインクリメンタルに追加
setopt inc_append_history

# historyコマンドは履歴に登録しない
setopt hist_no_store

# 余分な空白は詰めて記録
setopt hist_reduce_blanks

# 補完のスタイル
zstyle ':completion:*:default' menu select
