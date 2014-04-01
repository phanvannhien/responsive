
-- ----------------------------------
-- Table S?n ph?m
-- ----------------------------------
create table gl_product(
    product_id int not null primary key auto_increment,
    product_sku char(50),
    product_name varchar(100),
    product_img varchar(100),
    product_sort_des varchar(255),
    product_des mediumtext,
    manufacture_id int(5),
    product_price double,
    published int(1) default '1',
    category_id int(5),
    user_id int,
    bonus_point int
);

-- ----------------------------------
-- Table Danh m?c
-- ----------------------------------
create table gl_categories(
    category_id int (5) not null primary key auto_increment,
    category_slug varchar(255),
    category_name varchar(255) not null,
    category_img varchar(255),
    parent_id int(5) default '1',
    category_des varchar(5000)    
);
-- ----------------------------------
-- Table Nh�m Thu?c t�nh
-- ----------------------------------
create table gl_group_abtribute(
    group_abtribute_id int(5) not null auto_increment primary key,
    group_abtribute_name varchar(255) not null
);
-- ----------------------------------
-- Table Thu?c t�nh
-- ----------------------------------
create table gl_abtribute(
    group_id int(5) not null auto_increment primary key,
    group_abtribute_id int(5) not null,
    type_abtribute varchar(50),
    group_abtribute_name varchar(255)
);

-- ----------------------------------
-- Table Thu?c t�nh - s?n ph?m
-- ----------------------------------

create table gl_abtribute_product(
    group_abtribute_id int(5) not null,
    product_id int(5) not null,
    abstribute_value varchar(50),
    percent int(3) default'0'
);

-- ----------------------------------
-- Table Nh� cung c?p
-- ----------------------------------

create table gl_manufacture(
    manufacture_id int(5) not null primary key auto_increment,
    manufacture_name varchar(255),
    manufacture_add varchar(255),
    manufacture_phone varchar(255),
    manufacture_email varchar(255),
    manufacture_website varchar(255),
    manufacture_taxcode varchar(50)
);
-- ----------------------------------
-- Ngu?i d�ng - kh�ch h�ng - admin
-- ----------------------------------
create table gl_user(
    user_id int(10) primary key auto_increment,
    user_name varchar(100) not null,
    user_pass varchar(50) not null,
    level_id int(5),
    user_email varchar(100),
    user_phone varchar(15),
    user_address varchar(255),
    published int(1) default '0'
);
-- ----------------------------------
-- Table khu v?c
-- ----------------------------------
create table gl_location(
    location_id int(5) primary key auto_increment,
    location_name varchar(100)
);
-- ----------------------------------
-- Table User Level
-- ----------------------------------
create table gl_level(
    level_id int(5) primary key auto_increment,
    level_name varchar(100)
);
-- ----------------------------------
-- Table Pakage
-- ----------------------------------
create table gl_pakage(
    pakage_id int(5) primary key auto_increment,
    pakage_name varchar(255),
    pakage_key varchar(50),
    pakage_abtribute_name varchar(200),
    pakage_value varchar(255)
);
-- ----------------------------------
-- Table Ngu?i d�ng dang k� g�i
-- ----------------------------------
create table gl_user_pakage(
    user_id int(5) not null primary key auto_increment,
    pakage_id int(5),
    date_reg datetime,
    published int(1) default '1'
);

-- ----------------------------------
-- Table Shop ngu?i d�ng
-- ----------------------------------
create table gl_shop(
    user_id int(5) not null primary key auto_increment,
    shop_name varchar(100),
    shop_logo varchar(100),
    shop_address varchar(255),
    shop_yahoo varchar(255),
    shop_face varchar(255),
    location_id int(50)
    
);
-- ----------------------------------
-- Table h�nh th?c thanh to�n
-- ----------------------------------
create table gl_payment_type(
    payment_id int(5) not null primary key auto_increment,
	payment_name varchar(100)
);
-- ----------------------------------
-- Table shipping
-- ----------------------------------
create table gl_shipping(
    shipping_id int(5) not null primary key auto_increment,
	shipping_name varchar(100),
	shipping_charges double
);
-- ----------------------------------
-- Table H�ng s?n xu?t
-- ----------------------------------

-- ----------------------------------
-- Table Album H�nh
-- ----------------------------------
create table gl_album_photo(
	album_id int not null primary key auto_increment,
	product_id int,
	album_photo varchar(100)
);

-- ----------------------------------
-- Table Album H�a don
-- ----------------------------------
create table gl_bill(
	bill_id int not null primary key auto_increment,
	bill_order_date datetime,
	payment_id int,
	shipping_id int,
	user_id int,
	require_user varchar(100),
	payment_abtribute_id int
);

-- ----------------------------------
-- Table Album T�nh tr?ng h�a don
-- ----------------------------------
create table gl_bill_status(
	bill_status_id int not null primary key auto_increment,
	bill_status_name varchar(100)	
);

-- ----------------------------------
-- Table Album Chi ti?t h�a don
-- ----------------------------------
create table gl_bill_detail(
	bill_id int not null primary key auto_increment,
	product_id int,
	product_amount double,
	product_price double
);

-- ----------------------------------
-- Table Voucher
-- ----------------------------------
create table gl_voucher(
	voucher_id int not null primary key auto_increment,
	voucher_sale_off_percent double,
	user_id int,
	voucher_name varchar(100)
);

-- ----------------------------------
-- Table Album S?n ph?m Voucher
-- ----------------------------------
create table gl_voucher_product(
	product_id int not null primary key auto_increment,
	voucher_id int,
	user_id int,
	date_start datetime,
	date_end datetime
);
-- ----------------------------------
-- Table Album Shopper
-- ----------------------------------
create table gl_shoper(
	user_id int not null primary key auto_increment,
	shop_name varchar(100),
	shop_logo varchar(100),
	shop_address varchar(100),
	shop_yahoo varchar(100),
	shop_skype varchar(100),
	shop_face varchar(100),
	shop_googleplus varchar(100)
	
);
