PGDMP  	    )                 }            bd_auditoria    14.13    16.4 %    %           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            &           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            '           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            (           1262    175843    bd_auditoria    DATABASE        CREATE DATABASE bd_auditoria WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE bd_auditoria;
                postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                postgres    false            )           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    4            �            1259    175844    empleados_id_seq    SEQUENCE     y   CREATE SEQUENCE public.empleados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.empleados_id_seq;
       public          postgres    false    4            �            1259    175845 	   empleados    TABLE     ?  CREATE TABLE public.empleados (
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
    DROP TABLE public.empleados;
       public         heap    postgres    false    209    4            �            1259    175867    empresas_id_seq    SEQUENCE     x   CREATE SEQUENCE public.empresas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.empresas_id_seq;
       public          postgres    false    4            �            1259    175868    empresas    TABLE     �   CREATE TABLE public.empresas (
    id integer DEFAULT nextval('public.empresas_id_seq'::regclass) NOT NULL,
    nombre_empresa character varying(255),
    cant_empleados_actual character varying(255)
);
    DROP TABLE public.empresas;
       public         heap    postgres    false    211    4            �            1259    175874    roles    TABLE     �   CREATE TABLE public.roles (
    id integer NOT NULL,
    rol character varying(255) NOT NULL,
    estatus integer NOT NULL,
    fecha character varying(255) NOT NULL
);
    DROP TABLE public.roles;
       public         heap    postgres    false    4            �            1259    175879    roles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    4    213            *           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    214            �            1259    175905    temporal_familiar_auditoria    TABLE     �  CREATE TABLE public.temporal_familiar_auditoria (
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
 /   DROP TABLE public.temporal_familiar_auditoria;
       public         heap    postgres    false    4            �            1259    175904 "   temporal_familiar_auditoria_id_seq    SEQUENCE     �   CREATE SEQUENCE public.temporal_familiar_auditoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.temporal_familiar_auditoria_id_seq;
       public          postgres    false    4    218            +           0    0 "   temporal_familiar_auditoria_id_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.temporal_familiar_auditoria_id_seq OWNED BY public.temporal_familiar_auditoria.id;
          public          postgres    false    217            �            1259    175886    usuario    TABLE     7  CREATE TABLE public.usuario (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    correo character varying(50) NOT NULL,
    fecha character varying(255) NOT NULL,
    contrasena character varying(255) NOT NULL,
    rol integer NOT NULL,
    estatus integer NOT NULL,
    cedula integer
);
    DROP TABLE public.usuario;
       public         heap    postgres    false    4            �            1259    175891    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    215    4            ,           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    216            �           2604    175892    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    213            �           2604    175908    temporal_familiar_auditoria id    DEFAULT     �   ALTER TABLE ONLY public.temporal_familiar_auditoria ALTER COLUMN id SET DEFAULT nextval('public.temporal_familiar_auditoria_id_seq'::regclass);
 M   ALTER TABLE public.temporal_familiar_auditoria ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            �           2604    175894 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215                      0    175845 	   empleados 
   TABLE DATA              COPY public.empleados (id, cedula, nombre, apellido, cotiza, sexo, estado_civil, fecha_nacimiento, edad, nacionalidad, carga_familiar, zurdo, peso, camisa, chaqueta, falto, falda, pantalon, braga, bata, zapato, certificadosalud, tipo_propiedad, desc_tipo_propiedad, urbanizacion, ciudad, ubicacion, telefonohabitacion, telefonocelular, otrotelefono, email, grado, institucion, localidad, especialidad, ultimo_a, graduado, estudiando, institucion_actual, carrera_actual, especialidad_actual, horario_inicio, horario_fin, fecha_desde, fecha_hasta, postgrado, tipopostgrado, especificaciones, tipojornada, realizariaguardia, horarioguardia, idioma, nombrefamiliar, apellidofamiliar, cedulafamiliar, parentesco, fecha_nacimiento_familiar, sexofamiliar, trabajafamiliar, vehiculo, licencia, marca, modelo, anio, placa, color, fechavencimientosalud, estatura, direccionhabitacion, avenida, conjunto_residencial, edificio, casa, quinta, piso, departamento, tipoguardia, hablar, leer, escribir, nivel, dondetrabajafamiliar, id_empresa, fecha_registro) FROM stdin;
    public          postgres    false    210   �:                 0    175868    empresas 
   TABLE DATA           M   COPY public.empresas (id, nombre_empresa, cant_empleados_actual) FROM stdin;
    public          postgres    false    212   �?                 0    175874    roles 
   TABLE DATA           8   COPY public.roles (id, rol, estatus, fecha) FROM stdin;
    public          postgres    false    213   "B       "          0    175905    temporal_familiar_auditoria 
   TABLE DATA           �   COPY public.temporal_familiar_auditoria (id, nombrefamiliar, apellidofamiliar, cedulafamiliar, parentesco, fecha_nacimiento_familiar, sexofamiliar, trabajafamiliar, dondetrabajafamiliar, id_usuario) FROM stdin;
    public          postgres    false    218   uB                 0    175886    usuario 
   TABLE DATA           _   COPY public.usuario (id, usuario, correo, fecha, contrasena, rol, estatus, cedula) FROM stdin;
    public          postgres    false    215   �E       -           0    0    empleados_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.empleados_id_seq', 13, true);
          public          postgres    false    209            .           0    0    empresas_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.empresas_id_seq', 1, false);
          public          postgres    false    211            /           0    0    roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.roles_id_seq', 3, true);
          public          postgres    false    214            0           0    0 "   temporal_familiar_auditoria_id_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.temporal_familiar_auditoria_id_seq', 169, true);
          public          postgres    false    217            1           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 3, true);
          public          postgres    false    216            �           2606    175896    empleados empleados_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.empleados
    ADD CONSTRAINT empleados_pkey PRIMARY KEY (cedula);
 B   ALTER TABLE ONLY public.empleados DROP CONSTRAINT empleados_pkey;
       public            postgres    false    210            �           2606    175898    empresas empresas_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.empresas
    ADD CONSTRAINT empresas_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.empresas DROP CONSTRAINT empresas_pkey;
       public            postgres    false    212            �           2606    175900    roles pk_roles 
   CONSTRAINT     L   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT pk_roles PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.roles DROP CONSTRAINT pk_roles;
       public            postgres    false    213            �           2606    175902    usuario pk_usuario 
   CONSTRAINT     P   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_usuario PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.usuario DROP CONSTRAINT pk_usuario;
       public            postgres    false    215            �           1259    175903    idx_id_empresa_emp    INDEX     S   CREATE INDEX idx_id_empresa_emp ON public.empleados USING btree (trabajafamiliar);
 &   DROP INDEX public.idx_id_empresa_emp;
       public            postgres    false    210               �  x��V�r�8�}�}�t�Uo��f'q:M�3��� �n�}�>C^l���%��a4��~�s�1���\\]������������P8�LN��zaďNhN�������:�C+n\A�iY冸P2�(K�(f�iQ���ܢ5?�?��(ŷ�E���,H�MJ�X鴪�7���{�Ю�7ܕ��
OK_o� ��Ax�z�2I��wA��J�M�,��/n����C���9���>'���·2�|J�ߙ������A;���~v��x��)y�W ͦhZ*�����D�7"�E�s^�T�\sKZK���KV,:� (|���$8��'S`�L��������Qf'1EшYF�k@�>ά��8�6kQIZ�W�)baD,
"JX�`��5oK���ȶ~aΝ�(J�MO�Ji��+�6ŁW�%�v$^�~���2�N?ƗX���g�50�U�oF��Q�%�� ���wo2ڛ�#9H!VT�¶J��^�R!ʵ�V��VSÃ�@�f�w�m�*#�Q�.�3�����J��ɟ�$�ei�$S:��t���hawA�����/��"�kY7]�ж���:J�SQ�&,�,I�8�M9/�Fk�#U��? ����U,��³�!��<LS&7����?a��O��U�P�J��x{���6p\*K.��6|��wY	;����6�����e�S �,�X0�"8�"�z�D{w�d�W��e^�nv��p�K��lE�C�pe7;*&T����<�l�+!�}Ey�bƢ�BR�����g�?g^Q�����CE�O�/'��R#�
�C4^$�{�/,�p6���K+aho��q�B���mĪ���Hkaa_�������W␰���Oj�����1	���;Y�a�:����k�`�߷LR9ī{�&�6�3��'<�IB�tטW�[�����|L��ã��8��?�'�>~����:��q�l�_��K��kI#�U���ފ���ʗIS�Jl)EkM�%QJA�Hv�xO �Z���-
d_w嶤��a��Z�� 9NU'��{9#�(Dk(�>��(E��$_�J��$J�Xؼ�'�m^��1z�5���#-	1�͛��f�{����o�7Wg�����啷��`:1�M��ށ�;�V�9�7a�Mb!�Ǯ&�M\��ܔ�ea2b����w�}�o��%�4�G�Ѽ���,�wI��;#<��xB�� ��㜽�K܎�������?��U�         v  x�MSKn�0]O�e�H��$��1�8*(ҡ$	z��g��z�>JЍMh��}�i��ā���$_k��S-�ĕ���04�,+/�]~������%�	K��be��H� :J���KL3�n5��{r�=�Ŵ�9��.�VjZ������@׺^�����d��OJ?�W�a���ZQ�r�s����[1���'��"���t)ײqn�z���%'0z
�c��
?K����kv�;%�&;o1��r��?1�����s���&�w��	mWnیݣ`�;z���t�9/C ���Z�ь5�����qB���r����h-ߡ�����7N�S�%m�А$o\�FA�����[��9 �,d1�(�"��(����Ҁ0h���Fu#��0��m�Ӟ�o=2#�%��0F�K��a��0�m���N���)��7N
5��k9=/!���(��dm�@��%,��
�|g9�t��X�[���J�Q��RA0m�)���T��`�#�+b[U���O4�\�rt����JXH���"e2�c� �o�YC|��f1�F�
����������\��9�����%�N?���-�-����Zߑ��T��ʻ�s��r��F��"u���e��W!�?}E�j         C   x�3�qu����w�t�4�4202�54�50�2�tt����	rt�B�4�u��G����� ��      "   f  x���Mn�0���)z��u�"�l��Ƶ��@�Qb�U�ЋuHɩ����y�H�q�8�Q_?N�㓺{�����rZ[�i��AYmÍ67:�/������N�?f�U3���X��a/>ί����������,��A����r����p<�/�χ�<@�~��t��G��3��e$�sz1�W�^�i^k��Gd���5P��ˈ�\�s+���n����p�����ؒ��i��v�P�ǌ�+31�n���g?mO	� ����0="���d�w$]&������D�D��x+��G!:H$H��Z��z�S��
f�av��a~�aq֩��4��vH��DW�	\X&Ε�2Q.�L�K(��ķ�V�]NQ�)U���t�_��9��؎Ւ�	-U�N��J����s�j����$$zDtF=����p}��	z(�]��[7
E�@@��^���@mc�E��~X)VR�Sa!1���豽����q��4@B�\����g�g��=�<������D����F7�Mj�b��="�~7T��h��Qp��<��"]��'���-, �^8��{�x+@qr`?�P � � _Z���Ф�G�W���Qҥՙ/��y/��j�d�}�/P���ʝ_뤥������W�_��������e !���Z� L�i�l��+���\+��Lt�S+�2з���AߊԬ�5����B�L p�3v�zz6p���%zq��I�`<\�v)�v)�v)�L���XH/Mwtu[�E�������n�X����n���b|ߘ���0P`�r�*b7�C
�K��C0��`��%з�o�7��?����         �   x�m��
�0��ɻt$i�Λ������EDd ���c7�A��������kzN��
C;���۟z#n{�>�j�g���8��i^�yD�ںΡ����jE�Ȃ�/͛R��j9���_eM֑Ӌ�^*D� �K(�     