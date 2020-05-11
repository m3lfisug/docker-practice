## 導入

```
docker-compose exec app ash
docker-compose exec app composer create-project --prefer-dist "laravel/laravel=6.0.*" .
composer create-project --prefer-dist "laravel/laravel=6.0.*" ./work
```
※laravel6.0を使うには、redisとnodeが必要

```
php artisan key:generate
php artisan migrate
```

## laravelキャッシュクリア


```
php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan optimize:clear

```

## 認証
``` 
composer require laravel/ui
php artisan ui bootstrap --auth


docker-compose exec node npm install
docker-compose exec node npm run dev

```

データベース
```
// DBを全削除して作り直す
php artisan migrate:refresh
// seederのデータをDBに格納
php artisan db:seed

```