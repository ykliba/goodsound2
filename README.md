# goodsounds


## 名盤レビュー投稿アプリ
![top画像](https://user-images.githubusercontent.com/62545741/98650144-d5cf1500-237b-11eb-8648-111533b76f47.png)
[goodsoundsはこちらから](https://goodsound2.herokuapp.com/)


## 機能
### 未ログイン時
- レビューの閲覧
- 投稿者ページ閲覧
- 投稿をアーティスト名で検索
- ページネーション機能

### ログイン時
- レビュー投稿(タイトル、アーティスト名、説明、画像、YOUTUBEリンク投稿)
- レビューに対するコメント機能
- 投稿をアーティスト名で検索
- マイページ機能
- 投稿済レビューの編集機能
- 投稿済レビューの削除機能
- ページネーション機能

## 使用技術
- Laravel,PHP,HTML,Sass,MySQL,GitHub
- Herokuデプロイ
- 画像ファイルはAWS S3に保存

## 制作背景
以前Ruby on Railsで作った投稿アプリをLaravelにてバージョンアップ版を作成。
前作では音楽が聴けなかったので今回がYOUTUBEリンクも投稿できるようにしました。

## 課題
- Vue.jsを使ったいいね機能を追加実装
- コントローラーの整理

## DB

### usersテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|email|string|null: false|
|password|string|null: false|
#### Relation
- has_many :reviews
- has_many :comments

### reviewsテーブル
|Column|Type|Options|
|------|----|-------|
|title|string|null: false|
|artist|string|null: false|
|desc|text|null: false|
|image|text|null: false|
|link|text|  |
|user_id|foreignId|null: false|
#### Relation
- has_many :comments
- belongs_to :user

### commentsテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|foreignId|  |
|review_id|foreignId|  |
|message|text|null: false|
#### Relation
- belongs_to :user
- belongs_to :review
