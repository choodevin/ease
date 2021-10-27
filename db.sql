CREATE TABLE IF NOT EXISTS POST(
	seqid  			INT 	     NOT NULL,
    post_id         VARCHAR(50)  NOT NULL,
	title			VARCHAR(300) NOT NULL,
	description     TEXT   		 NOT NULL,
	creation_time 	DATETIME     NOT NULL,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS COMMENT(
	seqid  			INT         NOT NULL,
    reference_post  INT  		 NOT NULL,
	sender_id     	INT         NOT NULL,
	content       	VARCHAR(500) NOT NULL,
	creation_time   DATETIME 	 NOT NULL,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS LIKES(
	seqid	  		    INT 	  NOT NULL,
    reference_user      INT      NOT NULL,
	reference_post   	INT      NOT NULL,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS USER(
	seqid	  		INT	     NOT NULL,
    email			VARCHAR(100) NOT NULL,
	name			TINYTEXT 	 NOT NULL,
	password		VARCHAR(30)  NOT NULL,
	type			VARCHAR(10)  NOT NULL,
	address			MEDIUMTEXT,
	referral_code   VARCHAR(10),
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS CONTACT_DETAILS(
	seqid	  		INT 	     NOT NULL,
	reference_user 	INT  	     NOT NULL,
	facebook		VARCHAR(200),
	instagram		VARCHAR(200),
	whatsapp		VARCHAR(200),
	website			VARCHAR(200),
	tel				VARCHAR(30),
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS PRODUCT(
	seqid  			INT 		 NOT NULL,
    product_id      VARCHAR(50)  NOT NULL,
	name      	  	INT         NOT NULL,
	description     VARCHAR(500) NOT NULL,
	image			VARCHAR(500) NOT NULL,
	creation_time   DATETIME     NOT NULL,
	PRIMARY KEY(seqid)
);

CREATE TABLE IF NOT EXISTS BANNER(
	seqid			INT NOT NULL,
	banner_id		VARCHAR(50) NOT NULL,
	/*TBC*/
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
	PRIMARY KEY(seqid)
);
