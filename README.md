blog
====

Собственно все совсем  просто, модель, репозиторий, контроллер и вьюхи.

Командой
```php bin/console doctrine:schema:update --force```
создаем структуру бд 

Командой
```php bin/console faker:populate```
генерируем 50 постов

Могу развернуть код у себя на ВДС.

По тестам... тестировать особо нечего. Написал пару тестов на контроллер и один для модели.
Единственное к модели постов прикрутил Carbon для работы с датой/временем.

