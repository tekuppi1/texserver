# データベースのセットアップ
* http://localhost/phpmyadmin へ移動
* 「texdata」の名前でデータベースを作成する。
* 「texdata」内でtexserver/bin/setup_database/1_texdata.sqlをインポート
* 「texdata」内でtexserver/bin/setup_database/2_adddata.sqlをインポート


# データベースの更新（create tableが更新された場合）
* 「texdata」を一度削除して作り直す。
* 「texdata」内でtexserver/bin/setup_database/1_texdata.sqlをインポート
* 「texdata」内でtexserver/bin/setup_database/2_adddata.sqlをインポート

# 注意！
データベースのテーブルをいじる場合は、_texdata.sqlファイルを編集してインポートするようにしてください。
