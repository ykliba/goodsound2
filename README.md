# goodsounds


## 名盤レビュー投稿アプリ
![top画像](https://user-images.githubusercontent.com/62545741/98650144-d5cf1500-237b-11eb-8648-111533b76f47.png)
[goodsoundsはこちらから](http://18.183.101.101/)
- ログインEメールアドレス f.73.kawahara.yuki@gmail.com
- ログインパスワード kawahara1

## 機能
### 未ログイン時
- レビューの閲覧
- 投稿をアーティスト名で検索
- ページネーション機能

### ログイン時
- 投稿者ページ閲覧
- レビュー投稿(タイトル、アーティスト名、説明、画像、YOUTUBE)
- レビューに対するコメント機能
- 投稿をアーティスト名で検索
- マイページ機能
- 投稿済レビューの編集機能
- 投稿済レビューの削除機能
- ページネーション機能
- いいね機能

## 使用技術

- Laravel, PHP, HTML, Sass, Vue.js, MySQL, Apache, GitHub
- AWS EC2 Amazon Linux2にデプロイ
- 画像ファイルはS3にアップロード

## 制作背景
知人にDJや音楽関係者が多く、まずは身近な人たちに使ってもらおうと思い名盤レビューアプリを作りました。SNSでも同じことはできますが音楽の情報だけのアプリが作りたかった。
以前、Ruby on Railsでもレビュー投稿アプリを作りましたが、画像と文章の投稿のみだったので今回はYOUTUBEの投稿といいね機能を追加実装しました。

## 課題
- Vue.jsでSPA化 
- レスポンシブ設定

## DB

### usersテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|  |
|email|string|  |
|password|string|  |
#### Relation
- has_many :reviews
- has_many :comments

### reviewsテーブル
|Column|Type|Options|
|------|----|-------|
|title|string|  |
|artist|string|  |
|desc|text|  |
|image|text|  |
|link|text|nullable|
|user_id|foreignId|  |
#### Relation
- has_many :comments
- belongs_to :user
- belongs_to_many :users

### commentsテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|foreignId|  |
|review_id|foreignId|  |
|message|text|  |
#### Relation
- belongs_to :user
- belongs_to :review

### review_userテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|foreignId|  |
|review_id|foreignId|  |

