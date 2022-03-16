DROP TABLE ANALYTICS;
DROP TABLE COMMENT;
DROP TABLE CONTACT_DETAILS;
DROP TABLE KEYWORDS;
DROP TABLE LIKES;
DROP TABLE POST;
DROP TABLE PRESET_KEYWORD;
DROP TABLE PRODUCT;
DROP TABLE USER;
DROP TABLE VENDOR_DETAILS;
DROP TABLE IMAGES;
DROP TABLE BANNER;
DROP TABLE HASHTAG_LIST;
DROP TABLE HASHTAGS;


CREATE TABLE IF NOT EXISTS POST(
	seqid  			INT 	     NOT NULL,
    post_id         VARCHAR(50)  NOT NULL,
	title			VARCHAR(300) NOT NULL,
	reference_user 	INT			 NOT NULL,
	description     TEXT   		 NOT NULL,
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS COMMENT(
	seqid  			INT          NOT NULL,
    reference_post  INT  		 NOT NULL,
	sender_id     	INT          NOT NULL,
	content       	VARCHAR(500) NOT NULL,
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS LIKES(
	seqid	  		    INT 	 NOT NULL,
    reference_user      INT      NOT NULL,
	reference_post   	INT,
	reference_product   INT,
	created_at 			DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at			DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS USER(
	seqid	  		INT	         NOT NULL,
    email			VARCHAR(100) NOT NULL,
	name			TINYTEXT 	 NOT NULL,
	password		VARCHAR(60)  NOT NULL,
	type			VARCHAR(10)  NOT NULL,
	address			MEDIUMTEXT,
	referral_code   VARCHAR(10),
	create_date 	TIMESTAMP,
	profile_photo 	LONGBLOB,
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS VENDOR_DETAILS(
	seqid INT NOT NULL,
	reference_user INT NOT NULL,
	category VARCHAR(100),
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS KEYWORDS(
	seqid 						INT NOT NULL,
	reference_vendor_details 	INT NOT NULL,
	keyword 					VARCHAR(100),
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS PRESET_KEYWORD(
	seqid INT NOT NULL,
	keyword VARCHAR(100),
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

INSERT INTO PRESET_KEYWORD (seqid, keyword) VALUES
(1, 'Beauty and Lifestyle'),
(2, 'Cars and Automotive'),
(3, 'Computer and Electronics'),
(4, 'Construction and Engineering'),
(5, 'Education'),
(6, 'Entertainment'),
(7, 'Fashion and Accessories'),
(8, 'Finance and Legal'),
(9, 'Food and Dining'),
(10, 'Healthcare and Medication'),
(11, 'Home and Living'),
(12, 'Logistics and Transportation'),
(13, 'Pet Supplies and Grooming'),
(14, 'Real Estate and Property'),
(15, 'Retail Store, Services'),
(16, 'Sport and Hobbies'),
(17, 'Travel and Leisure');

CREATE TABLE IF NOT EXISTS CONTACT_DETAILS(
	seqid	  		INT 	     NOT NULL,
	reference_user 	INT  	     NOT NULL,
	facebook		VARCHAR(200),
	instagram		VARCHAR(200),
	whatsapp		VARCHAR(200),
	website			VARCHAR(200),
	tel				VARCHAR(30),
	created_at 		DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS PRODUCT(
	seqid  			 INT 		   NOT NULL,
    product_id       VARCHAR(50)   NOT NULL,
	reference_user   INT		   NOT NULL,
	reference_image	 INT 		   NOT NULL,
	price			 DECIMAL(18,2) NOT NULL,
	name      	  	 INT           NOT NULL,
	description      VARCHAR(500)  NOT NULL,
	created_at 		 DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		 DATETIME	   NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS BANNER(
	seqid			 INT 	 	 NOT NULL,
	banner_id		 VARCHAR(50) NOT NULL,
	reference_image  INT 		 NOT NULL,
	reference_user   INT 		 NOT NULL,
 	created_at 		 DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
 	updated_at		 DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS ANALYTICS(
	seqid				INT		NOT NULL,
	analytics_id		VARCHAR(50) NOT NULL,
	reference_user		INT		NOT NULL,
	banner_clicks		INT		NOT NULL,
	profile_visits		INT		NOT NULL,
	posts_visits		INT		NOT NULL,
	facebook_clicks 	INT		NOT NULL,
	whatsapp_clicks		INT		NOT NULL,
	instagram_clicks	INT		NOT NULL,
	website_clicks		INT		NOT NULL,
	created_at 			DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at			DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS IMAGES(
	seqid 		INT 		NOT NULL,
	source 		MEDIUMBLOB 	NOT NULL,
	created_at 	DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at	DATETIME	NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS HASHTAGS(
	seqid		INT 		 NOT NULL,
	tag_name 	VARCHAR(500) NOT NULL,
	created_at 	DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at	DATETIME	 NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS HASHTAG_LIST(
	seqid 			   INT		NOT NULL,
	reference_hashtags INT      NOT NULL,
	reference_post     INT,
	reference_product  INT,
	created_at 		   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at		   DATETIME	NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(seqid)
);