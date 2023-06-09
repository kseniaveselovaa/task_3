### Написать серверный скрипт для записи и просмотра данных, введенных пользователем на странице "Запись на аттестацию" ([задание 1](https://github.com/kseniaveselovaa/task_1)).

_Требования к заданию:_

1. Страница с записью доступна только авторизованным пользователям.

2. После заполнения формы на стороне клиента формируется сообщение:
```text
   Уважаемый [имя]!
   Ждем вас на экзамен по [название дисциплины] в [выбранное время].
   Экзамен пройдет в форме [выбранная форма].
   [Если в поле введен комментарий, то добавить текст:
   спасибо за комментарий: [текст комментария]].
```

_Кнопка: подтвердить запись_

3. После нажатия на кнопку "подтвердить запись" данные из форму отправляются на сервер и сохраняются в базе данных в таблице с полями:
```text
id | user_id | text | comment
```

Поле text содержит текст, полученный от клиента. Комментарий сохраняется отдельно в поле comment.

4. Добавить на страницу с формой кнопку "показать список", после нажатия на которую на странице отображается список всех записавшихся участников (скрытие и отображение списка реализовано на _JavaScript_).