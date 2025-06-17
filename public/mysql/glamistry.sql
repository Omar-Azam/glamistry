-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: glamistry
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'Aaliyan Tarique','thisisomarazam@gmail.com','03122788190','Aptech','jsdjbsdb','sds','Sindh','75800','Dominican Republic');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (4,2,35,1,'2025-06-16 11:16:41'),(5,1,60,13,'2025-06-17 21:57:45');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'earrings','2025-06-15 22:51:37'),(2,'bracelets','2025-06-15 22:52:02'),(3,'anklets','2025-06-15 22:52:34'),(4,'rings','2025-06-15 22:52:45'),(5,'necklaces','2025-06-15 22:53:09'),(6,'lipsticks','2025-06-15 22:53:48'),(8,'nail polish','2025-06-15 22:54:29'),(9,'eyeshadows','2025-06-15 22:54:43'),(10,'foundations','2025-06-15 22:54:56'),(11,'blush','2025-06-16 11:27:37');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Aaliyan','aaliyan@gmail.com','dummy text','2025-06-16 11:17:34');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,34,6,150),(2,1,1,10,790);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,1,940,'2025-06-16 16:09:46');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Dreamy Starlight Bracelet','b1.jpg','Delicate and enchanting, the Dreamy Starlight Bracelet is a celestial-inspired piece that captures the soft glow of a starry night. Featuring tiny star charms and shimmering accents along a fine gold-plated chain, it wraps your wrist in a touch of wonder and grace. Perfect for dreamers, stargazers, and lovers of quiet elegance.\r\n','/product_images/b1.jpg',79,2,'2025-06-15 22:57:00'),(2,'Golden Pearls Bracelet','b2.jpg','Timeless and elegant, the Golden Pearls Bracelet combines the soft luster of pearls with the rich glow of gold. Featuring lustrous pearl beads delicately linked with gold accents, this bracelet exudes classic charm and sophistication. Whether worn alone or layered, it adds a touch of graceful beauty to any ensemble.\r\n','/product_images/b2.jpg',64,2,'2025-06-15 22:57:00'),(3,'Gold Snake Chain Bracelet','b3.jpg','Sleek, sensual, and undeniably sophisticated — the Golden Snake Chain Bracelet is a timeless piece designed to drape gracefully around your wrist like liquid gold. Crafted with a smooth, flexible snake-link design, it captures the essence of bold minimalism and quiet luxury. The way it catches the light with every movement gives it an almost hypnotic shimmer, making it perfect for both elevated everyday looks and refined evening wear.','/product_images/b3.jpg',84,2,'2025-06-15 22:57:00'),(4,'Bangled Chain Bracelet ','b4.jpg','Boldly elegant and richly textured, the Gold Bangled Chain Bracelet blends the timeless beauty of bangles with the fluidity of chain design. Featuring interlocking gold-plated links paired with solid bangle-style curves, this piece strikes the perfect balance between structure and movement. Each element gleams with a high-polish finish, wrapping your wrist in warmth, luxury, and confident style.','/product_images/b4.jpg',77,2,'2025-06-15 22:57:00'),(5,'Sleek White Pearl Bracelet','b5.jpg','A timeless blend of elegance and modern minimalism, this sleek white pearl bracelet features lustrous, hand-picked pearls strung seamlessly along a delicate band. The smooth, radiant pearls offer a graceful shimmer, perfect for both everyday sophistication and special occasions. Understated yet luxurious, it adds a refined touch to any ensemble.','/product_images/b5.jpg',92,2,'2025-06-15 22:57:00'),(6,'Daisy Dazzle Bracelet','b6.jpg','Bright, playful, and effortlessly charming — the Daisy Dazzle Bracelet captures the essence of springtime joy. Adorned with delicate daisy motifs and shimmering accents, this bracelet adds a fresh pop of floral elegance to your wrist. Whether worn solo or layered, its the perfect accessory to dazzle with a touch of nature-inspired beauty.\r\n','/product_images/b6.jpg',105,2,'2025-06-15 22:57:00'),(7,'Curved Droplet Earrings','e1.jpg','Graceful and refined, the Gold Curved Droplet Earrings exude modern elegance with a fluid silhouette. Crafted in radiant gold, their gently curved design mimics the natural fall of a droplet, catching the light with every movement. Lightweight yet striking, they offer a sophisticated finish — perfect for elevating both day and evening looks.','product_images/e1.jpg',33,1,'2025-06-15 23:11:42'),(8,'Twisted Chunk Earrings','e2.jpg','Make a bold impression with the Twisted Chunk Earrings — a striking fusion of contemporary design and statement luxury. Featuring thick, sculpted curves that spiral with artistic precision, these earrings command attention while maintaining a sense of elegance. Their high-shine metallic finish adds depth and drama, perfect for elevating everyday wear or completing a glam evening look. ','product_images/e2.jpg',41,1,'2025-06-15 23:12:27'),(9,'Pearl Hoop Earrings','e3.jpg','A timeless twist on a classic favorite, the Pearl Hoop Earrings blend the graceful charm of pearls with the bold appeal of hoops. Each elegant curve is adorned with luminous white pearls, creating a harmonious balance of softness and strength. Whether styled for a chic daytime look or an elevated evening ensemble, these earrings add a touch of sophistication and effortless glamour to any outfit.','product_images/e3.jpg',37,1,'2025-06-15 23:13:21'),(10,'Luxe Bowdrop Earrings','e4.jpg','Sweet yet sophisticated, the Luxe Bowdrop Earrings are the perfect fusion of elegance and charm. Featuring a delicate, sculpted bow that gracefully holds a luminous central pearl, these earrings evoke a sense of vintage romance and feminine grace. With their soft shimmer and playful silhouette, they’re ideal for adding a touch of whimsy to both casual and formal looks — a dainty statement of classic beauty with a modern edge.','product_images/e4.jpg',25,1,'2025-06-16 10:37:49'),(11,'Silken Pearl Earrings','e5.jpg','Delicate and luminous, the Silken Pearl Earrings embody pure elegance with a whisper of softness. Each piece features a radiant pearl set against a sleek, silky finish that catches the light with every turn. Designed to exude understated luxury, these earrings bring a graceful glow to your look — perfect for romantic evenings, formal affairs, or everyday refinement. Effortlessly timeless, endlessly beautiful.','product_images/e5.jpg',29,1,'2025-06-16 10:38:41'),(12,'Ribbon Gleam Earrings','e6.jpg','Graceful and enchanting, the Ribbon Gleam Earrings capture the delicate beauty of a flowing ribbon kissed by light. Crafted with a gentle twist and adorned with a subtle shine, these earrings mimic the movement of silk in motion. Their refined silhouette and polished finish make them a versatile statement — adding a touch of femininity and brilliance to both casual elegance and evening glamour. A true ode to softness and shine.','product_images/e6.jpg',36,1,'2025-06-16 10:39:59'),(13,'Gold Grace Anklet','anklet1.jpg','Elegant and timeless, the Gold Grace Anklet drapes softly around the ankle like liquid gold. Designed with delicate links and a refined finish, it adds a subtle shimmer with every step. Whether worn barefoot on the beach or paired with heels for a night out, this anklet brings effortless charm and golden elegance to any look — a graceful touch of luxury from heel to toe.','product_images/anklet1.jpg',19,3,'2025-06-16 10:41:15'),(14,'Spectrum Bliss Anklet','anklet2.jpg','Vibrant, playful, and utterly captivating — the Spectrum Bliss Anklet is a celebration of color and joy. Adorned with a radiant array of multi-colored gemstones, each gem sparkles with its own unique hue, creating a rainbow of beauty around your ankle. Set on a fine chain that moves gracefully with you, this anklet adds a pop of personality and positivity to any outfit.','product_images/anklet2.jpg',14,3,'2025-06-16 10:41:48'),(15,'Charming Swirl Anklet','anklet3.jpg',' Elegant with a hint of whimsy, the Charming Swirl Anklet features graceful spiral motifs that dance along a delicate chain. Its swirling design captures movement and light, creating a mesmerizing shimmer with every step. Perfect for adding a touch of playful sophistication, this anklet brings a graceful charm to barefoot days, summer sandals, or strappy heels — a fluid blend of style and enchantment.','product_images/anklet3.jpg',17,3,'2025-06-16 10:42:19'),(16,'Mystic Sparkle Anklet','anklet4.jpg','Mysterious and mesmerizing, the Mystic Sparkle Bracelet is a harmony of deep elegance and subtle sparkle. Featuring a sleek drop-shaped charm in a rich brown hue, paired with a delicate glint of diamond-like brilliance, this piece evokes the allure of twilight and shadow. The refined contrast of earthy tones and radiant shimmer makes it perfect for those who embrace quiet luxury with a touch of mystique.','product_images/anklet4.jpg',18,3,'2025-06-16 10:42:53'),(17,' Butterfly Charm Anklet','anklet5.jpg','Delicate and full of whimsy, the Butterfly Charm Anklet captures the magic of lightness and freedom. Featuring dainty butterfly charms that flutter gently with every step, this anklet adds a playful, feminine touch to your style. its graceful movement and subtle shine bring a breezy, nature-inspired elegance to your look — like wearing a little piece of the sky.','product_images/anklet5.jpg',11,3,'2025-06-16 10:43:27'),(18,'Lunar Gleam Anklet','anklet6.jpg',' Inspired by the night sky, the LUNAR GLEAM Anklet is a celestial treasure that wraps your ankle in stardust and moonlight. Crafted in radiant gold, it features delicate star and crescent moon charms that shimmer with every step, evoking the beauty of a dreamy night. Light, elegant, and full of wonder, this anklet is perfect for those who carry a little cosmos in their soul — a timeless symbol of mystery, magic, and grace.','product_images/anklet6.jpg',19,3,'2025-06-16 10:43:58'),(19,'FlutterKiss Ring','RING1.jpg','Delicate, radiant, and full of meaning, the Flutterkiss Ring embodies the gentle beauty of a butterfly in mid-flight. With finely sculpted wings and a graceful silhouette, it symbolizes transformation, hope, and new beginnings. Accented with a soft shimmer, this ring captures the essence of lightness and elegance — a perfect touch of whimsy for those who wear their soul on their sleeve and dreams on their fingertips.','product_images/RING1.jpg',26,4,'2025-06-16 10:44:43'),(20,'Ethereal Knot Ring','RING2.jpg','A delicate statement of charm and flirtation, the Coquette Knot Ring captures the essence of feminine allure. Designed with a graceful bow motif, its smooth curves and subtle shine evoke vintage romance with a modern twist. Perfect for those who adore soft elegance and playful sophistication, this ring wraps your finger in a whisper of grace — a nod to timeless style with a coquette’s touch of mischief.','product_images/RING2.jpg',35,4,'2025-06-16 10:45:31'),(21,'Twintwine Ring','RING3.jpg','Elegant and symbolic, the Twintwine Ring features two curved, vine-like bands that flow in parallel harmony — never touching, yet forever intertwined in design. Delicately etched with graceful leaf motifs, each band evokes the image of nature’s embrace, representing growth, balance, and quiet connection. With its open center and organic form, the ring blends natural beauty with modern artistry — a perfect piece for those who love with depth and bloom with grace.','product_images/RING3.jpg',22,4,'2025-06-16 10:46:43'),(22,'Twin Radiant Ring','RING4.jpg','Shining in perfect harmony, the Twin Radiant Ring features two gently curved bands that mirror each other like twin beams of light. With a sleek open design and subtle shimmer, it symbolizes duality, connection, and inner balance. Whether worn as a statement of self-love or shared bond, this ring radiates elegance and meaning — a luminous fusion of modern style and timeless grace.','product_images/RING4.jpg',32,4,'2025-06-16 10:47:29'),(23,'Royal Emerald Ring','RING6.jpg','A true emblem of regality and timeless allure, the Royal Emerald Ring showcases a rich, deep green emerald at its heart — a gemstone long associated with power, elegance, and mystery. Framed in a refined setting that enhances its natural brilliance, this ring evokes old-world grandeur with a modern touch. Perfect for those who carry grace like a crown, it’s a statement of strength, beauty, and everlasting sophistication.','product_images/RING6.jpg',31,4,'2025-06-16 10:48:10'),(24,'Classic Diamond Ring','RING5.jpg','Timeless and eternally elegant, the Classic Diamond Ring is the very essence of refined beauty. Featuring a brilliant-cut diamond set in a sleek, graceful band, it captures the light—and the heart—with every glance. Whether worn as a symbol of love or a touch of everyday luxury, this ring radiates simplicity, sophistication, and a sparkle that never fades. ','product_images/RING5.jpg',28,4,'2025-06-16 10:48:51'),(25,'Twilight Wings Necklace','NECKLACE (1).jpg','Mystical and delicate, the Twilight Wings Necklace captures the quiet beauty of dusk in motion. With finely detailed butterfly wings that shimmer like the sky at sunset, this piece evokes transformation, serenity, and grace. Suspended on a fine chain, it’s perfect for dreamers, romantics, and those who carry light even in the softest hours. A symbol of gentle strength and ethereal charm.','product_images/NECKLACE (1).jpg',51,5,'2025-06-16 10:50:33'),(26,'Aurora Ducklings Necklace','NECKLACE (2).jpg','Whimsical and heartwarming, the Aurora Ducklings Necklace brings a playful elegance to your jewelry collection. Featuring a charming row of tiny duckling charms gliding gracefully along a delicate chain, each one is kissed with a soft golden glow, as if lit by the northern lights. Symbolizing innocence, guidance, and gentle bonds, this necklace adds a dreamy, storybook touch — perfect for those who adore sweet details with a sprinkle of magic.','product_images/NECKLACE (2).jpg',49,5,'2025-06-16 10:51:13'),(27,'Golden Heart Necklace','NECKLACE (3).jpg','Simple, radiant, and full of meaning, the Golden Heart Necklace is a timeless symbol of love and warmth. Featuring a polished heart pendant crafted in rich gold, it rests gently on a fine chain — capturing both elegance and emotion in a single piece. Whether gifted or self-worn, it’s a graceful reminder of affection, connection, and golden-hearted beauty that never fades.','product_images/NECKLACE (3).jpg',39,5,'2025-06-16 10:52:05'),(28,'Dazzle Heart Necklace','NECKLACE (4).jpg','Radiant and romantic, the Dazzle Heart Necklace is designed to captivate. At its center lies a beautifully sculpted heart, encrusted with shimmering stones that catch the light from every angle. Suspended from a delicate chain, this piece blends timeless charm with modern sparkle — perfect for expressing love, celebrating yourself, or adding a touch of dazzle to any look. A heart that doesn’t just shine — it sparkles with emotion.','product_images/NECKLACE (4).jpg',46,5,'2025-06-16 10:53:02'),(29,'Elegant Crush Necklace ','NECKLACE (5).jpg','Bold yet refined, the Elegant Crush Necklace is where sophistication meets a touch of edge. Featuring a striking design with soft curves and radiant detailing, it captures the feeling of an unforgettable first glance — graceful, glamorous, and captivating. Whether worn with a sleek dress or layered casually, this piece adds instant allure and modern charm to any look. A necklace made to turn quiet confidence into a statement','product_images/NECKLACE (5).jpg',40,5,'2025-06-16 10:53:31'),(30,'Black Pendant Necklace','NECKLACE (6).jpg','Mysterious and sleek, the Black Pendant Necklace is the essence of understated elegance. Featuring a polished dark pendant — whether onyx, obsidian, or jet-toned crystal — suspended from a refined chain, it exudes depth, power, and modern minimalism. Perfect for adding a bold accent to any outfit, this piece speaks to those who embrace quiet strength and timeless style with a dark, radiant edge.','product_images/NECKLACE (6).jpg',42,5,'2025-06-16 10:54:07'),(31,'Crimson Crush Lipstick','lipstick1.jpg','Bold, seductive, and undeniably iconic — Crimson Crush is the ultimate red for the confident soul. With a silky-smooth texture and rich, high-impact pigment, it glides on effortlessly, leaving a lasting impression with every swipe. Whether it&#039;s date night or a power move, this shade adds instant glamour and timeless allure to your look.','product_images/lipstick1.jpg',17,6,'2025-06-16 10:55:55'),(32,'Rouge Radiance Lipstick','lipstick2.jpg','Bold and luminous, Rouge Radiance is the perfect balance of classic red and high-impact shine. With a creamy texture and a radiant finish, this lipstick lights up your look with one effortless swipe. Whether you&#039;re owning the room or adding a touch of everyday glam, Rouge Radiance delivers powerful color and timeless confidence — a red that glows as fiercely as you do','product_images/lipstick2.jpg',19,6,'2025-06-16 10:56:57'),(33,'Rose Clay Lipstick','lipstick3.jpg','Softly grounded in warmth, Rose Clay is the perfect muted pink with a hint of tan — effortless, elegant, and endlessly wearable. Its creamy texture glides on smooth, delivering a satin finish that enhances your natural tone with a refined flush of color. Whether it’s a casual day out or a polished evening look, Rose Clay is that quiet luxury your lips will love — subtle, sophisticated, and beautifully balanced.','product_images/lipstick3.jpg',23,6,'2025-06-16 10:58:15'),(34,'Fatal Kiss Lipstick','lipstick4.jpg','Daring and dangerously seductive, Fatal Kiss is a deep, bold red that leaves a lasting impression. With its intense pigment and sultry matte finish, this lipstick glides on like silk and stays like a secret. It’s the kind of red that turns heads, stops hearts, and speaks volumes without a word — a kiss that’s unforgettable, undeniable, and just a little dangerous.','product_images/lipstick4.jpg',25,6,'2025-06-16 10:58:56'),(35,'Sweet Blush Lipstick','lipstick5.jpg','Delicate, dreamy, and effortlessly pretty — Sweet Blush is the perfect soft pink-peach shade for that natural, fresh-faced glow. With a creamy, lightweight formula and a satin finish, it melts onto your lips, adding a hint of warmth and playful charm. Whether it’s a casual day out or a soft glam moment, Sweet Blush gives you that “just right” flush — sweet, subtle, and always flattering.','product_images/lipstick5.jpg',22,6,'2025-06-16 11:00:40'),(36,'Sugar Coral Lipstick','lipstick6.jpg','A refreshing burst of coral kissed with soft peachy-pink undertones, Sugar Coral adds a radiant pop of color to your lips. This shade strikes the perfect balance between playful and elegant—bright enough to liven up your day, yet smooth and subtle for everyday wear. Its creamy, hydrating formula glides on effortlessly, leaving a satin finish that flatters every skin tone. Whether you&#039;re heading to brunch or a beach day, Sugar Coral is your go-to for a naturally vibrant look.','product_images/lipstick6.jpg',23,6,'2025-06-16 11:02:24'),(38,'Rose Creme Blush','blush1.jpg','Soft, dreamy, and effortlessly romantic—Rose Crème is a tender blush with a creamy rose-pink hue that melts into the skin like a second layer. Its velvety texture delivers a smooth, airbrushed finish while adding a healthy, rosy glow to the cheeks. Ideal for everyday elegance or soft glam moments, this shade flatters all complexions with its natural warmth and refined charm. With buildable color and a satin touch, Rose Crème is the perfect blush for a graceful, flushed look that lingers.','product_images/blush1.jpg',23,11,'2025-06-16 11:42:33'),(39,'Cherry Smoke Blush','blush2.jpg','Mysterious and magnetic, Cherry Smoke is a deep cherry-toned blush with a smoldering twist. This rich, wine-red hue blends effortlessly into the skin, creating a bold, flushed effect that’s both edgy and elegant. Perfect for evening looks or when you want to make a statement, its soft-matte finish adds depth and allure without harsh lines. Whether diffused for a gentle warmth or built up for drama, Cherry Smoke brings a sultry flush with a hint of attitude.','product_images/blush2.jpg',26,11,'2025-06-16 11:44:06'),(40,'Peach Whisp Blush','blush3.jpg','A delicate swirl of soft peach and airy pink, Peach Whisp delivers a naturally radiant flush with effortless elegance. This ultra-fine powder blends like silk, giving your cheeks a whisper of warmth that mimics a sun-kissed glow. Perfect for everyday wear or a gentle romantic look, it enhances your natural tone without overpowering—just a touch, and you&#039;re glowing. Lightweight, buildable, and beautifully subtle—Peach Whisp is your secret to fresh, blooming cheeks all day.','product_images/blush3.jpg',20,11,'2025-06-16 11:45:25'),(41,'Silk Petal Blush','blush4.jpg','Whisper-light and effortlessly graceful, Silk Petal is a delicate blush in a soft rose-petal hue that brings a touch of romantic elegance to your cheeks. Its silky texture glides on smoothly, leaving behind a natural, velvety finish with a hint of dewy glow. Perfect for creating a refined flush or layering for a blooming effect, this blush feels as light as air and looks as soft as a petal. With Silk Petal, your complexion stays fresh, feminine, and flawlessly radiant.','product_images/blush4.jpg',23,11,'2025-06-16 11:46:07'),(42,'Coral Mist Blush','blush5.jpg','Fresh, light, and breezy—Coral Mist is a soft coral blush kissed with a hint of peach and pink, perfect for that effortless sunkissed glow. Its airy texture blends seamlessly into the skin, delivering a radiant flush that looks like you just stepped out into golden morning light. Whether worn sheer or built up for a brighter pop, Coral Mist gives your cheeks a healthy, cheerful warmth that flatters every tone. Think of it as your daily dose of sunshine—soft, playful, and endlessly wearable.','product_images/blush5.jpg',23,11,'2025-06-16 11:54:09'),(43,'Plum Haze Blush','blush6.jpg','Plum Haze Blush is the perfect harmony of rich plum and soft violet, designed to add depth, warmth, and a dreamy flush to your complexion. Inspired by the mysterious beauty of twilight skies and blooming plum orchards, this blush brings a romantic haze to your cheeks with just the right touch of drama. Its satin-matte finish adds a sophisticated touch, giving your skin a soft-focus effect while enhancing your natural radiance. Ideal for all skin tones, this universal shade brings out your inner mystique with a hint of berry-toned elegance.','product_images/blush6.jpg',24,11,'2025-06-16 11:55:01'),(44,'Burnt Rose Nail Polish','nail1.jpg','Burnt Rose Nail Polish is where romance meets rebellion — a smoldering crimson-red infused with deep rose undertones, like petals kissed by fire. This sultry shade captures the beauty of a rose in its fiercest form, evoking both elegance and edge with every stroke.The ultra-pigmented, high-shine formula glides on smoothly, delivering full coverage in just one coat. Its long-wear finish resists chips and fades, leaving your nails wrapped in a lacquered glow that lasts.','product_images/nail1.jpg',12,8,'2025-06-17 21:17:13'),(45,'Bare Blossom Nail Polish','nail2.jpg','Bare Blossom Nail Polish is the essence of soft femininity — a barely-there pink kissed with whispers of ivory. This delicate, almost-white shade evokes the first bloom of spring, fresh linen mornings, and effortless grace. With a creamy formula and a glossy, glass-like finish, Bare Blossom coats your nails in a sheer flush of color that’s perfect for clean, polished looks or bridal beauty. It’s subtle, sophisticated, and timeless — the kind of shade that speaks softly but leaves a lasting impression.\r\n','product_images/nail2.jpg',15,8,'2025-06-17 21:18:04'),(46,'Bubblegum Cloud Nail Polish','nail3.jpg','Bubblegum Cloud Nail Polish is a playful swirl of soft pink and airy charm — like cotton candy skies and sugar-spun daydreams at your fingertips. This pastel pink hue carries the sweetness of bubblegum with a dreamy, cloudlike softness that feels both nostalgic and fresh. Its smooth, creamy texture glides on effortlessly, delivering a flawless finish with a glossy, candy-coated shine. Perfect for playful moods, soft glam, or adding a touch of whimsy to your look, Bubblegum Cloud is your ticket to sweet serenity.\r\n','product_images/nail3.jpg',11,8,'2025-06-17 21:19:16'),(47,'Red Matte Nail Polish ','nail4.jpg','Red Matte Nail Polish brings drama without the shine — a rich, fiery red dipped in pure intensity. With a bold pigment payoff and a velvety-soft matte finish, this shade commands attention with quiet confidence. No shimmer. No gloss. Just unapologetic red — raw, refined, and forever iconic. Perfect for power plays, date nights, or anytime you want your nails to speak louder than words.\r\n','product_images/nail4.jpg',16,8,'2025-06-17 21:19:56'),(48,'Blood Plum Nail Polish ','nail5.jpg','Blood Plum Nail Polish is a fierce fusion of deep berry and smoldering red, designed to embody bold elegance with an edge. This intoxicating shade captures the richness of ripe plum wrapped in the intensity of crimson — mysterious, moody, and utterly magnetic. Its velvety matte finish gives your nails a modern, high-fashion look that’s both powerful and refined. With a smooth, full-coverage formula and long-lasting wear, Blood Plum makes a statement without saying a word.\r\n','product_images/nail5.jpg',14,8,'2025-06-17 21:20:23'),(49,'Candy Bliss Nail Polish ','nail6.jpg','Candy Bliss Nail Polish is pure joy in a bottle — a soft, sugary pink that captures the carefree spirit of cotton candy dreams and bubblegum smiles. This deliciously sweet shade brings a pop of pastel fun to your fingertips, perfect for days when you want your nails to feel as light and lovely as your mood. With a smooth, creamy texture and a glossy, candy-coated finish, Candy Bliss glides on effortlessly and leaves your nails looking fresh, flirty, and full of charm.\r\n','product_images/nail6.jpg',13,8,'2025-06-17 21:20:51'),(50,'Cocoa Dust Eyeshadow Palette ','EYESHADOW1.jpg','Cocoa Dust Eyeshadow Palette is a deliciously warm collection of rich browns, soft tans, and glowing golden shimmers — inspired by the smooth swirl of cocoa powder and sunlit earth tones. From matte latte hues to deep espresso shades and glittering bronze, this palette lets you sculpt, smoke, and shine with effortless blendability. Whether you&#039;re crafting a natural daytime look or a sultry evening glam, Cocoa Dust delivers warmth, depth, and a touch of golden sparkle in every swipe.','product_images/EYESHADOW1.jpg',31,9,'2025-06-17 21:21:57'),(51,'Mauve Mocha Eyeshadow Palette ','EYESHADOW2.jpg','Mauve Mocha Eyeshadow Palette is a soft-glam symphony of warm browns, delicate mauves, deep plums, and shimmer-kissed pinks — crafted to take your look from subtle to sultry in seconds. This versatile palette features velvety mattes for effortless depth, rich plums for bold definition, and radiant glitters that light up the eyes with a single swipe. From mocha-tinted neutrals to mauve-toned romance, every shade blends like silk and wears like a dream.\r\n','product_images/EYESHADOW2.jpg',34,9,'2025-06-17 21:22:28'),(52,'Glimmer Spell Eyeshadow Palette ','EYESHADOW3.jpg','Glimmer Spell Eyeshadow Palette is pure enchantment for your eyes — a dazzling mix of 60% glitter-infused shades and rich velvety mattes in tones of black, plum, peach, and brown. Each shade is designed to shift your look from soft to spellbinding: matte nudes and peaches for subtle depth, deep plums and blacks for drama, and ultra-reflective glitters that cast a magical glow with every blink. Whether you&#039;re conjuring a smoky glam or a glitter-cut crease, Glimmer Spell gives you the power to enchant.\r\n','product_images/EYESHADOW3.jpg',36,9,'2025-06-17 21:25:59'),(53,'Cotton Mist Eyeshadow Palette ','EYESHADOW4.jpg','Cotton Mist Eyeshadow Palette is a delicate daydream of airy pinks, soft rose tones, and subtle shimmer — designed to wrap your eyes in a sheer veil of elegance and calm. With light base pinks, pastel variants, and two twinkling glitters, this palette captures the essence of morning skies and powdered petals. Each shade blends like silk, creating barely-there beauty or soft glam with a touch of glisten. Let your eyes float in the softness of Cotton Mist.','product_images/EYESHADOW4.jpg',32,9,'2025-06-17 21:26:36'),(54,'Color Carnival Eyeshadow Palette ','EYESHADOW5.jpg','Color Carnival Eyeshadow Palette is a joyful explosion of color — packed with vibrant mattes, rich pigments, and dazzling shimmer shades that turn every look into a celebration. From electric blues and fiery oranges to bold pinks, lush greens, and golden glitters, this palette lets you mix, match, and create eye-catching artistry with ease. The buttery formula blends like a dream, giving you full freedom to go bold, soft, or somewhere in between. Step into the spotlight with Color Carnival — where every shade is a party.\r\n','product_images/EYESHADOW5.jpg',29,9,'2025-06-17 21:27:13'),(55,'Soft Ember Eyeshadow Palette ','EYESHADOW6.jpg','Soft Ember Eyeshadow Palette is a delicate fusion of muted browns, blush-toned pinks, creamy whites, and a kiss of soft red — like the last glow of a sunset fading into dusk. With a perfect balance of matte warmth and subtle shimmer, each shade is designed to bring softness, warmth, and quiet intensity to the eyes. Whether you&#039;re creating a natural flush or a smoldering gaze, Soft Ember blends effortlessly for that lit-from-within elegance. Let your eyes flicker with the subtle fire of Soft Ember.','product_images/EYESHADOW6.jpg',33,9,'2025-06-17 21:28:03'),(56,'Nars Ivory Silk Foundation','foundation1.jpg','A featherlight foundation that embraces fair complexions with a soft-focus, second-skin finish. Ivory Silk delivers seamless coverage with a brightening effect that smooths out imperfections without masking your skin’s natural radiance. Enriched with light-diffusing particles and hydrating elements, it glides effortlessly, leaving a satin-matte glow. Ideal for porcelain to light ivory tones seeking breathable elegance.\r\n','product_images/foundation1.jpg',25,10,'2025-06-17 21:35:59'),(57,'Fitme Almond Dew Foundation','foundation2.jpg','Almond Dew brings dewy radiance to light and light-medium skin tones with almond warmth and creamy texture. Formulated with skin-loving botanicals and glow-enhancing agents, it delivers a hydrated, lit-from-within finish that enhances your skin’s naural beauty. Perfect for days when you want your base to look like skin — just better.\r\nPerfect for parties and other events.\r\n','product_images/foundation2.jpg',31,10,'2025-06-17 21:36:42'),(58,'Elf Beige Bloom Foundation','foundation3.jpg','Beige Bloom is your everyday skin savior — elegant, smooth, and incredibly blendable.\r\nDesigned for medium skin tones with neutral balance, this creamy foundation melts into the skin, delivering a polished look that lasts all day. The semi-matte formula keeps shine in check while maintaining skin’s soft suppleness.\r\n','product_images/foundation3.jpg',27,10,'2025-06-17 21:37:36'),(59,'Sand Glow Foundation','foundation4.jpg','Sunlit, soft, and radiant — Sand Glow is a glow-enhancing base for medium to tan skin tones. With a lightweight texture and fine pearl infusion, this foundation adds warmth and dimension, making skin look healthy and lit-from-within. Perfect for golden-hour beauty, all day long.  This sand glow foundation is just amazing and  its also our top selling foundation of the year 2024.','product_images/foundation4.jpg',29,10,'2025-06-17 21:38:37'),(60,'Mac Caramel Skin Foundation','foundation5.jpg','Smooth. Confident. Caramel Skin delivers medium-to-full coverage with a creamy satin finish. Richly pigmented yet blendable, it conceals uneven tones, softens texture, and leaves behind a warm, sun-kissed look. This caramel base flatters a range of tan to deep-medium tones with a luminous depth. Perfect for weddings and big events with heavy makeup. Never cakey, never dry — just smooth, even skin. Stays smooth all day all long!','product_images/foundation5.jpg',25,10,'2025-06-17 21:39:20'),(61,'Revlon Tanned glow foundation','foundation6.jpg','Tanned Glow is a radiant tan-toned foundation designed to enhance sun-kissed skin with a smooth, golden warmth. Infused with light-reflecting pigments and skin-softening agents, it delivers medium-to-full coverage with a natural, healthy glow. The formula blends seamlessly, blurs imperfections, and leaves a luminous, filter-like finish that lasts from day to dusk. Let your skin wear the warmth of summer, every day — with Tanned Glow.','product_images/foundation6.jpg',24,10,'2025-06-17 21:39:51');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` VALUES (1,1,'Omar Azam','thisisomarazam@gmail.com','03170505259','d84585ef37187af0ec47e5c8d6788d16020f0b61d381a46b349e12defa749ad0','2025-07-16 00:49:23','2025-06-15 22:49:23');
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Omar Azam','thisisomarazam@gmail.com','03170505259','2005-06-06','male','$2y$10$kJRKLXOqZR1haKGJvxtBF./ksPTcexONu0Agq8Pcgdcpst.6zfyY6','admin','2025-06-15 22:49:23'),(2,'Aaliyan','aaliyan@gmail.com','03122788190','2002-02-09','other','$2y$10$Gq5/EpN.toZzt2CnWi5A7.bSNMVdKLD61UG1rMIb4eBvA43uDWfya','user','2025-06-16 11:14:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-17 15:56:23
