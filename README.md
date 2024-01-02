# Городской портал / City Portal
Городской портал - это веб-сайт, который служит для общения между жителями города и городской администрацией. На этом портале люди могут оставлять заявки на решение различных проблем, которые они сталкивают в своем районе или городе в целом. Этот портал также предлагает панель администратора для управления заявками и эффективного решения проблем.
![ticket 1](/src/static/example1.png)
*Главная страница со списком всех заявок*
![ticket 2](/src/static/example2.png)
*Панель администратора*
## Основные функции городского портала:
1. Заявки на проблемы: Жители города могут создавать заявки на решение различных проблем, таких как нарушения трафика, разрушенные дороги, неисправное уличное освещение, наличие мусора и другие. Заявки могут содержать описание проблемы и фотографию.
2. Просмотр и отслеживание заявок: Жители могут просматривать существующие заявки и отслеживать статус своих заявок.
3. Панель администратора: Администраторы имеют доступ к панели, которая позволяет им просматривать, менять статус заявки или удалить её.

## Использванные технологии
- PHP 8.1
- HTML\CSS\JS
- Bootstrap
- MySQL 8

## Настройка и запуск проекта
1. Создать базы данных в MySQL и импортировать дамп [базы данных](/city-portal.sql). В базе будут два пользователя tarum(гражданин) и admin. У обоих пароль root123
2. Запуск веб-сервера apache, nginx или любой другой
