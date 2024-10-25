/*
 Navicat Premium Data Transfer

 Source Server         : DB Razor
 Source Server Type    : MySQL
 Source Server Version : 50546
 Source Host           : 10.255.132.10:3306
 Source Schema         : rkbmd2023

 Target Server Type    : MySQL
 Target Server Version : 50546
 File Encoding         : 65001

 Date: 25/10/2024 11:09:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jurna_verif_lhi
-- ----------------------------
DROP TABLE IF EXISTS `jurna_verif_lhi`;
CREATE TABLE `jurna_verif_lhi`  (
  `id` int(11) NOT NULL,
  `nip_kepala` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_kepala` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_aset` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lhi_perubahan_data` int(11) NOT NULL,
  `created_date_lhi_perubahan_data` date NOT NULL,
  `lhi_perubahan_fisik` int(11) NOT NULL,
  `created_date_lhi_perubahan_fisik` date NOT NULL,
  `lhi_barang_tdk_ketemu` int(11) NOT NULL,
  `created_date_lhi_barang_tdk_ketemu` date NOT NULL,
  `lhi_barang_hilang` int(11) NOT NULL,
  `created_date_lhi_barang_hilang` date NOT NULL,
  `lhi_blm_kapt_diket_induk` int(11) NOT NULL,
  `created_date_lhi_blm_kapt_diket_induk` date NOT NULL,
  `lhi_blm_kapt_tdk_diket_induk` int(11) NOT NULL,
  `created_date_lhi_blm_kapt_tdk_diket_induk` date NOT NULL,
  `lhi_barang_ganda` int(11) NOT NULL,
  `created_date_lhi_barang_ganda` date NOT NULL,
  `lhi_barang_digunakan_pihak_lain` int(11) NOT NULL,
  `created_date_lhi_barang_digunakan_pihak_lain` date NOT NULL,
  `lhi_digunakan_pegawai` int(11) NOT NULL,
  `created_date_lhi_digunakan_pegawai` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jurna_verif_lhi
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
