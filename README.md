# skilup-php

Задание для skillup<br>
Небольшой роутинг, основанный на атрибутах

---

Использование:
1. Создать класс, наследник абстрактного Test/Routing/Controller

`class CopyController extends Controller
{}`

2. Зарегистрировать контроллер в index.php<br>
`$router->addControllers([\Test\Routes\MainController::class, \Test\Routes\CopyController::class]);`<br>
3. Добавить в него публичные методы
```
class CopyController extends Controller
{
   public function getCopy(): void {
      echo 'Какой-то метод' . PHP_EOL;
   }
}
```

4. Добавить методам аттрибут Route с параметром path
```
class CopyController extends Controller
{
   #[Route(path: '/copy')]
   public function getCopy(): void {
      echo 'Какой-то метод' . PHP_EOL;
   }
}
```
5. Проверить работу роутинга

---

Инструкция по запуску демо:
1. Собрать autoload в композере

`composer install`

2. Запустить docker-compose up

`docker-compose up`

3. проверить работу роута на http://localhost

---

Как можно было улучшить:
1. Добавить поддержку http методов
2. Добавить поддержку паттернов в маршруте
