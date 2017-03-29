DROP TABLE IF EXISTS d_ah_news, d_ah_news_categories;

CREATE TABLE `d_ah_news` (
  ID             INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CATEGORY_ID    INT,
  DATE_CREATE    DATETIME,
  CREATED_BY     INT,
  MODIFIED_BY    INT,
  TITLE          VARCHAR(255),
  TEXT           LONGTEXT,
  TEXT_TEXT_TYPE VARCHAR(255),
  SOURCE         VARCHAR(255),
  IMAGE          INT
);

CREATE TABLE d_ah_news_categories (
  ID          INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  PARENT_ID   INT,
  DATE_CREATE DATETIME,
  CREATED_BY  INT,
  MODIFIED_BY INT,
  TITLE       VARCHAR(255)
);

INSERT INTO d_ah_news_categories (PARENT_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE) VALUES (NULL, 1, 1, CURRENT_TIMESTAMP, 'Спорт');
INSERT INTO d_ah_news_categories (PARENT_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE) VALUES (1, 1, 1, CURRENT_TIMESTAMP, 'Футбол');
INSERT INTO d_ah_news_categories (PARENT_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE) VALUES (NULL, 1, 1, CURRENT_TIMESTAMP, 'Культура');

INSERT INTO d_ah_news (CATEGORY_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE, TEXT) VALUES (2, 1, 1, CURRENT_TIMESTAMP, 'Бразилия стала первой сборной, обеспечившей себе место на ЧМ-2018‍', 'Футбольная сборная Бразилии одержала победу над командой Парагвая в домашнем матче 14-го тура отборочного турнира Чемпионата мира 2018 года. Таким образом, бразильские футболисты первыми обеспечили себе место на предстоящем мундиале, который пройдет в России, передает корреспондент Накануне.RU.');
INSERT INTO d_ah_news (CATEGORY_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE, TEXT) VALUES (2, 1, 1, CURRENT_TIMESTAMP, 'Сборные России и Бельгии сыграли вничью в товарищеском матче', 'Сборные России и Бельгии по футболу сыграли вничью в товарищеском матче. Встреча на сочинском стадионе "Фишт" закончилась со счетом 3:3. Счет в матче открыли россияне, уже на третьей минуте отличился защитник Виктор Васин.');
INSERT INTO d_ah_news (CATEGORY_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE, TEXT, SOURCE) VALUES (3, 1, 1, CURRENT_TIMESTAMP, 'Тимур Бекмамбетов представил картину «Время первых» в Казани', 'Казань, 29 марта - Тимур Бекмамбетов, продюсер картины «Время первых», рассказал о своем новом фильме во время визита в Казань. Картина рассказывает о космической гонке 60-х. В разгар холодной войны, две державы СССР и США в погоне за лидерством – кто первый выйдет в открытый космос.', 'https://newinform.com/49338-timur-bekmambetov-predstavil-kartinu-vremya-pervyh-v-kazani');
INSERT INTO d_ah_news (CATEGORY_ID, CREATED_BY, MODIFIED_BY, DATE_CREATE, TITLE, TEXT, SOURCE) VALUES (3, 1, 1, CURRENT_TIMESTAMP, 'Снятый на Вологодчине фильм «Монах и бес» получил четыре премии «Ника»', 'Фильм «Монах и бес» режиссера Николая Досталя, съемки которого в 2015 году частично проходили на Вологодчине, получил четыре национальных кинематографических премии «Ника». Картина стала лидером по количеству врученных статуэток, сообщает пресс-служба администрации Вологды.', 'http://www.cpv.ru/modules/news/article.php?storyid=76134');