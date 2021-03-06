# イベント共有アプリ（2022年3月から作成中)



# サービス概要

###  自分の興味のあるコミュニティーを探し、コミュニティー内で作成されたイベントに参加できるアプリです。
コロナウイルスの流行によって、交流の場が少なくなったため、自分と同じ趣味や考えを持った人々と簡単につながることが出来るプラットフォームを作成しました。

# 作った理由として
***誰かとイベントを共有することで自己管理を行いたいと考えた***　　

-大学二年の時、生活習慣が乱れ、不規則な生活を過ごしていました。自分で一日の予定を立てるのですが、予定通り過ごせないことが度々ありました。大学三年のある日、同じ悩みを持った友人と朝早起きし、ランニングをしに川に集まるようになってから、朝起きる習慣が出来ました。このことから、誰かと約束をすることにより、行動の責任感が上がり、結果的に自己管理につながると考えました。

### サービスの使い方
- 　ユーザーがグループへの招待リクエストをもらい、承認したらグループに参加
- 　グループ内のメンバーがイベントを投稿
- 　グループメンバーは参加ボタンをクリックすると、GoogoleCalendarに予定が組み込まれる
- 　プロフィール作成やユーザーのフォロー機能によって個人間でも交流できる

# 社会的背景
* コロナウイルスの流行によって、サークル活動などの交流の場が減った
* 外出自粛により、自宅での活動時間が増えた
* 人との交流が減った分、個人の趣味やスキルアップに時間を使う人が増えた

# 解決
* 同じ趣味や考えを持ったコミュニティーの人々と簡単につながることが出来るため、交流が広がる
* 自分と同じ志を持った仲間と出会い、勉強時間などを共有することによって、互いのスキルアップにつながる

# マーケット
すべての人対象

# データベースER図
![イベント共有アプリ　ER図](https://user-images.githubusercontent.com/98827504/178408326-fc6a081b-0a76-4a20-bcd3-25c5549265d2.png)

# 機能一覧
- 認証機能
   - ログイン機能
   - ログアウト機能
   - ユーザー登録機能
- グループ登録機能          
   - グループの詳細表示
   - グループ作成画面
   - 編集
   - 消去
- フォロー機能
   - ユーザー検索機能
   - ユーザー一覧のペジネーション
   - ユーザー詳細ページ
   - フォロー処理・アンフォロー処理
   - フォロワー一覧・フォローの一覧表示
- イベント投稿機能
   - イベント一覧表示
   - イベント投稿詳細画面
   - イベント作成画面
   - イベント投稿処理
   - 編集
   - 消去
- グループメンバー招待機能
   - 招待リクエスト一覧ページ
   - 招待リクエスト送信処理
   - 招待リクエスト拒否処理
   - 招待リクエスト承認処理
- イベント参加機能
   - イベント一覧に参加ボタンの追加
   - イベント参加処理・参加取り消し処理
 
- カレンダー機能
   - イベント内容をカレンダーに反映
   - イベント変更内容カレンダーに反映
   - カレンダー一覧ページ
- プロフィール
   - プロフィール登録
   - プロフィール表示
   - 編集
   - 消去
   - フォロー・フォロワー表示

## 使用技術
- **バックエンド**
  - PHP 8.0.17
  - Laravel  6.20.44
- **フロントエンド**
  - HTML/JavaScript 
- **インフラ**
  - AWS(EC2,cloud9)
  - mysql (10.2.38-MariaDB)
  
# AWSインフラ構成図

![aws インフラ設計図 (1)](https://user-images.githubusercontent.com/98827504/178430767-87645ed2-79bd-48c6-86a2-fad9bb002c78.png)

# 今後追加したい機能
- コミュニティごとのチャット機能
- イベント振り返り機能
- イベント場所をGoogleMapに追加
