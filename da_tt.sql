-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2025 lúc 03:52 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da_tt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `image`, `category_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Combo Sách Tâm Lý Học Nhân Cách + Tâm Lý Học Hành Vi', 'Robyn Conley Downs, Thomas Erikson', '“Tâm lý học hành vi” giống như một liệu pháp tâm lý đối với tất cả chúng ta, khi phải đối mặt với cuộc sống bộn bề, hàng tá công việc phải giải quyết và những nỗi lo lắng, bận tâm không bao giờ chấm dứt. Cuốn sách đã chỉ ra những hành động, những suy nghĩ tiêu cực khiến con người luôn cảm thấy áp lực, nặng nề, để từ đó đưa ra các cách tư duy, phương pháp cụ thể để chúng ta có được sức khỏe, hạnh phúc và trạng thái cân bằng dài lâu trong cuộc sống.', 200000.00, 'books/xY0vqiAOUA9zxL4Bz81Cq4l0GASKThT8qygL7sXj.jpg', 1, 2, '2025-03-22 08:48:13', '2025-03-25 19:12:45'),
(2, 'Bộ Giáo Trình Chuẩn HSK - Bài học và Bài Tập: HSK 1, HSK 2, HSK 3,...', 'Khương Lệ Bình, Vương Phương, Vương Phong, Lưu Lệ Bình', 'Giáo Trình Chuẩn HSK 1\r\n\r\nĐược chia thành 6 cấp độ với tổng cộng 18 cuốn, Giáo trình chuẩn HSK có những đặc điểm nổi bật sau:\r\n\r\n• Kết hợp thi cử và giảng dạy: Được biên soạn phù hợp với nội dung, hình thức cũng như các cấp độ của đề thi HSK thật, bộ sách này có thể được sử dụng đồng thời cho cả hai mục đích là giảng dạy tiếng Trung Quốc và luyện thi HSK. • Bố cục chặt chẽ và khoa học: Các điểm ngữ pháp được giải thích cặn kẽ, phần ngữ âm và chữ Hán được trình bày từ đơn giản đến phức tạp theo từng cấp độ.', 323000.00, 'books/7l435N0LdCrwUTlKWddQHWZzluJdD5nmrAkdyWuo.jpg', 2, 2, '2025-03-22 09:32:18', '2025-03-25 19:24:41'),
(3, 'Bộ Giáo Trình Chuẩn HSK - Bài học và Bài Tập: HSK 1, HSK 2, HSK 3,...', 'Khương Lệ Bình', 'Được chia thành 6 cấp độ với tổng cộng 18 cuốn, Giáo trình chuẩn HSK có những đặc điểm nổi bật sau:\r\n\r\nKết hợp thi cử và giảng dạy: Được biên soạn phù hợp với nội dung, hình thức cũng như các cấp độ của đề thi HSK thật, bộ sách này có thể được sử dụng đồng thời cho cả hai mục đích là giảng dạy tiếng Trung Quốc và luyện thi HSK.\r\n\r\nBố cục chặt chẽ và khoa học: Các điểm ngữ pháp được giải thích cặn kẽ, phần ngữ âm và chữ Hán được trình bày từ đơn giản đến phức tạp theo từng cấp độ.', 212000.00, 'books/096p4JmzNrfXvPLI9xwjOBgOrRFqoBuWePtLZBz2.jpg', 2, 6, '2025-03-25 02:40:51', '2025-03-25 19:25:52'),
(4, 'Tài Liệu Luyện Thi HSK (Phiên Bản Mới)', 'Nghê Minh Lượng', 'Bộ sách Tài liệu luyện thi HSK (phiên bản mới) là công cụ thiết thực và hữu ích giúp bạn đạt được mục tiêu này. Điểm nổi bật của bộ sách là cách trình bày độc đáo, cho phép bạn có thể kiểm tra kiến thức thực tế của mình kết hợp với rèn luyện các kỹ năng nghe, nói, đọc và viết, qua đó từng bước nâng cao trình độ tiếng Trung, tự tin bước vào kỳ thi. Ngoài ra, các đề thi và bài tập trong bộ sách đều có đáp án kèm phần phân tích ngắn gọn để bạn nắm vững cách chọn câu trả lời đúng.', 210000.00, 'books/wf55MUnDDKRSxpMufp1R0OUfQihheuS7QqQ22a6y.jpg', 2, 4, '2025-03-25 02:41:14', '2025-03-25 19:27:06'),
(5, 'Easy Toeic (Kèm 1CD)', 'Young Sook Sohn, Brian JStuart', 'Easy Toeic (Kèm 1CD)\r\nNhà xuất bản:NXB Tổng hợp TP.HCMTác giả:Young Sook Sohn, Brian JStuart\r\nHình thức bìa:Bìa Mềm\r\n\r\n126.280 đ\r\n\r\n164.000 đ -23%\r\n\r\nThông tin vận chuyển\r\nDự kiến giao Thứ năm - 27/03\r\nƯu đãi liên quan\r\nXem thêm\r\n\r\nMã giảm 10k - toàn sàn\r\n\r\nMã giảm 25k - toàn sàn\r\n\r\nHome credit: giảm 50.000đ cho đơn hàng từ 150.000đ\r\n\r\nZalopay: giảm 20k cho đh từ 300k\r\nSố lượng:\r\n1\r\nThông tin chi tiết\r\nMã hàng	\r\n9786048557461\r\nNhà Cung Cấp	\r\nCty Nhân Trí Việt\r\nTác giả	\r\nYoung Sook Sohn, Brian JStuart\r\nNXB	\r\nNXB Tổng hợp TP.HCM\r\nNăm XB	\r\n02-2012\r\nTrọng lượng (gr)	\r\n550\r\nKích Thước Bao Bì	\r\n26 x 18.5\r\nSố trang	\r\n220\r\nHình thức	\r\nBìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Sách học ngoại ngữ bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nChính sách khuyến mãi trên Fahasa.com không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc\r\nMô tả sản phẩm\r\nYou have possibly known that TOEIC is short for test oF English for International Communication. It is an English language test taken by non-native speakers who want to use English in their international workplace. It also allows employers to make hiring decisions, promotions, or transfers depending on job seekers\' qualifications and English language proficiency.\r\nMời các bạn đón đọc!', 250000.00, 'books/qyody03WVWIRjKOYCHhH1vHs7JMUyuU8PyyBM0yQ.jpg', 2, 7, '2025-03-25 02:41:45', '2025-03-25 19:28:10'),
(6, 'Tomato Toeic Basic Listening', 'Jon A Christopherson, John Boswell, Henry John Amen IV', 'Tomato Toeic Basic Listening \r\n\r\nGiáo trình được chia làm nhiều phần (Part) nhằm giúp những thí sinh đang luyện thi TOEIC học tiếng Anh hiệu quả hơn.\r\n\r\nCách phát âm cơ bản trong TOEIC Listening\r\n\r\nMuốn hiểu lời người khác nói thì bạn phải phát âm đúng. Trong bài thi TOEIC listening, bạn sẽ gặp những âm được phát âm gần giống nhau và dễ gây nhầm lẫn cho người nghe. Phần đầu tiên của giáo trình sẽ giúp bạn nắm vững các phát âm những âm này.', 25000.00, 'books/dwlkGpD39wwdTq56f50baaVDPQtDDvUEwf6I4oZU.jpg', 2, 4, '2025-03-25 02:41:46', '2025-03-25 19:29:36'),
(7, 'Combo Sách Trò Chơi Tâm Lý + Lý Thuyết Trò Chơi', 'Eric Berne, Trần Phách Hàm', '“Trò chơi tâm lý” là một cuốn sách kinh điển về hành vi của con người, giải thích những trò chơi tâm lý hoang dã và thú vị mà bạn và mọi người xung quanh bạn chơi để thao túng lẫn nhau đồng thời cũng đưa ra các cách chế ngự bản ngã của mình để bạn có thể ngừng chơi với những mối quan hệ độc hại và tận hưởng những mối quan hệ lành mạnh hơn.', 340000.00, 'books/ZzWkT2YfSYjt1b58TaEg21aQod2KyN6kOxkf4N13.png', 1, 6, '2025-03-25 02:42:44', '2025-03-25 19:17:21'),
(8, 'Tâm Lý Học Nhận Thức', 'Patrick Edblad', 'Tâm Lý Học Nhận Thức\r\n\r\nBạn căng thẳng trước những quyết định lớn. Bạn lo lắng khi phải đưa ra lựa chọn. Bạn sợ hãi phải quyết định sau khi cân nhắc lợi ích và rủi ro… Dường như luôn có những rào cản tâm lý vô hình kìm kẹp chúng ta trước những quyết định hay lựa chọn.\r\n\r\nChúng ta cũng mắc những sai lầm về tư duy cố hữu trong cách nhìn nhận, xử lí và hiểu thông tin xung quanh mình. Những điều này có thể trở thành vấn đề dẫn tới sự phá hủy cảm giác, cách đánh giá không chính xác và các quyết định không hợp lí.\r\n\r\nNguyên nhân của tất cả những vấn đề được kể trên là vì thiếu kỹ năng ra quyết định. Chúng ta thiếu nhận thức về sự tác động của tâm trí và cảm xúc đến khả năng phân tích, tư duy logic và ra quyết định sáng suốt của chúng ta. May mắn là bạn có thể khiến não bộ rèn luyện khả năng tư duy theo phương thức mới hiệu quả hơn, nhận thức các yếu tố tâm lý tác động đến lựa chọn của chúng ta hay những sai lầm trong tư duy thường có. Và trong “Tâm lý học nhận thức”, tác giả sẽ chỉ ra cho bạn thấy phương thức thực hiện một cách chính xác. Kết nối tâm trí, kiểm soát cảm xúc và nỗ lực phát triển bản thân, qua từng ngày, bạn sẽ cải thiện lối tư duy, đưa ra những quyết định đúng đắn hơn, thông minh hơn và từng chút cân bằng cuộc sống.', 100000.00, 'books/QIOqH9CfzrEwEzX0dGH07L7yUclYjU0JuaMb7fls.jpg', 2, 4, '2025-03-25 03:42:32', '2025-03-25 19:19:17'),
(9, 'Lớp Học Tâm Lý Cho Người Hướng Nội', 'Jaehoon Choi', '“Lớp học tâm lý cho người hướng nội” giải thích một cách thú vị nhiều lý thuyết tâm lý khác nhau, cung cấp các mẹo hữu ích có thể dễ dàng áp dụng vào cuộc sống, khai thác sâu những bài toán muôn thuở vẫn đã và đang làm khó dễ người hướng nội, qua đó giúp họ thích ứng và hòa nhập với phần đông một cách nhịp nhàng hơn.', 82999.00, 'books/xPLXnHvX5LCbe33PDU0UaLMTJ7ObQrJU7MbNl16W.jpg', 1, 9, '2025-03-25 03:42:59', '2025-03-25 19:21:02'),
(10, 'Làm Chủ Tâm Trí', 'Michael Nicholas', 'Cuốn sách “Làm chủ tâm trí” đã chỉ ra rằng cảm xúc, trạng thái tinh thần, các quyết định có tầm quan trọng đáng kể trong hầu hết mọi lĩnh vực của cuộc sống. Về mặt chuyên môn, chúng được cho là một thứ tạo ra sự khác biệt đối với mức độ thành công mà chúng ta đạt được, bởi vì chúng quyết định cách mà chúng ta áp dụng những kỹ năng của mình. Kỹ năng ra quyết định cũng chứng minh quy mô và thể loại vấn đề chúng ta có thể giải quyết, do đó có liên quan chặt chẽ tới việc chúng ta có thể tiến bao xa và phát triển đến mức nào.', 103000.00, 'books/VLZ62X2s030XvvuxrvbOQO4fE5UNU5TLdWCuQJ3b.jpg', 1, 10, '2025-03-25 09:50:02', '2025-03-25 19:22:21'),
(11, 'Doraemon - Truyện Dài - Tập 1 - Chú Khủng Long Của Nobita (Tái Bản 2023)', 'Fujiko F Fujio', 'Trong tác phẩm này, 5 người nhóm bạn Doraemon đã ngược dòng thời gian, trở về thế giới khủng long Kỉ Bạch Á. Tất cả đã sát cánh bên nhau trải qua bao nhiêu sóng gió hiểm nguy để bảo vệ chú khủng long mới nở Pisuke.', 19900.00, 'books/LFZCMguy0lQBHKSsU70Hw13X027SuNwUkya35DQ9.jpg', 4, 2, '2025-03-25 19:31:53', '2025-03-25 19:31:53'),
(12, 'Doraemon - Tranh Truyện Màu - Nobita Và Cuộc Phiêu Lưu Ở Thành Phố Dây Cót - Tập 1 (Tái Bản 2023)', 'Fujiko F Fujio', 'Là tác phẩm thứ 18 trong loạt phim hoạt hình nổi tiếng \"Doraemon\" của tác giả Fujiko.F.Fujio (được công chiếu vào mùa xuân năm 1997). Nhóm bạn Doraemon đã tạo ra thành phố của những thú nhồi bông biết cử động ở một tiểu hành tinh xanh tươi. Thành phố phát triển rất nhanh, nhưng hình như có ẩn chứa một bí mật lạ lùng. Phải chăng kẻ xấu đã xâm nhập vào thành phố...!?', 20000.00, 'books/zoULckbZY1cYOcAvwiWJIjbcME1A1ZslVKRmDdIU.jpg', 4, 1, '2025-03-25 19:33:28', '2025-03-25 19:33:28'),
(13, 'Doraemon - Truyện Dài - Tập 8 - Nobita Và Hiệp Sĩ Rồng (Tái Bản 2023)', 'Fujiko F Fujio', 'Đây là câu chuyện về cuộc phiêu lưu thần kì của nhóm bạn Nobita tới thế giới bí ẩn trong lòng đất.\r\n\r\nNơi họ tới chính là vương quốc của khủng long do những người lòng đất thống trị… Điều gì đang đợi Nobita và các ban?... Chúng ta hãy cùng hồi hộp theo dõi nhé!', 25000.00, 'books/ZynojZFfhvRknX3ju6f6UfecqLGctkhpvZFGN491.jpg', 4, 1, '2025-03-25 19:34:59', '2025-03-25 19:34:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, '2025-03-25 09:36:23', '2025-03-25 09:36:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `book_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2025-03-25 09:36:23', '2025-03-25 10:01:18'),
(3, 1, 10, 2, '2025-03-25 10:11:08', '2025-03-25 10:35:39'),
(4, 1, 7, 1, '2025-03-25 10:20:23', '2025-03-25 10:20:23'),
(5, 1, 1, 1, '2025-03-25 10:24:49', '2025-03-25 10:24:49'),
(6, 1, 6, 2, '2025-03-25 10:24:54', '2025-03-25 10:25:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sách tâm lý', 'categories/gpsth0VGXqMxTrFBnhPJoAUff92UR8BMNMahVu4W.jpg', '2025-03-22 08:35:14', '2025-03-25 19:08:28'),
(2, 'Sách giáo dục', 'categories/0KkUIAH10ANlMo6dL5qJz4g3EoZZ0TsAhn3206ef.png', '2025-03-22 08:45:23', '2025-03-25 19:09:57'),
(4, 'Sách thiếu nhi', 'categories/vb9G2yTz1dinyQTu6gm8tMFVf9FAMFTnZloWR3xu.png', '2025-03-22 08:45:53', '2025-03-25 19:10:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_03_18_163230_create_users_table', 1),
(4, '2025_03_18_163900_create_categories_table', 1),
(5, '2025_03_18_163901_create_books_table', 1),
(6, '2025_03_18_164115_create_carts_table', 1),
(7, '2025_03_18_164204_create_cart_items_table', 1),
(8, '2025_03_18_164243_create_orders_table', 1),
(9, '2025_03_18_164331_create_order_items_table', 1),
(10, '2025_03_18_164721_create_payments_table', 1),
(11, '2025_03_18_164757_create_reviews_table', 1),
(12, '2025_03_18_164815_create_promotions_table', 1),
(13, '2025_03_18_164833_create_invoices_table', 1),
(14, '2025_03_18_164854_create_invoice_items_table', 1),
(15, '2025_03_22_150020_create_sessions_table', 1),
(16, '2025_03_25_185600_update_orders_add_customer_info', 2),
(17, '2025_03_25_190603_update_order_items_clone_book_info', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'đang chờ xử lý',
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 9, 'hhhhhhhhhh', 'q@gmail.com', '877886877', 'Hn', 'Chờ xác nhận', 102899.00, '2025-03-25 19:48:43', '2025-03-25 19:48:43'),
(6, 9, 'hhhhhhhhhh', 'q@gmail.com', '877886877', 'Hn', 'Đang giao hàng', 323000.00, '2025-03-25 19:48:56', '2025-03-25 19:49:10'),
(7, 10, 'kkkkk,ppppppppp', 'g@gmail.com', '889898899', 'Ha Noi', 'Chờ xác nhận', 590000.00, '2025-03-25 19:51:55', '2025-03-25 19:51:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `book_title`, `book_author`, `book_image`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(8, 5, 9, 'Lớp Học Tâm Lý Cho Người Hướng Nội', 'Jaehoon Choi', 'books/xPLXnHvX5LCbe33PDU0UaLMTJ7ObQrJU7MbNl16W.jpg', 1, 82999.00, '2025-03-25 19:48:43', '2025-03-25 19:48:43'),
(9, 5, 11, 'Doraemon - Truyện Dài - Tập 1 - Chú Khủng Long Của Nobita (Tái Bản 2023)', 'Fujiko F Fujio', 'books/LFZCMguy0lQBHKSsU70Hw13X027SuNwUkya35DQ9.jpg', 1, 19900.00, '2025-03-25 19:48:43', '2025-03-25 19:48:43'),
(10, 6, 2, 'Bộ Giáo Trình Chuẩn HSK - Bài học và Bài Tập: HSK 1, HSK 2, HSK 3,...', 'Khương Lệ Bình, Vương Phương, Vương Phong, Lưu Lệ Bình', 'books/7l435N0LdCrwUTlKWddQHWZzluJdD5nmrAkdyWuo.jpg', 1, 323000.00, '2025-03-25 19:48:56', '2025-03-25 19:48:56'),
(11, 7, 7, 'Combo Sách Trò Chơi Tâm Lý + Lý Thuyết Trò Chơi', 'Eric Berne, Trần Phách Hàm', 'books/ZzWkT2YfSYjt1b58TaEg21aQod2KyN6kOxkf4N13.png', 1, 340000.00, '2025-03-25 19:51:55', '2025-03-25 19:51:55'),
(12, 7, 5, 'Easy Toeic (Kèm 1CD)', 'Young Sook Sohn, Brian JStuart', 'books/qyody03WVWIRjKOYCHhH1vHs7JMUyuU8PyyBM0yQ.jpg', 1, 250000.00, '2025-03-25 19:51:55', '2025-03-25 19:51:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `discount`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '72-2', 20.00, '2025-02-26', '2025-03-30', '2025-03-22 08:58:47', '2025-03-22 09:00:12'),
(2, '3-3', 2.00, '2025-03-12', '2025-04-06', '2025-03-22 09:00:54', '2025-03-22 09:00:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 'daefwfwaf', '2025-03-22 09:32:41', '2025-03-22 09:32:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jh4tueCkmvqxs38bybAj9fFvfZYJdr4l07jQoUDc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWW56QXNyMGFINjB2TzFZMmRDVEhrUmVnOXBldWxnbWY1cWlzcHh4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMvNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoidXNlciI7YToyOntzOjI6ImlkIjtpOjEwO3M6NDoibmFtZSI7czo1OiJra2trayI7fX0=', 1742957542);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'hihi hahah', 'feeder20gg@gmail.com', '$2y$12$u8lmXp6svj2cSEoE01q4huTf/UMEloTYM8zhZuAjIkLqFLqBUq0La', '1', '22wwww', 'admin', '2025-03-22 09:09:12', '2025-03-22 09:21:14'),
(2, 'kkkkkkk', 'feeder20geeeeeeeeeeeg@gmail.com', '$2y$12$ij5dMRiXDJI6C9OGgSGBNepwv1oX8E3rwCEO69iehpphIyBhTkFq6', '2131241', 'Yên Viên, Gia Lâm, Hà Nội', 'user', '2025-03-22 09:22:35', '2025-03-22 09:22:35'),
(3, 'h', 'fakemail@gmail.com', '$2y$12$y.eElPsK2ub3RsVA/ZnRqegsdKHgeL1uyfxQeYG3uQ7BoMxaRKpmG', NULL, NULL, 'user', '2025-03-25 08:26:32', '2025-03-25 08:26:32'),
(4, 'xxxxxx', 'feeder2033gg@gmail.com', '$2y$12$.Q2dXhACAosvseybaLSFcOhvgh7x2rDz8GV2OWKBJaL4h39D0SrCG', NULL, NULL, 'user', '2025-03-25 08:29:34', '2025-03-25 08:53:54'),
(5, 'txxxxxx', 'feedergg@gmail.com', '$2y$12$Ocwm6deGi9XPA8KGQeekKesEWHkVOcAPb7353xcbxGlMQdVPig/KK', '999999999', 'Yên Viên, Gia Lâm, Hà Nội', 'user', '2025-03-25 08:42:39', '2025-03-25 09:25:00'),
(6, 'pppppp', 'a@gmail.com', '$2y$12$noDMq4ukyMYqm63S8Zd6L.tMyZ.tUSI5UR08HnrmjGFjwL.0cnf0G', '83193821983', 'Hn', 'user', '2025-03-25 09:15:26', '2025-03-25 09:16:48'),
(7, 'myname', 'feeder2000gg@gmail.com', '$2y$12$8v6jddXrJ45/a.FakFbss.Qd2fQoWM4JimO.qsq.P5VwLPxeghVWq', '1432413412', 'Yên Viên, Gia Lâm, Hà Nội', 'user', '2025-03-25 11:39:35', '2025-03-25 11:39:35'),
(8, 'cccccccccccccccc', 'd@gmail.com', '$2y$12$gWU1tZ58vy92i/Cw58chBei8w85tZdej7zATRqD94YyQWwwo/fAWq', 'ư21e1e132', 'Hn', 'user', '2025-03-25 12:48:56', '2025-03-25 12:48:56'),
(9, 'hhhhhhhhhh', 'q@gmail.com', '$2y$12$nzhQIRMqrGlf3DkHEqLWxu7vTykTZkI2f6uj6Wj6j3F1d1RkEnJfS', '877886877', 'Hn', 'user', '2025-03-25 18:08:43', '2025-03-25 18:08:43'),
(10, 'kkkkk', 'g@gmail.com', '$2y$12$T19ffXBDWDGTxrtsqUBSNuJqxMDYLFFOirRX17GxgskyFfXgZZMVi', '889898899', 'Ha Noi', 'user', '2025-03-25 19:50:56', '2025-03-25 19:50:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
