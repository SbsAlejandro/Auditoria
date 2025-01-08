--
-- PostgreSQL database dump
--

-- Dumped from database version 14.13
-- Dumped by pg_dump version 16.4

-- Started on 2025-01-07 23:52:03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 175844)
-- Name: empleados_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.empleados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.empleados_id_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 210 (class 1259 OID 175845)
-- Name: empleados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empleados (
    id bigint DEFAULT nextval('public.empleados_id_seq'::regclass) NOT NULL,
    cedula integer NOT NULL,
    nombre character varying(255),
    apellido character varying(255),
    cotiza character varying(20) DEFAULT true,
    sexo character varying(20),
    estado_civil character varying(50),
    fecha_nacimiento character varying(20),
    edad integer,
    nacionalidad character varying(100),
    carga_familiar integer,
    zurdo character varying(20) DEFAULT false,
    peso integer,
    camisa character varying(100) DEFAULT 'N/A'::character varying,
    chaqueta character varying(100) DEFAULT 'N/A'::character varying,
    falto character varying(100) DEFAULT 'N/A'::character varying,
    falda character varying(100) DEFAULT 'N/A'::character varying,
    pantalon character varying(100) DEFAULT 'N/A'::character varying,
    braga character varying(100) DEFAULT 'N/A'::character varying,
    bata character varying(100) DEFAULT 'N/A'::character varying,
    zapato character varying(100) DEFAULT 'N/A'::character varying,
    certificadosalud character varying(20) DEFAULT 'no'::character varying,
    tipo_propiedad character varying(50),
    desc_tipo_propiedad character varying(100),
    urbanizacion character varying(255),
    ciudad character varying(255),
    ubicacion character varying(255),
    telefonohabitacion character varying(50),
    telefonocelular character varying(50),
    otrotelefono character varying(50),
    email character varying(255),
    grado character varying(255),
    institucion character varying(255),
    localidad character varying(255),
    especialidad character varying(255),
    ultimo_a character varying(255),
    graduado character varying(20),
    estudiando character varying(20) DEFAULT false,
    institucion_actual character varying(255),
    carrera_actual character varying(255),
    especialidad_actual character varying(255),
    horario_inicio character varying(100),
    horario_fin character varying(100),
    fecha_desde character varying(100),
    fecha_hasta character varying(100),
    postgrado character varying(20),
    tipopostgrado character varying(50),
    especificaciones character varying(255),
    tipojornada character varying(20),
    realizariaguardia character varying(20) DEFAULT false,
    horarioguardia character varying(30),
    idioma character varying(50) DEFAULT 0,
    nombrefamiliar character varying(255),
    apellidofamiliar character varying(255),
    cedulafamiliar integer,
    parentesco character varying(255),
    fecha_nacimiento_familiar character varying(20),
    sexofamiliar character varying(20),
    trabajafamiliar character varying(20),
    vehiculo character varying(20) DEFAULT 'no'::character varying,
    licencia character varying(100),
    marca character varying(255),
    modelo character varying(255),
    anio character varying(50),
    placa character varying(100),
    color character varying(100),
    fechavencimientosalud character varying(20),
    estatura character varying(20),
    direccionhabitacion character varying(255),
    avenida character varying(255),
    conjunto_residencial character varying(255),
    edificio character varying(255),
    casa character varying(255),
    quinta character varying(255),
    piso character varying(255),
    departamento character varying(255),
    tipoguardia character varying(50),
    hablar character varying(20),
    leer character varying(20),
    escribir character varying(20),
    nivel character varying(20),
    dondetrabajafamiliar character varying(255),
    id_empresa integer,
    fecha_registro date DEFAULT now()
);


ALTER TABLE public.empleados OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 175867)
-- Name: empresas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.empresas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.empresas_id_seq OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 175868)
-- Name: empresas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empresas (
    id integer DEFAULT nextval('public.empresas_id_seq'::regclass) NOT NULL,
    nombre_empresa character varying(255),
    cant_empleados_actual character varying(255)
);


ALTER TABLE public.empresas OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 175874)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id integer NOT NULL,
    rol character varying(255) NOT NULL,
    estatus integer NOT NULL,
    fecha character varying(255) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 175879)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.roles_id_seq OWNER TO postgres;

--
-- TOC entry 3369 (class 0 OID 0)
-- Dependencies: 214
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 218 (class 1259 OID 175905)
-- Name: temporal_familiar_auditoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.temporal_familiar_auditoria (
    id bigint NOT NULL,
    nombrefamiliar character varying(255) NOT NULL,
    apellidofamiliar character varying(255) NOT NULL,
    cedulafamiliar integer,
    parentesco character varying(255),
    fecha_nacimiento_familiar date,
    sexofamiliar character varying(20),
    trabajafamiliar character varying(20),
    dondetrabajafamiliar character varying(20),
    id_usuario integer
);


ALTER TABLE public.temporal_familiar_auditoria OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 175904)
-- Name: temporal_familiar_auditoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.temporal_familiar_auditoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.temporal_familiar_auditoria_id_seq OWNER TO postgres;

--
-- TOC entry 3370 (class 0 OID 0)
-- Dependencies: 217
-- Name: temporal_familiar_auditoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.temporal_familiar_auditoria_id_seq OWNED BY public.temporal_familiar_auditoria.id;


--
-- TOC entry 215 (class 1259 OID 175886)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    correo character varying(50) NOT NULL,
    fecha character varying(255) NOT NULL,
    contrasena character varying(255) NOT NULL,
    rol integer NOT NULL,
    estatus integer NOT NULL,
    cedula integer
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 175891)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 3371 (class 0 OID 0)
-- Dependencies: 216
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 3202 (class 2604 OID 175892)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 3204 (class 2604 OID 175908)
-- Name: temporal_familiar_auditoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.temporal_familiar_auditoria ALTER COLUMN id SET DEFAULT nextval('public.temporal_familiar_auditoria_id_seq'::regclass);


--
-- TOC entry 3203 (class 2604 OID 175894)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- TOC entry 3354 (class 0 OID 175845)
-- Dependencies: 210
-- Data for Name: empleados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empleados (id, cedula, nombre, apellido, cotiza, sexo, estado_civil, fecha_nacimiento, edad, nacionalidad, carga_familiar, zurdo, peso, camisa, chaqueta, falto, falda, pantalon, braga, bata, zapato, certificadosalud, tipo_propiedad, desc_tipo_propiedad, urbanizacion, ciudad, ubicacion, telefonohabitacion, telefonocelular, otrotelefono, email, grado, institucion, localidad, especialidad, ultimo_a, graduado, estudiando, institucion_actual, carrera_actual, especialidad_actual, horario_inicio, horario_fin, fecha_desde, fecha_hasta, postgrado, tipopostgrado, especificaciones, tipojornada, realizariaguardia, horarioguardia, idioma, nombrefamiliar, apellidofamiliar, cedulafamiliar, parentesco, fecha_nacimiento_familiar, sexofamiliar, trabajafamiliar, vehiculo, licencia, marca, modelo, anio, placa, color, fechavencimientosalud, estatura, direccionhabitacion, avenida, conjunto_residencial, edificio, casa, quinta, piso, departamento, tipoguardia, hablar, leer, escribir, nivel, dondetrabajafamiliar, id_empresa, fecha_registro) FROM stdin;
5	23434	SIMON	GONZALEZ	SI	M	S	2000-12-12	22	venezuela	34	SI	22	M	M	M	M	M	M	M	M	si	\N	\N	lkansc	asljfbn	aekjbf	982354	128934	32984	sgonzalez@ciedex.com	ing	ldif	askjdbf	slkfn	aslkfb	si	si	lsdkfb	asdlfjkb	sdkjfb	11:11	22:22	2006-12-12	2007-12-12	si	\N	\N	completo	si	mañana	ingles	lksdjbng	sdkvb	9345	kjsdbf	2000-12-12	F	si	si	3	kjsnf	dfsf	2001	fddf	sss	2004-12-12	171	sadlk	dfkj	sdkjfb	edificio	casa	quinta		laiebnf	sabado	hablar	leer	escribir	regular	sdlkbf	2	2025-01-05
6	987654	MATIAS	GONZALEZ	SI	M	S	2000-12-05	33	venezuela	4	NO	118	M	M	M	M	M	M	M	M	si	\N	\N	kljncklj	lnqefj	pqpif	3423	4313	7457	simon@gmail.com	3ro	kljbasjc	adklnv	aklnfklasn	alksnc	si	si	lnljasc	jfklncj	ljlflknlkn	11:11	22:22	2001-11-11	2001-11-11	si	phd	\N	completo	si	mañana	ingles	lknklnwkld	kjnjscs	8973431	kjbkjas	2003-11-11	F	si	si	3ro	jeep	cherokee	2001	kjbfjk	ljqnwfjn	2000-11-11	122	lkjnslfjns	kjbfkj	kjbwjkd	edificio	casa	quinta		lknk	domingo	hablar	leer	escribir	regular	lknlkansdfln	1	2025-01-06
7	9988776	ESTEBAN	GONZALEZ	SI	M	S	2001-11-11	12	venezuela	2	NO	14	M	M	M	M	M	M	M	M	si	\N	\N	kmklmklmlk	aqjhiuui	wiugukuu	76643	38748	978353	simon@gmail.com	bachiller	jkhkjkjkjbkjerv	kjbjkbjkere	kjnkjnekner	khkknbnbkjk	si	si	ljknklenrgkjner	wefbkdbfke	rtkjbktvb	11:11	22:22	2001-11-11	2001-11-11	si	maestria	kjnjnkjnferferfe	completo	si	mañana	ingles	oihjjjojojo	dddkjkjn	14894166	ljnlkemlgkerg	2001-12-11	F	si	si	3ro	jeep	cherokee	2001	lknlkn	khjbhjkb	2001-11-11	122	kjbkjkwfrf	kjkjnnfer	kjkjrjnkre	edificio	casa	quinta	33		sabado	hablar	leer	escribir	regular	kjnkjnvkjenjkrvbkejr	1	2025-01-06
11	25443848	STEPHANY	PEÑA	SI	F	C	2001-11-11	29	venezuela	2	NO	58	M	M	M	M	M	M	M	M	si	\N	\N	kmklmrlkmlre	lknlknrlknvkler	lknlknrklnvr	9396624	978749879	9879847923	stephany@gmail.com	tercer año		kjkjerjkvker	kjnkjnerkv	tercero	si	si								si			completo	si	mañana	espanol	simon	gonzalez	14894162	esposo	2001-11-11	F	si	si								167	kblenlvknlekrv	nlknrlkenvlkenrv	lknlceec	edificio	casa	quinta		sin numero		hablar	leer	escribir	regular		4	2025-01-06
12	22334455	JUAN	ARZOLA	SI	M	D	2001-11-11	49	venezuela	5	NO	88	M	M	M	M	M	M	M	M	si	\N	\N	uieroiewfhbd	qweqewkjkf	oihihefew	87347	4738	13489	juan@gmail.com	bachiller		jjjqebfkb	eeedihudwd	hhbfhb	si	si								si			completo	si	mañana	ingles	leticia	fuemayor	12333214	esposa	2005-11-11	F	si	si							2003-11-11	170	ljnkjvnjsdv	aadlnf	oobcbsc	edificio	casa	quinta		8584		hablar	leer	escribir	regular		8	2025-01-06
13	3004557	SILVANO	NUÑEZ	SSI	M	MIRANDA	2025-01-06	22	bolivia	555	SI	40	L	L	L	L	L	L	L	45	si	\N	\N	prueba	prueba	prueba	04264054370	04264054370	04264054370	sebastianalejandro427@gmail.com	4to		prueba	prueba	prueba	si	si	prueba	prueba	prueba	18:39				si			completo	si	mañana	ingles	Silvano	Nuñez	15118195	prueba	2025-01-06	F	si	si								1.50	Caracas	prueba	prueba	edificio	casa	quinta			sabado	hablar	leer	escribir	regular	prueba	2	2025-01-06
\.


--
-- TOC entry 3356 (class 0 OID 175868)
-- Dependencies: 212
-- Data for Name: empresas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresas (id, nombre_empresa, cant_empleados_actual) FROM stdin;
1	INMARLACA • AGROD • ROBLAR	1607
2	DON RAMON Ml RANCHITO 093	94
3	MAYOLLERA 078	46
4	LAS CAMELIAS ASTREA 059	757
5	FELTRINA • MOPORO CA PAZ 058	218
6	GRUCASA CATA • COSTA 202 (01)	90
7	INV MARINAS 203 SINERITA	53
8	AQUAZUL 030	117
9	BOGOTANA 072	65
10	MONTE ALTO (COQUIVACOA) 111 N6.N7	140
11	ACUATECNICA ARAPUEY 073 N6-N7	80
12	COSTA LAGO 091 N6.N7	64
13	DON SAUL 084 N6.N7	36
14	HAC SAN MATEO 079 CC02 N6.N7	11
15	INVERCIMA 092	127
16	NAVA SERRADA MACANA 094	119
17	MATAPALITO 083	132
18	ANTARTICA 056	808
19	ATLANTICO 003	652
20	DESTAJO ATI-ANTICO	67
21	IMDACA 048	55
22	OPINDULCA 045	16
23	ALTAMAR OBR N7 088	50
24	HARIMARCA 070	89
25	ECO FALCON AQUAMAUROA • OCEAN MARINE 107	316
26	CIMA 053	5
27	GANADERIA DEL LAGO LA VINA 089 N6.N7	28
28	LOS CLAROS 090 CC 01	36
29	MONTE CARMELO 090 CC02	12
30	LAS PALMERAS 076 N6-N7	210
31	ING 3030 EVENT 049	28
32	ASERRADERO SAN ANDRES 080 N6	2
33	LOS CLAROS GASTRONOMIA 096 N6	24
34	LOS SOLES 098 N6	27
35	INSPECTORES 106 N4	23
36	RECO 097 N6	46
37	NEGRON SEM 150 N6.N7	12
\.


--
-- TOC entry 3357 (class 0 OID 175874)
-- Dependencies: 213
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, rol, estatus, fecha) FROM stdin;
1	TECNOLOGIA	1	2023-11-06
2	ADMINISTRADOR	1	2023-11-06
3	USUARIO	1	2023-11-06
\.


--
-- TOC entry 3362 (class 0 OID 175905)
-- Dependencies: 218
-- Data for Name: temporal_familiar_auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.temporal_familiar_auditoria (id, nombrefamiliar, apellidofamiliar, cedulafamiliar, parentesco, fecha_nacimiento_familiar, sexofamiliar, trabajafamiliar, dondetrabajafamiliar, id_usuario) FROM stdin;
3	S	S	3	S	2025-01-07	F	no	S	35
6	SILVANO	NUÑEZ	30021704	S	2025-01-07	F	no	S	35
7	S	S	30021705	C	2025-01-07	F	no	S	35
8	S	S	30021733	S	2025-01-07	F	no	S	35
10	SILVANO	NUÑEZ	30021706	PRUEBA	2025-01-07	F	no	UNA PRUEBA	35
\.


--
-- TOC entry 3359 (class 0 OID 175886)
-- Dependencies: 215
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, usuario, correo, fecha, contrasena, rol, estatus, cedula) FROM stdin;
1	tecnologia	SBSALEJANDRO427@GMAIL.COM	2024-10-27	18101810	1	1	12345678
2	YENI	YENI@GMAIL.COM	2025-01-06	26783196	2	1	26783196
3	EMILIA	EMILIA@GMAIL.COM	2025-01-06	13067073	2	1	13067073
\.


--
-- TOC entry 3372 (class 0 OID 0)
-- Dependencies: 209
-- Name: empleados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.empleados_id_seq', 13, true);


--
-- TOC entry 3373 (class 0 OID 0)
-- Dependencies: 211
-- Name: empresas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.empresas_id_seq', 1, false);


--
-- TOC entry 3374 (class 0 OID 0)
-- Dependencies: 214
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 3, true);


--
-- TOC entry 3375 (class 0 OID 0)
-- Dependencies: 217
-- Name: temporal_familiar_auditoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.temporal_familiar_auditoria_id_seq', 10, true);


--
-- TOC entry 3376 (class 0 OID 0)
-- Dependencies: 216
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 3, true);


--
-- TOC entry 3206 (class 2606 OID 175896)
-- Name: empleados empleados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empleados
    ADD CONSTRAINT empleados_pkey PRIMARY KEY (cedula);


--
-- TOC entry 3209 (class 2606 OID 175898)
-- Name: empresas empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (id);


--
-- TOC entry 3211 (class 2606 OID 175900)
-- Name: roles pk_roles; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT pk_roles PRIMARY KEY (id);


--
-- TOC entry 3213 (class 2606 OID 175902)
-- Name: usuario pk_usuario; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_usuario PRIMARY KEY (id);


--
-- TOC entry 3207 (class 1259 OID 175903)
-- Name: idx_id_empresa_emp; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_id_empresa_emp ON public.empleados USING btree (trabajafamiliar);


--
-- TOC entry 3368 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2025-01-07 23:52:03

--
-- PostgreSQL database dump complete
--

