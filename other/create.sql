-- テーブル作成用

create table users (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	name TEXT NOT NULL,
	password TEXT NOT NULL
);

create table text (
	name TEXT NOT NULL,
	comment TEXT NOT NULL
);
