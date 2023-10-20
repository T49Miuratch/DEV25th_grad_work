-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 22 日 10:22
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `manga_an_table2`
--

CREATE TABLE `manga_an_table2` (
  `id` int(12) NOT NULL,
  `dialogue` varchar(256) NOT NULL COMMENT '熱いセリフ',
  `mangatitle` varchar(128) NOT NULL COMMENT 'マンガタイトル',
  `img` mediumblob DEFAULT NULL,
  `comment` text NOT NULL COMMENT '熱いコメント',
  `date` date NOT NULL COMMENT '日付',
  `source` varchar(128) NOT NULL COMMENT '出典や巻数など',
  `author` varchar(128) NOT NULL COMMENT '作者・著者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='PHP03_CRUD_02';

--
-- テーブルのデータのダンプ `manga_an_table2`
--

INSERT INTO `manga_an_table2` (`id`, `dialogue`, `mangatitle`, `img`, `comment`, `date`, `source`, `author`) VALUES
(1, '戦は「兵力」よりも「勝機」だよシンイチ', '寄生獣', '', 'ミギーのセリフ。名シーンです！', '2023-07-07', '10巻', '岩明均'),
(5, 'クリリンのことかーっ', 'ドラゴンボール', '', '泣きました！', '2023-07-07', '巻数不明', '鳥山明'),
(6, 'あきらめたらそこで試合終了ですよ…？', 'スラムダンク', '', '安西先生ーー！', '2023-07-07', '不明', '井上雄彦'),
(7, 'ぼくだけの力で、きみに勝たないと……。ドラえもんが安心して……、帰れないんだ！', 'ドラえもん', '', 'のび太ぼろぼろ。涙ボロボロ', '2023-07-07', '不明', '藤子・F・不二雄'),
(8, '自分を信じない奴なんかに努力する価値はない！', 'NARUTO―ナルト―', '', 'はい！コード書きます！', '2023-07-07', '不明', '岸本 斉史'),
(9, '自分を救うのは…自分だけ…！', '賭博黙示録カイジ', '', 'ざわ…ざわ……', '2023-07-07', '不明', '福本伸行'),
(20, '「人間が生き物の生き死にを自由にしようなんておこがましいと思わんかね…」', 'ブラックジャック', '', 'いいです！', '2023-07-15', '1巻', '手塚治虫'),
(21, 'あいうえお', 'っっっt', '', 'さあ', '2023-07-22', 'っs', 'あああ');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `manga_an_table2`
--
ALTER TABLE `manga_an_table2`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `manga_an_table2`
--
ALTER TABLE `manga_an_table2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
