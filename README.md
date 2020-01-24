# robofinance

Задание:

Используя любой PHP-фреймворк создать приложение, которое имеет следующие возможности: любой пользователь приложения может выбрать любого другого пользователя приложения (кроме себя), чтобы сделать отложенный перевод денежных средств со своего счета на счет выбранного пользователя. При планировании такого перевода пользователь указывает сумму перевода в рублях, дату и время, когда нужно произвести перевод. Сумма перевода ограничена балансом клиента на момент планирования перевода с учетом ранее запланированных и невыполненных его исходящих переводов. Дата и время выбирается с точностью до часа с использованием календаря. Способ выбора пользователя - любой (можно просто ввод ID). Ввод данных должен валидироваться как на стороне клиента, так и на стороне сервера с выводом ошибок пользователю.

Показать на сайте список всех пользователей и информацию об их одном последнем переводе с помощью одного SQL-запроса к БД.

Реализовать сам процесс выполнения запланированных переводов. Не допустить ситуации, при которой у какого-либо пользователя окажется отрицательный баланс.

Написанный для решения задачи код не должен содержать уязвимостей. Процесс регистрации и проверки прав доступа можно не реализовывать. Для этого допустимо добавить дополнительное поле ввода для указания текущего пользователя. Внешний вид страниц значения не имеет.

Решение задачи должно содержать:
1. Весь текст поставленного тестового задания.
2. Четкую инструкцию по развертыванию проекта с целью проверки его
работоспособности. Приветствуется использование Docker.
3. Миграции и сиды для наполнения БД демонстрационными данными.

Решение можно прислать ссылкой на хранилище исходного кода (GitHub, Bitbucket и др.), либо в виде архива.

# Развертывание
1) в консоли создать папку и зайти в нее
2) выполнить команду: git clone git@github.com:sjacobi/robofinance.git
3) выполнить команду: cd bash/
4) выполнить команду: ./firstStart

проект должен запуститься

1) добавить задачу в cron: crontab -e
* * * * * /usr/local/bin/docker exec test-php-container php /var/www/html/artisan schedule:run >> ~/cron2.log 2>&1

готово
