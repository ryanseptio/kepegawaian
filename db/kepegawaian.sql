--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

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
-- Name: data_sequence1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence1 OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    id integer DEFAULT nextval('public.data_sequence1'::regclass) NOT NULL,
    username character varying(15),
    password character varying(50),
    nama character varying(50),
    foto character varying(255),
    level character varying(20) NOT NULL,
    departemen character varying(50) NOT NULL,
    jabatan character varying(50) NOT NULL,
    npp character varying(20) NOT NULL
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: data_sequence2; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence2
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence2 OWNER TO postgres;

--
-- Name: data_sequence3; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence3
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence3 OWNER TO postgres;

--
-- Name: data_sequence4; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence4
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence4 OWNER TO postgres;

--
-- Name: data_sequence5; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence5
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence5 OWNER TO postgres;

--
-- Name: data_sequence6; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.data_sequence6
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_sequence6 OWNER TO postgres;

--
-- Name: departemen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departemen (
    id integer DEFAULT nextval('public.data_sequence2'::regclass) NOT NULL,
    kode character varying(10) NOT NULL,
    nama_departemen character varying(255) NOT NULL
);


ALTER TABLE public.departemen OWNER TO postgres;

--
-- Name: jabatan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jabatan (
    id integer DEFAULT nextval('public.data_sequence3'::regclass) NOT NULL,
    nama character varying(255)
);


ALTER TABLE public.jabatan OWNER TO postgres;

--
-- Name: kelamin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kelamin (
    id integer DEFAULT nextval('public.data_sequence4'::regclass) NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.kelamin OWNER TO postgres;

--
-- Name: kota; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kota (
    id integer DEFAULT nextval('public.data_sequence5'::regclass) NOT NULL,
    nama character varying(255),
    provinsi character varying(255) NOT NULL
);


ALTER TABLE public.kota OWNER TO postgres;

--
-- Name: pegawai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pegawai (
    id integer DEFAULT nextval('public.data_sequence6'::regclass) NOT NULL,
    nama character varying(50) NOT NULL,
    npp character varying(20) NOT NULL,
    telp character varying(50) NOT NULL,
    id_kota integer,
    id_kelamin integer,
    id_jabatan integer,
    status integer,
    absensi integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(100) NOT NULL,
    level character varying(20) NOT NULL,
    departemen character varying(50) NOT NULL,
    status_penilaian character varying(20) NOT NULL
);


ALTER TABLE public.pegawai OWNER TO postgres;

--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: departemen departemen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (id);


--
-- Name: jabatan jabatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (id);


--
-- Name: kelamin kelamin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kelamin
    ADD CONSTRAINT kelamin_pkey PRIMARY KEY (id);


--
-- Name: kota kota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kota
    ADD CONSTRAINT kota_pkey PRIMARY KEY (id);


--
-- Name: pegawai pegawai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pegawai
    ADD CONSTRAINT pegawai_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

