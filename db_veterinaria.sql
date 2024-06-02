-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2023 a las 20:36:25
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biomet`
--

CREATE TABLE `biomet` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `hematologia_completa_con_descarte_hemotropicos` tinyint(1) NOT NULL DEFAULT '0',
  `hematologia_completa_especial_hematozoario` tinyint(1) NOT NULL DEFAULT '0',
  `hematologia_completa_emergencia` tinyint(1) NOT NULL DEFAULT '0',
  `descarte_hematozoario` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_renal_pr` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_hepatico_pm` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_lipidico_pl` tinyint(1) NOT NULL DEFAULT '0',
  `proteinas_totales_y_fraccionadas` tinyint(1) NOT NULL DEFAULT '0',
  `electrolitos_cl_na_k` tinyint(1) NOT NULL DEFAULT '0',
  `urea` tinyint(1) NOT NULL DEFAULT '0',
  `creatinina` tinyint(1) NOT NULL DEFAULT '0',
  `bum` tinyint(1) NOT NULL DEFAULT '0',
  `tgo` tinyint(1) NOT NULL DEFAULT '0',
  `tgp` tinyint(1) NOT NULL DEFAULT '0',
  `bilirrubina` tinyint(1) NOT NULL DEFAULT '0',
  `calcio` tinyint(1) NOT NULL DEFAULT '0',
  `fosforo` tinyint(1) NOT NULL DEFAULT '0',
  `magnesio` tinyint(1) NOT NULL DEFAULT '0',
  `colesterol` tinyint(1) NOT NULL DEFAULT '0',
  `trigliceridos` tinyint(1) NOT NULL DEFAULT '0',
  `glicemia` tinyint(1) NOT NULL DEFAULT '0',
  `proteina_total` tinyint(1) NOT NULL DEFAULT '0',
  `albumina` tinyint(1) NOT NULL DEFAULT '0',
  `globulina` tinyint(1) NOT NULL DEFAULT '0',
  `amilasa` tinyint(1) NOT NULL DEFAULT '0',
  `lipasa` tinyint(1) NOT NULL DEFAULT '0',
  `fosfatasas_alcalinas` tinyint(1) NOT NULL DEFAULT '0',
  `fribrinogeno` tinyint(1) NOT NULL DEFAULT '0',
  `tiempo_de_protombina` tinyint(1) NOT NULL DEFAULT '0',
  `tiempo_de_parcial_de_tromboplastina` tinyint(1) NOT NULL DEFAULT '0',
  `velocidad_de_sedimentacion` tinyint(1) NOT NULL DEFAULT '0',
  `card_test_brucela` tinyint(1) NOT NULL DEFAULT '0',
  `leptospira` tinyint(1) NOT NULL DEFAULT '0',
  `leucosis` tinyint(1) NOT NULL DEFAULT '0',
  `rinotraqueitis_infecciosa_bovina` tinyint(1) NOT NULL DEFAULT '0',
  `diarrea_viral_bovina` tinyint(1) NOT NULL DEFAULT '0',
  `neospora` tinyint(1) NOT NULL DEFAULT '0',
  `parvovirus_y_cornavirus` tinyint(1) NOT NULL DEFAULT '0',
  `distember_canino` tinyint(1) NOT NULL DEFAULT '0',
  `test_de_coggins_control` tinyint(1) NOT NULL DEFAULT '0',
  `test_de_coggins_control_con_resena` tinyint(1) NOT NULL DEFAULT '0',
  `raspado_cutaneo` tinyint(1) NOT NULL DEFAULT '0',
  `citologia_otica` tinyint(1) NOT NULL DEFAULT '0',
  `citologia_de_piel` tinyint(1) NOT NULL DEFAULT '0',
  `citologia_oncologica` tinyint(1) NOT NULL DEFAULT '0',
  `exudado_transudado` tinyint(1) NOT NULL DEFAULT '0',
  `uroanalisis` tinyint(1) NOT NULL DEFAULT '0',
  `coproanalisis_para_peq_animales` tinyint(1) NOT NULL DEFAULT '0',
  `coproanalisis_para_grd_animales` tinyint(1) NOT NULL DEFAULT '0',
  `sangre_oculta_en_heces` tinyint(1) NOT NULL DEFAULT '0',
  `urocultivo` tinyint(1) NOT NULL DEFAULT '0',
  `tinsion_ziehl_neelsen` tinyint(1) NOT NULL DEFAULT '0',
  `cultivo_de_bk_tuberculosis` tinyint(1) NOT NULL DEFAULT '0',
  `cultivo_de_hongos` tinyint(1) NOT NULL DEFAULT '0',
  `cultivo_de_piogenos` tinyint(1) NOT NULL DEFAULT '0',
  `cultivo_de_anaerobios` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `biomet`
--

INSERT INTO `biomet` (`id`, `idPaciente`, `hematologia_completa_con_descarte_hemotropicos`, `hematologia_completa_especial_hematozoario`, `hematologia_completa_emergencia`, `descarte_hematozoario`, `perfil_renal_pr`, `perfil_hepatico_pm`, `perfil_lipidico_pl`, `proteinas_totales_y_fraccionadas`, `electrolitos_cl_na_k`, `urea`, `creatinina`, `bum`, `tgo`, `tgp`, `bilirrubina`, `calcio`, `fosforo`, `magnesio`, `colesterol`, `trigliceridos`, `glicemia`, `proteina_total`, `albumina`, `globulina`, `amilasa`, `lipasa`, `fosfatasas_alcalinas`, `fribrinogeno`, `tiempo_de_protombina`, `tiempo_de_parcial_de_tromboplastina`, `velocidad_de_sedimentacion`, `card_test_brucela`, `leptospira`, `leucosis`, `rinotraqueitis_infecciosa_bovina`, `diarrea_viral_bovina`, `neospora`, `parvovirus_y_cornavirus`, `distember_canino`, `test_de_coggins_control`, `test_de_coggins_control_con_resena`, `raspado_cutaneo`, `citologia_otica`, `citologia_de_piel`, `citologia_oncologica`, `exudado_transudado`, `uroanalisis`, `coproanalisis_para_peq_animales`, `coproanalisis_para_grd_animales`, `sangre_oculta_en_heces`, `urocultivo`, `tinsion_ziehl_neelsen`, `cultivo_de_bk_tuberculosis`, `cultivo_de_hongos`, `cultivo_de_piogenos`, `cultivo_de_anaerobios`) VALUES
(8, 708, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constantes_fisiologicas`
--

CREATE TABLE `constantes_fisiologicas` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `fcardiaca` int(11) DEFAULT NULL,
  `respiracion` int(11) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `constantes_fisiologicas`
--

INSERT INTO `constantes_fisiologicas` (`id`, `idPaciente`, `temperatura`, `fcardiaca`, `respiracion`, `peso`) VALUES
(9, 708, '2.00', 2, 2, '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `idPaciente`, `url`) VALUES
(1, 271, 'files/foto_64ab42fb0b89f.jpg'),
(2, 4, 'files/foto_64af1575d1359.jpg'),
(3, 63, 'files/foto_64af46df6c777.png'),
(4, 271, 'files/foto_64af498c1fa14.jpg'),
(5, 4, 'files/foto_64bc45f304b2f.jpg'),
(6, 22, 'files/foto_64c018f923405.jpg'),
(7, 22, 'files/foto_64c0193b921b7.jpg'),
(8, 22, 'files/foto_64c019533d6be.jpg'),
(9, 22, 'files/foto_64c0196097f97.jpg'),
(10, 500, 'files/foto_64c05b5931c97.jpg'),
(11, 708, 'files/foto_64c6932a45c06.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_paciente`
--

CREATE TABLE `historial_paciente` (
  `idHistorial` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `vacunado` varchar(255) DEFAULT NULL,
  `vacunado_fecha` date DEFAULT NULL,
  `vacunas_caninas` varchar(255) DEFAULT NULL,
  `vacunas_felinas` varchar(255) DEFAULT NULL,
  `desparasitacion` varchar(255) DEFAULT NULL,
  `desparasitacion_fecha` date DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `estado_reproductivo` varchar(255) DEFAULT NULL,
  `alimentacion` varchar(255) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `enfermedades_anteriores` varchar(255) DEFAULT NULL,
  `habitat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_paciente`
--

INSERT INTO `historial_paciente` (`idHistorial`, `idPaciente`, `vacunado`, `vacunado_fecha`, `vacunas_caninas`, `vacunas_felinas`, `desparasitacion`, `desparasitacion_fecha`, `producto`, `estado_reproductivo`, `alimentacion`, `alergias`, `enfermedades_anteriores`, `habitat`) VALUES
(9, 708, 'no', '2023-07-26', 'NO', 'NO', 'si', '2023-06-28', 'nose', 'ENTERO', 'fcardiaca', 'ninguna', 'atropellado', 'FINCA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo`
--

CREATE TABLE `nuevo` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_codigo` int(255) NOT NULL,
  `id_nuevacontrasena` varchar(255) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `rol` tinyint(1) DEFAULT '1',
  `id_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nuevo`
--

INSERT INTO `nuevo` (`id`, `id_codigo`, `id_nuevacontrasena`, `ruta_imagen`, `rol`, `id_usuario`) VALUES
(708, 123, 'lisbeth', 'files/fotoperfil_64c6920a9a202.jpg', 1, ''),
(710, 0, 'Dr.Henrry Graterol', 'files/fotoperfil_64c6a4f72962f.jpg', 2, 'Dr.Henrry Graterol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL,
  `nombre_paciente` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `procedencia` varchar(255) DEFAULT NULL,
  `idPropietario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `nombre_paciente`, `especie`, `color`, `sexo`, `edad`, `fechaNacimiento`, `procedencia`, `idPropietario`) VALUES
(708, 'canino', 'poodle', 'blanco', 'Macho', 21, '2023-07-04', 'callejero', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paravet`
--

CREATE TABLE `paravet` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `hemat_comp_desc_de_hemo` tinyint(1) NOT NULL DEFAULT '0',
  `desc_de_hemo` tinyint(1) NOT NULL DEFAULT '0',
  `vsg` tinyint(1) NOT NULL DEFAULT '0',
  `hb_y_hto` tinyint(1) NOT NULL DEFAULT '0',
  `cuenta_leuco` tinyint(1) NOT NULL DEFAULT '0',
  `plaquetas` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_hepatico` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_renal` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_lipidico` tinyint(1) NOT NULL DEFAULT '0',
  `perfil_tiroideo_canino` tinyint(1) NOT NULL DEFAULT '0',
  `urea` tinyint(1) NOT NULL DEFAULT '0',
  `creatinina` tinyint(1) NOT NULL DEFAULT '0',
  `tgo_y_tgp` tinyint(1) NOT NULL DEFAULT '0',
  `bilirrubina_t_y_f` tinyint(1) NOT NULL DEFAULT '0',
  `proteinas_y_f` tinyint(1) NOT NULL DEFAULT '0',
  `glicemia` tinyint(1) NOT NULL DEFAULT '0',
  `colesterol` tinyint(1) NOT NULL DEFAULT '0',
  `trigliceridos` tinyint(1) NOT NULL DEFAULT '0',
  `pt` tinyint(1) NOT NULL DEFAULT '0',
  `ptt` tinyint(1) NOT NULL DEFAULT '0',
  `fibrinogeno` tinyint(1) NOT NULL DEFAULT '0',
  `analisis_coprologico_willys` tinyint(1) NOT NULL DEFAULT '0',
  `analisis_coprologico_mac_master` tinyint(1) NOT NULL DEFAULT '0',
  `analisis_coprologico_sedimentacion_tamizado` tinyint(1) NOT NULL DEFAULT '0',
  `sangre_oculta_en_heces` tinyint(1) NOT NULL DEFAULT '0',
  `uroanalisis` tinyint(1) NOT NULL DEFAULT '0',
  `leptospirina_mat` tinyint(1) NOT NULL DEFAULT '0',
  `brucella` tinyint(1) NOT NULL DEFAULT '0',
  `rinotraqueitis_infecciosa_bovina` tinyint(1) NOT NULL DEFAULT '0',
  `diarrea_viral_bobina` tinyint(1) NOT NULL DEFAULT '0',
  `neospora_caninum` tinyint(1) NOT NULL DEFAULT '0',
  `distemper_canino` tinyint(1) NOT NULL DEFAULT '0',
  `parvovirus_canino` tinyint(1) NOT NULL DEFAULT '0',
  `leucemia_e_inmunodeficiencia_felina` tinyint(1) NOT NULL DEFAULT '0',
  `lipasa` tinyint(1) NOT NULL DEFAULT '0',
  `amilasa` tinyint(1) NOT NULL DEFAULT '0',
  `ldh` tinyint(1) NOT NULL DEFAULT '0',
  `ggt` tinyint(1) NOT NULL DEFAULT '0',
  `fosfatasas_alcalinas` tinyint(1) NOT NULL DEFAULT '0',
  `na` tinyint(1) NOT NULL DEFAULT '0',
  `k` tinyint(1) NOT NULL DEFAULT '0',
  `cl` tinyint(1) NOT NULL DEFAULT '0',
  `ca` tinyint(1) NOT NULL DEFAULT '0',
  `p` tinyint(1) NOT NULL DEFAULT '0',
  `mg` tinyint(1) NOT NULL DEFAULT '0',
  `vaginal` tinyint(1) NOT NULL DEFAULT '0',
  `otica` tinyint(1) NOT NULL DEFAULT '0',
  `de_piel` tinyint(1) NOT NULL DEFAULT '0',
  `oncologica` tinyint(1) NOT NULL DEFAULT '0',
  `citologia_de_liquidos` tinyint(1) NOT NULL DEFAULT '0',
  `exudado_trasudado` tinyint(1) NOT NULL DEFAULT '0',
  `raspado_de_piel` tinyint(1) NOT NULL DEFAULT '0',
  `t4l_canino` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paravet`
--

INSERT INTO `paravet` (`id`, `idPaciente`, `hemat_comp_desc_de_hemo`, `desc_de_hemo`, `vsg`, `hb_y_hto`, `cuenta_leuco`, `plaquetas`, `perfil_hepatico`, `perfil_renal`, `perfil_lipidico`, `perfil_tiroideo_canino`, `urea`, `creatinina`, `tgo_y_tgp`, `bilirrubina_t_y_f`, `proteinas_y_f`, `glicemia`, `colesterol`, `trigliceridos`, `pt`, `ptt`, `fibrinogeno`, `analisis_coprologico_willys`, `analisis_coprologico_mac_master`, `analisis_coprologico_sedimentacion_tamizado`, `sangre_oculta_en_heces`, `uroanalisis`, `leptospirina_mat`, `brucella`, `rinotraqueitis_infecciosa_bovina`, `diarrea_viral_bobina`, `neospora_caninum`, `distemper_canino`, `parvovirus_canino`, `leucemia_e_inmunodeficiencia_felina`, `lipasa`, `amilasa`, `ldh`, `ggt`, `fosfatasas_alcalinas`, `na`, `k`, `cl`, `ca`, `p`, `mg`, `vaginal`, `otica`, `de_piel`, `oncologica`, `citologia_de_liquidos`, `exudado_trasudado`, `raspado_de_piel`, `t4l_canino`) VALUES
(6, 708, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) UNSIGNED NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `Peso` varchar(255) NOT NULL,
  `Tamano` varchar(255) NOT NULL,
  `Color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idPropietario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `motivo` text,
  `anamnesico` text,
  `municipio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idPropietario`, `nombre`, `ci`, `direccion`, `telefono`, `edad`, `motivo`, `anamnesico`, `municipio`) VALUES
(15, 'Lisbeth Sofia ', 29601951, 'cuatricentenaria', 2147483647, NULL, 'alergia', 'nose', 'Barinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id`, `idPaciente`, `url`) VALUES
(6, 708, 'files/resultado_64c6931bf05c4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `timeline`
--

INSERT INTO `timeline` (`id`, `idPaciente`, `create_time`) VALUES
(26, 4, '2023-07-22 18:23:35'),
(27, 4, '2023-07-22 18:25:46'),
(28, 4, '2023-07-22 18:31:43'),
(29, 4, '2023-07-22 18:35:40'),
(30, 4, '2023-07-22 19:15:46'),
(31, 4, '2023-07-22 19:15:58'),
(32, 4, '2023-07-22 20:02:44'),
(33, 4, '2023-07-22 20:35:33'),
(34, 4, '2023-07-22 20:45:21'),
(35, 4, '2023-07-22 20:47:22'),
(36, 4, '2023-07-22 20:47:52'),
(37, 4, '2023-07-22 20:48:13'),
(38, 4, '2023-07-22 20:50:15'),
(39, 4, '2023-07-22 20:53:39'),
(40, 4, '2023-07-22 20:58:51'),
(41, 4, '2023-07-22 21:00:10'),
(42, 22, '2023-07-24 17:16:57'),
(43, 10, '2023-07-25 14:31:54'),
(44, 22, '2023-07-25 14:41:42'),
(45, 22, '2023-07-25 14:47:48'),
(46, 22, '2023-07-25 14:48:03'),
(47, 22, '2023-07-25 14:48:25'),
(48, 22, '2023-07-25 14:49:31'),
(49, 22, '2023-07-25 14:49:55'),
(50, 22, '2023-07-25 14:50:08'),
(51, 22, '2023-07-25 14:51:06'),
(52, 22, '2023-07-25 14:54:25'),
(53, 22, '2023-07-25 14:54:38'),
(54, 22, '2023-07-25 14:55:15'),
(55, 22, '2023-07-25 14:55:28'),
(56, 500, '2023-07-25 19:27:12'),
(57, 500, '2023-07-25 19:30:00'),
(58, 500, '2023-07-25 19:31:06'),
(59, 500, '2023-07-25 19:31:19'),
(60, 500, '2023-07-25 19:31:37'),
(61, 500, '2023-07-25 19:31:54'),
(62, 500, '2023-07-25 19:32:16'),
(63, 617, '2023-07-25 19:36:02'),
(64, 617, '2023-07-25 19:37:05'),
(65, 617, '2023-07-25 19:37:22'),
(66, 617, '2023-07-25 19:37:35'),
(67, 617, '2023-07-25 19:38:15'),
(68, 273, '2023-07-25 19:51:39'),
(69, 491, '2023-07-26 12:36:09'),
(70, 491, '2023-07-26 12:36:56'),
(71, 491, '2023-07-26 12:37:42'),
(72, 708, '2023-07-30 12:41:09'),
(73, 708, '2023-07-30 12:41:50'),
(74, 708, '2023-07-30 12:42:32'),
(75, 708, '2023-07-30 12:43:08'),
(76, 708, '2023-07-30 12:43:22'),
(77, 708, '2023-07-30 12:44:39'),
(78, 708, '2023-07-30 12:45:13'),
(79, 708, '2023-07-30 12:45:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `idPaciente`, `url`) VALUES
(4, 708, 'files/resultado_64c69399725b5.jpg'),
(5, 708, 'files/resultado_64c693b44a624.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `idPaciente`, `url`) VALUES
(23, 708, 'http://localhost/veterinaria/files/video_64c693779b455.mp4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biomet`
--
ALTER TABLE `biomet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `constantes_fisiologicas`
--
ALTER TABLE `constantes_fisiologicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `nuevo`
--
ALTER TABLE `nuevo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idPropietario` (`idPropietario`);

--
-- Indices de la tabla `paravet`
--
ALTER TABLE `paravet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idPropietario`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `biomet`
--
ALTER TABLE `biomet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `constantes_fisiologicas`
--
ALTER TABLE `constantes_fisiologicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `nuevo`
--
ALTER TABLE `nuevo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;
--
-- AUTO_INCREMENT de la tabla `paravet`
--
ALTER TABLE `paravet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `idPropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `constantes_fisiologicas`
--
ALTER TABLE `constantes_fisiologicas`
  ADD CONSTRAINT `constantes_fisiologicas_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`);

--
-- Filtros para la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD CONSTRAINT `historial_paciente_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idPropietario`) REFERENCES `propietario` (`idPropietario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
