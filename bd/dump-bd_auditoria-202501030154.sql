PGDMP     (    6                 }            bd_auditoria    14.13    14.13                 0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    175507    bd_auditoria    DATABASE     h   CREATE DATABASE bd_auditoria WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE bd_auditoria;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    3            �            1259    175526    roles    TABLE     �   CREATE TABLE public.roles (
    id integer NOT NULL,
    rol character varying(255) NOT NULL,
    estatus integer NOT NULL,
    fecha character varying(255) NOT NULL
);
    DROP TABLE public.roles;
       public         heap    postgres    false    3            �            1259    175531    roles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    3    209                       0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    210            �            1259    175574    temporal_familiar    TABLE     �  CREATE TABLE public.temporal_familiar (
    id integer NOT NULL,
    nombre character varying NOT NULL,
    apellido character varying NOT NULL,
    cedula smallint NOT NULL,
    parentesco character varying NOT NULL,
    fecha_nacimiento date NOT NULL,
    trabaja character varying NOT NULL,
    donde character varying NOT NULL,
    sexom character varying,
    sexof character varying,
    trabajano character varying,
    trabajasi character varying,
    "campoDonderabaja" character varying
);
 %   DROP TABLE public.temporal_familiar;
       public         heap    postgres    false    3            �            1259    175573    temporal_familiar_id_seq    SEQUENCE     �   CREATE SEQUENCE public.temporal_familiar_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.temporal_familiar_id_seq;
       public          postgres    false    214    3                       0    0    temporal_familiar_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.temporal_familiar_id_seq OWNED BY public.temporal_familiar.id;
          public          postgres    false    213            �            1259    175532    usuario    TABLE     M  CREATE TABLE public.usuario (
    id integer NOT NULL,
    usuario character varying(50) NOT NULL,
    correo character varying(50) NOT NULL,
    foto character varying(255) NOT NULL,
    fecha character varying(255) NOT NULL,
    contrasena character varying(255) NOT NULL,
    rol integer NOT NULL,
    estatus integer NOT NULL
);
    DROP TABLE public.usuario;
       public         heap    postgres    false    3            �            1259    175537    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    211    3                       0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    212            f           2604    175554    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209            h           2604    175577    temporal_familiar id    DEFAULT     |   ALTER TABLE ONLY public.temporal_familiar ALTER COLUMN id SET DEFAULT nextval('public.temporal_familiar_id_seq'::regclass);
 C   ALTER TABLE public.temporal_familiar ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214            g           2604    175555 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211            �          0    175526    roles 
   TABLE DATA           8   COPY public.roles (id, rol, estatus, fecha) FROM stdin;
    public          postgres    false    209   |       �          0    175574    temporal_familiar 
   TABLE DATA           �   COPY public.temporal_familiar (id, nombre, apellido, cedula, parentesco, fecha_nacimiento, trabaja, donde, sexom, sexof, trabajano, trabajasi, "campoDonderabaja") FROM stdin;
    public          postgres    false    214   �       �          0    175532    usuario 
   TABLE DATA           ]   COPY public.usuario (id, usuario, correo, foto, fecha, contrasena, rol, estatus) FROM stdin;
    public          postgres    false    211   �                  0    0    roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.roles_id_seq', 3, true);
          public          postgres    false    210            	           0    0    temporal_familiar_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.temporal_familiar_id_seq', 1, false);
          public          postgres    false    213            
           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 1, true);
          public          postgres    false    212            j           2606    175565    roles pk_roles 
   CONSTRAINT     L   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT pk_roles PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.roles DROP CONSTRAINT pk_roles;
       public            postgres    false    209            l           2606    175567    usuario pk_usuario 
   CONSTRAINT     P   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_usuario PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.usuario DROP CONSTRAINT pk_usuario;
       public            postgres    false    211            �   D   x�3�qu����w�t�4�4202�54�50�2�tt����	rt�B�4�u��W@����� ���      �      x������ � �      �   V   x�3�IM����O�L�v
v�q�r�s	�712wp�u���s���LI-NN,JO�+�K�4202�54�52�4�04 aNCNC�=... �@�     