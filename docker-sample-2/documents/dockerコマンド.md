

## ボリューム削除
``` 
docker volume ls

docker volume rm $(docker volume ls -qf dangling=true)
docker volume ls


```

## DB初期化

``` 

docker-compose down --volumes --rmi all
docker-compose up -d --build
docker-compose exec app php artisan migrate
```

## appコンテナに入る
``` 
docker-compose exec app ash
```