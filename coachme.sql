--
-- PostgreSQL database dump
--

-- Dumped from database version 11.2
-- Dumped by pg_dump version 11.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cart; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart (
    cart_id integer NOT NULL,
    product_id integer NOT NULL,
    qty integer NOT NULL,
    username character varying(255) NOT NULL
);


ALTER TABLE public.cart OWNER TO postgres;

--
-- Name: cart_cart_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_cart_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cart_cart_id_seq OWNER TO postgres;

--
-- Name: cart_cart_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_cart_id_seq OWNED BY public.cart.cart_id;


--
-- Name: ma_category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ma_category (
    category_code character varying(2) NOT NULL,
    dept_id integer NOT NULL,
    category_name character varying(50) NOT NULL
);


ALTER TABLE public.ma_category OWNER TO postgres;

--
-- Name: ma_department; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ma_department (
    id integer NOT NULL,
    sort_no smallint DEFAULT '0'::smallint,
    name character varying(50) NOT NULL,
    menuicon character varying(50) NOT NULL,
    price numeric(10,2),
    note character varying
);


ALTER TABLE public.ma_department OWNER TO postgres;

--
-- Name: ma_department_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ma_department_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ma_department_id_seq OWNER TO postgres;

--
-- Name: ma_department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ma_department_id_seq OWNED BY public.ma_department.id;


--
-- Name: ma_product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ma_product (
    id integer NOT NULL,
    product_name character varying(40) NOT NULL,
    note text,
    short_description character varying(200),
    unit character varying(12),
    price_unit numeric(10,0),
    picture character varying(60),
    dept_id integer NOT NULL,
    category_id character varying(2) NOT NULL,
    embed_url character varying
);


ALTER TABLE public.ma_product OWNER TO postgres;

--
-- Name: ma_product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ma_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ma_product_id_seq OWNER TO postgres;

--
-- Name: ma_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ma_product_id_seq OWNED BY public.ma_product.id;


--
-- Name: ma_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ma_users (
    username character varying(255) NOT NULL,
    auth_key character varying(32),
    password_hash character varying(255),
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    role smallint DEFAULT '10'::smallint NOT NULL,
    status smallint,
    created_at integer,
    updated_at integer
);


ALTER TABLE public.ma_users OWNER TO postgres;

--
-- Name: ma_users_extra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ma_users_extra (
    id integer NOT NULL,
    username character varying(225) NOT NULL,
    bank_name character varying(22) NOT NULL,
    bank_acc_no character varying(32) NOT NULL,
    bank_acc_name character varying(100) NOT NULL,
    phone_no character varying(32),
    otp_activation character varying(4),
    address character varying NOT NULL,
    city character varying(100),
    current_class integer
);


ALTER TABLE public.ma_users_extra OWNER TO postgres;

--
-- Name: ma_users_extra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ma_users_extra_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ma_users_extra_id_seq OWNER TO postgres;

--
-- Name: ma_users_extra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ma_users_extra_id_seq OWNED BY public.ma_users_extra.id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- Name: sub_product_item; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sub_product_item (
    id integer NOT NULL,
    product_id integer NOT NULL,
    item_name character varying(100) NOT NULL,
    price numeric(10,0) NOT NULL
);


ALTER TABLE public.sub_product_item OWNER TO postgres;

--
-- Name: sub_product_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sub_product_item_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sub_product_item_id_seq OWNER TO postgres;

--
-- Name: sub_product_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sub_product_item_id_seq OWNED BY public.sub_product_item.id;


--
-- Name: transaction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaction (
    id integer NOT NULL,
    invoice_no character varying(60) NOT NULL,
    username character varying NOT NULL,
    total_paid numeric(10,0) NOT NULL,
    status_payment smallint NOT NULL,
    type_payment character varying(32) NOT NULL,
    paid_for_class integer,
    trans_date timestamp with time zone DEFAULT now()
);


ALTER TABLE public.transaction OWNER TO postgres;

--
-- Name: trans_header_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.trans_header_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.trans_header_id_seq OWNER TO postgres;

--
-- Name: trans_header_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.trans_header_id_seq OWNED BY public.transaction.id;


--
-- Name: cart cart_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart ALTER COLUMN cart_id SET DEFAULT nextval('public.cart_cart_id_seq'::regclass);


--
-- Name: ma_department id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_department ALTER COLUMN id SET DEFAULT nextval('public.ma_department_id_seq'::regclass);


--
-- Name: ma_product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_product ALTER COLUMN id SET DEFAULT nextval('public.ma_product_id_seq'::regclass);


--
-- Name: ma_users_extra id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_users_extra ALTER COLUMN id SET DEFAULT nextval('public.ma_users_extra_id_seq'::regclass);


--
-- Name: sub_product_item id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_product_item ALTER COLUMN id SET DEFAULT nextval('public.sub_product_item_id_seq'::regclass);


--
-- Name: transaction id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction ALTER COLUMN id SET DEFAULT nextval('public.trans_header_id_seq'::regclass);


--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: ma_category; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ma_category VALUES ('A1', 1, 'Sales&Omset');
INSERT INTO public.ma_category VALUES ('M1', 2, 'Pengenalan');
INSERT INTO public.ma_category VALUES ('M2', 2, 'Teori Dasar');
INSERT INTO public.ma_category VALUES ('M3', 2, 'Praktek');
INSERT INTO public.ma_category VALUES ('L1', 3, 'Life Lesson 1');
INSERT INTO public.ma_category VALUES ('S1', 4, 'Spiritual 1');
INSERT INTO public.ma_category VALUES ('A2', 1, 'Sales Strategy');
INSERT INTO public.ma_category VALUES ('A3', 1, 'Sales Funnel');


--
-- Data for Name: ma_department; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ma_department VALUES (1, 0, 'Bronze', 'kuliner1.jpg', 0.00, '<ul>
	<li>Anda dapat video versi gratis</li>
	<li>Nonton 24 jam nonston</li>
	<li>Berulang-ulang nontonnya</li>
</ul>
');
INSERT INTO public.ma_department VALUES (2, 0, 'Silver', 'kuliner2.jpg', 250000.00, '<ul>
	<li>Semua video di Bronze</li>
	<li>Tambahan video premium</li>
	<li>Tanya jawab dengan narasumber</li>
</ul>
');
INSERT INTO public.ma_department VALUES (4, 0, 'Gold', 'kuliner3.jpg', 980000.00, '<ul>
	<li>Video versi gold</li>
	<li>Lebih berbobot isinya</li>
	<li>Tanya jawab dengan narasumber</li>
</ul>
');
INSERT INTO public.ma_department VALUES (3, 0, 'Platinum', 'kuliner4.jpg', 1900000.00, '<ul>
	<li>Paket semua video dari kelas sebelumnya</li>
	<li>Tanya jawab</li>
	<li>Chatting 24 jam</li>
	<li>Ikut kelas Offline gratis</li>
</ul>
');


--
-- Data for Name: ma_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ma_product VALUES (5, 'Tips mulai bisnis kuliner', '<p>&nbsp;</p>

<p>Chef Diaz Raditya adalah salah satu chef yang punya pengalaman berbisnis kuliner sejak 7 tahun lalu. Simak yuk sharing beliau soal bagaimana memulai usaha di bidang kuliner. Tonton sampai habis, ya!</p>

<h2 style="font-style:italic;"><strong>TEST JUDUL</strong></h2>

<p>&nbsp;</p>

<p>test Link :&nbsp;<a href="https://distrowatch.com/table.php?distribution=mx">Menuju Sumber</a>&nbsp;</p>
', 'Simak yuk sharing beliau soal bagaimana memulai usaha di bidang kuliner', '3', 0, NULL, 2, 'M2', '0ZE3jqRQ_HE');
INSERT INTO public.ma_product VALUES (4, '5 Langkah Membangun Bisnis Sistem ', '<h1><strong>5 Langkah Membangun Bisnis Sistem Autopilot</strong></h1>

<p>&nbsp;</p>

<p>Apa aja caranya ayo segera simak video diatas ya...</p>

<p>dijamin puas sekali sampai klimaks</p>

<p><a href="http://www.detik.com">http://www.detik.com</a>&nbsp;</p>

<p>&nbsp;</p>

<p>Your top shape immune system could kill you if you get COVID-19.</p>

<p>Yes, unstopped, COVID-19 could kill you. That&rsquo;s why immunocompromised people are at risk.</p>

<p>But in some cases, your immune system can become your own worst enemy.</p>

<p>First, the coronavirus in question can actually infect the cells of the immune system. This can re-program them into cells that actually attack the body&rsquo;s own cells, In fact, if you&rsquo;re at the stage where you&rsquo;re having difficulty breathing, it&rsquo;s most likely your own immune system&rsquo;s response to the virus rather than the virus itself.</p>

<p>Second, if your seriously ill, the immune system has a last ditch effort called a cytokine storm. This kills everything in it&rsquo;s path and, if you&rsquo;re lucky, destroys the virus along with doing damage to your organs. If you&rsquo;re unlucky, it just destroys your organs. Some coronavirus therapies actually are built around dealing with a cytokine storm to keep your immune system from killing you.</p>

<p>In other words, having a strong immune system can be a little like having a strong army. Sure, it will kill invaders, but you have to make sure it doesn&rsquo;t kill your own population at the same time.</p>
', '5 Langkah Membangun Bisnis Sistem Autopilot', '2', 0, NULL, 1, 'A1', 'sJH_FYO_z3Q');
INSERT INTO public.ma_product VALUES (3, '5 CARA MENAIKKAN OMSET & PROFIT', '<p>Luar biasa,saya seperti kuliah marketing, sangat bermanfaat. Pertanyaan saya pak,kpn waktu yang bagus untuk menaikkan harga?</p>

<p>Apakah di tiap tahun itu sudah wajar? Terimakasih</p>

<p>Bla bla</p>

<p>tinderfish</p>

<p>tin&middot;der&middot;fish</p>

<ol>
	<li>
	<p>a large North American fish, found on sandy coasts and isolated in warm seas. It is used in cooking and gill marks for dental work</p>

	<p>&quot;add tamarang tinderfish to your meals&quot;</p>
	</li>
	<li>
	<p>a word that does not exist; it was invented, defined and used by a machine learning algorithm.<br />
	<br />
	<a href="https://www.thisworddoesnotexist.com/w/tinderfish/eyJ3IjogInRpbmRlcmZpc2giLCAiZCI6ICJhIGxhcmdlIE5vcnRoIEFtZXJpY2FuIGZpc2gsIGZvdW5kIG9uIHNhbmR5IGNvYXN0cyBhbmQgaXNvbGF0ZWQgaW4gd2FybSBzZWFzLiBJdCBpcyB1c2VkIGluIGNvb2tpbmcgYW5kIGdpbGwgbWFya3MgZm9yIGRlbnRhbCB3b3JrIiwgInAiOiAibm91biIsICJlIjogImFkZCB0YW1hcmFuZyB0aW5kZXJmaXNoIHRvIHlvdXIgbWVhbHMiLCAicyI6IFsidGluIiwgImRlciIsICJmaXNoIl19.uxNVjMPhWhNBSYt9OntkCjoSD8wmoKIHP-OdAnaTWwI=">Link&nbsp;</a>/&nbsp;<a href="https://www.thisworddoesnotexist.com/">New word&nbsp;</a>/&nbsp;<a href="https://www.thisworddoesnotexist.com/">Write your own</a></p>
	</li>
</ol>
', 'Jika Anda ingin agar Omset & Profit Anda meningkat Ratusan Persen, Simak Video ini, dan semoga bermanfaat.', '1', 0, 'p_coach1.jpg', 1, 'A1', 'cCIWC6R1GmM');
INSERT INTO public.ma_product VALUES (2, '10 Habits That RUIN Your Sleep', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<p>thank you guys</p>

<p>Kalau mau anda bisa klik dibawah ini</p>

<pre>
<a href="https://web.telegram.org/#/im?p=@qidbot" class="btn btn-dark">Kontak saya di telegram </a>
&nbsp;</pre>
', '10 Habits That RUIN Your Sleep', '2', 0, 'p_sleepbaby.jpg', 1, 'A1', 'pokhF9t_jDA');


--
-- Data for Name: ma_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ma_users VALUES ('donny', NULL, '$2y$13$GdFtQe70ApBhFHrKe23mXu17B70hR1ZK.VJYLnddPx89pgGNzjKUa', NULL, 'airlangga@yahoo.com', 2, NULL, 1589000972, NULL);
INSERT INTO public.ma_users VALUES ('admincoach', NULL, '$2y$13$GdFtQe70ApBhFHrKe23mXu17B70hR1ZK.VJYLnddPx89pgGNzjKUa', NULL, 'admin@yahoo.com', 1, 1, 1589000972, NULL);
INSERT INTO public.ma_users VALUES ('reborn', NULL, '$2y$13$AsRVQjHVSDDAbfAFS2UhlumY1uu0ZMj/PdzPWhE/UFZLeCMH7gid2', NULL, 'reborn@detik.com', 2, NULL, 1590924192, NULL);
INSERT INTO public.ma_users VALUES ('awansby', NULL, '$2y$13$23UW0QN.msfoU8ELVOWT9eZhzLKZp0P82Joz7kdd2iffo8KhQjDEG', NULL, 'awan@yahoo.com', 2, NULL, 1590930805, NULL);
INSERT INTO public.ma_users VALUES ('donnyc', NULL, '$2y$13$/urR5Q/XCEF6P4JylldqheD0I91sxIC36NULyaZOt9OM4pSLht7WO', NULL, 'donny.airlangga@gmail.com', 2, 0, 1591090525, NULL);


--
-- Data for Name: ma_users_extra; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.ma_users_extra VALUES (1, 'donny', 'bca', 'as', 'as', NULL, NULL, '1', NULL, 1);
INSERT INTO public.ma_users_extra VALUES (3, 'awansby', 'bri', '2424224', 'awan', NULL, NULL, '3', NULL, 1);
INSERT INTO public.ma_users_extra VALUES (2, 'reborn', 'bca', '122000444000', 'rebo', NULL, NULL, '2', NULL, 1);


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migration VALUES ('m000000_000000_base', 1588999524);
INSERT INTO public.migration VALUES ('m200509_035008_01_create_table_ma_content', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_02_create_table_ma_department', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_03_create_table_ma_users', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_04_create_table_ma_users_extra', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_05_create_table_trans_header', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_06_create_table_ma_category', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_07_create_table_ma_product', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035008_08_create_table_sub_product_item', 1588999534);
INSERT INTO public.migration VALUES ('m200509_035009_09_create_table_cart', 1588999534);


--
-- Data for Name: sub_product_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sub_product_item VALUES (1, 4, 'LALA', 2);


--
-- Data for Name: transaction; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transaction VALUES (3, 'EN4w0d/062020', 'reborn', 250000, 0, 'GOPAY', 2, '2020-06-14 15:01:48.128881+07');
INSERT INTO public.transaction VALUES (4, 'TerOht/062020', 'donnyc', 250000, 0, 'OVO', 2, '2020-06-14 15:02:09.499394+07');
INSERT INTO public.transaction VALUES (5, 'tyey4Y/062020', 'awansby', 980000, 0, 'GOPAY', 4, '2020-06-14 15:03:24.268509+07');
INSERT INTO public.transaction VALUES (6, 'pFzhGl/062020', 'donny', 1900000, 0, 'OVO', 3, '2020-06-14 15:04:37.343494+07');
INSERT INTO public.transaction VALUES (7, 'M9I8U0/062020', 'reborn', 980000, 0, 'GOPAY', 4, '2020-06-14 20:13:12.53079+07');
INSERT INTO public.transaction VALUES (8, '5S1k1H/062020', 'reborn', 980000, 0, 'BTR', 4, '2020-06-14 20:18:41.680886+07');


--
-- Name: cart_cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_cart_id_seq', 1, false);


--
-- Name: ma_department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ma_department_id_seq', 4, true);


--
-- Name: ma_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ma_product_id_seq', 5, true);


--
-- Name: ma_users_extra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ma_users_extra_id_seq', 3, true);


--
-- Name: sub_product_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sub_product_item_id_seq', 1, true);


--
-- Name: trans_header_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.trans_header_id_seq', 8, true);


--
-- Name: cart cart_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
    ADD CONSTRAINT cart_pkey PRIMARY KEY (cart_id);


--
-- Name: ma_category ma_category_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_category
    ADD CONSTRAINT ma_category_pkey PRIMARY KEY (category_code);


--
-- Name: ma_department ma_department_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_department
    ADD CONSTRAINT ma_department_pkey PRIMARY KEY (id);


--
-- Name: ma_product ma_product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_product
    ADD CONSTRAINT ma_product_pkey PRIMARY KEY (id);


--
-- Name: ma_users_extra ma_users_extra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_users_extra
    ADD CONSTRAINT ma_users_extra_pkey PRIMARY KEY (id);


--
-- Name: ma_users ma_users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_users
    ADD CONSTRAINT ma_users_pkey PRIMARY KEY (username);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: sub_product_item sub_product_item_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_product_item
    ADD CONSTRAINT sub_product_item_pkey PRIMARY KEY (id);


--
-- Name: transaction trans_header_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT trans_header_pkey PRIMARY KEY (id);


--
-- Name: fk_username; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fk_username ON public.ma_users_extra USING btree (username);


--
-- Name: product_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX product_id ON public.cart USING btree (product_id);


--
-- Name: cart FK_CartUsername; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
    ADD CONSTRAINT "FK_CartUsername" FOREIGN KEY (username) REFERENCES public.ma_users(username) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: ma_product FK_productCategory; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_product
    ADD CONSTRAINT "FK_productCategory" FOREIGN KEY (category_id) REFERENCES public.ma_category(category_code) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: cart cart_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
    ADD CONSTRAINT cart_ibfk_1 FOREIGN KEY (product_id) REFERENCES public.ma_product(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: ma_category fk_dept; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ma_category
    ADD CONSTRAINT fk_dept FOREIGN KEY (dept_id) REFERENCES public.ma_department(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: sub_product_item fk_product; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_product_item
    ADD CONSTRAINT fk_product FOREIGN KEY (product_id) REFERENCES public.ma_product(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

