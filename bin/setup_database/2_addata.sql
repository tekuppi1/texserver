-- books
INSERT INTO `books` (`book_id`, `title`, `author`, `price`, `cat_id`, `img`, `isbn`) VALUES (null, 'タイトル0', '著者0', 0000, 0, 'a.png', 'AAAAAA');
INSERT INTO `books` (`book_id`, `title`, `author`, `price`, `cat_id`, `img`, `isbn`) VALUES (null, 'タイトル1', '著者1', 1111, 1, 'b.png', 'BBBBBB');
INSERT INTO `books` (`book_id`, `title`, `author`, `price`, `cat_id`, `img`, `isbn`) VALUES (null, 'タイトル2', '著者2', 2222, 2, 'c.png', 'CCCCCC');
INSERT INTO `books` (`book_id`, `title`, `author`, `price`, `cat_id`, `img`, `isbn`) VALUES (null, 'タイトル3', '著者3', 3333, 0, 'd.png', 'DDDDDD');
INSERT INTO `books` (`book_id`, `title`, `author`, `price`, `cat_id`, `img`, `isbn`) VALUES (null, 'タイトル4', '著者4', 4444, 1, 'e.png', 'EEEEEE');

-- reservation
INSERT INTO `reservation` (`reservation_id`, `book_id`, `fair_id`, `timestamp`) VALUES (null, 0, 0, null);
INSERT INTO `reservation` (`reservation_id`, `book_id`, `fair_id`, `timestamp`) VALUES (null, 2, 0, null);
