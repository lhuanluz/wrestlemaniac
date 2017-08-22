CREATE TABLE `warnings` (
  `id` serial PRIMARY KEY,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` SMALLINT NOT NULL
)

