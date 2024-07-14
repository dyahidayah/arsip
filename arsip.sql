/*
 Navicat MySQL Dump SQL

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411 (10.4.11-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : arsip

 Target Server Type    : MySQL
 Target Server Version : 100411 (10.4.11-MariaDB)
 File Encoding         : 65001

 Date: 05/07/2024 06:29:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategori_surat_keluar
-- ----------------------------
DROP TABLE IF EXISTS `kategori_surat_keluar`;
CREATE TABLE `kategori_surat_keluar`  (
  `id_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_surat_keluar
-- ----------------------------
INSERT INTO `kategori_surat_keluar` VALUES ('01KSK_B', 'Biasa', 'Permohonan');

-- ----------------------------
-- Table structure for kategori_surat_masuk
-- ----------------------------
DROP TABLE IF EXISTS `kategori_surat_masuk`;
CREATE TABLE `kategori_surat_masuk`  (
  `id_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_surat_masuk
-- ----------------------------
INSERT INTO `kategori_surat_masuk` VALUES ('01KSM_B', 'Biasa', 'Permohonan');
INSERT INTO `kategori_surat_masuk` VALUES ('01KSM_R', 'Rahasia', 'Personil');
INSERT INTO `kategori_surat_masuk` VALUES ('01KSM_T', 'Telegram', 'Terbuka');
INSERT INTO `kategori_surat_masuk` VALUES ('02KSM_B', 'Biasa', 'Umum');
INSERT INTO `kategori_surat_masuk` VALUES ('02KSM_T', 'Telegram', 'Segera');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Anindy', 'Operator Arsip', 'operator', 'operator123', 'operator');
INSERT INTO `user` VALUES (2, 'Dhimas Adi Sanjaya', 'Kepala TU', 'superadmin', 'superadmin123', 'superadmin');

SET FOREIGN_KEY_CHECKS = 1;
