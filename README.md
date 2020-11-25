# goodsounds


## 名盤レビュー投稿アプリ
![top画像](https://user-images.githubusercontent.com/62545741/98650144-d5cf1500-237b-11eb-8648-111533b76f47.png)
[goodsoundsはこちらから](http://13.113.190.125//)


## 機能
### 未ログイン時
- レビューの閲覧
- 投稿者ページ閲覧
- 投稿をアーティスト名で検索
- ページネーション機能

### ログイン時
- レビュー投稿(タイトル、アーティスト名、説明、画像、YOUTUBEリンク)
- レビューに対するコメント機能
- 投稿をアーティスト名で検索
- マイページ機能
- 投稿済レビューの編集機能
- 投稿済レビューの削除機能
- ページネーション機能
- いいね機能(Vue.jsによる実装)

## 使用技術

- Laravel 8, PHP 7.4.11, HTML, Sass, Vue.js, MySQL, GitHub
- AWS EC2にAmazon Linux2でデプロイ(EC2,S3,RDS,VPC,IAM)
- 画像ファイルはAWS S3にアップロード

## 制作背景
SNSでも同じことはできますが余計な情報が多いので音楽に特化した物を作ろうと考えました。
以前、Ruby on Railsで同じような投稿アプリを作り知人に使ってもらったところ、「音楽アプリなのに音楽が聴けない」と指摘を受けましたので今回はYOUTUBEの投稿といいね機能を追加実装しました。

## 課題
- Vue.jsでSPA化 (※現在LaravelとVue.jsでSPAアプリ開発中)
- レスポンシブ設定
- CircleCIによるCI/CD

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

