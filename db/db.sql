--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = true;

--
-- Name: gamedetails; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gamedetails (
    moveid bigint NOT NULL,
    gameid bigint NOT NULL,
    moveby integer NOT NULL,
    colnum integer NOT NULL,
    movetime_utc timestamp without time zone NOT NULL,
    movetime timestamp without time zone NOT NULL
);


ALTER TABLE public.gamedetails OWNER TO postgres;

--
-- Name: COLUMN gamedetails.moveby; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN gamedetails.moveby IS '1 - RED
2 - BLACK';


--
-- Name: COLUMN gamedetails.colnum; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN gamedetails.colnum IS '0 to 6 starting from the left most column';


--
-- Name: gamedetails_moveid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gamedetails_moveid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gamedetails_moveid_seq OWNER TO postgres;

--
-- Name: gamedetails_moveid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gamedetails_moveid_seq OWNED BY gamedetails.moveid;


--
-- Name: gamesplayed; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE gamesplayed (
    gameid bigint NOT NULL,
    redplayer bigint DEFAULT 0 NOT NULL,
    blackplayer bigint DEFAULT 0 NOT NULL,
    islocal boolean DEFAULT false NOT NULL,
    gamestatus integer DEFAULT 0 NOT NULL,
    gamestarted_utc timestamp without time zone NOT NULL,
    gamestarted timestamp without time zone NOT NULL,
    gameended_utc timestamp without time zone NOT NULL,
    gameended timestamp without time zone NOT NULL
);


ALTER TABLE public.gamesplayed OWNER TO postgres;

--
-- Name: COLUMN gamesplayed.gamestatus; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN gamesplayed.gamestatus IS '0 - still playing
1 - abbandoned by red
2 - abbandoned by black
3 - tie
4 - win by red
5 - win by black';


--
-- Name: gamesplayed_gameid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE gamesplayed_gameid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gamesplayed_gameid_seq OWNER TO postgres;

--
-- Name: gamesplayed_gameid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE gamesplayed_gameid_seq OWNED BY gamesplayed.gameid;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    userid bigint NOT NULL,
    email character varying NOT NULL,
    pword character varying NOT NULL,
    datecreated_utc timestamp without time zone NOT NULL,
    datecreated timestamp without time zone NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_userid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_userid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_userid_seq OWNER TO postgres;

--
-- Name: users_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_userid_seq OWNED BY users.userid;


--
-- Name: userstatus; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE userstatus (
    userid bigint NOT NULL,
    status integer DEFAULT 0 NOT NULL,
    lastupdate_utc timestamp without time zone NOT NULL,
    lastupdate timestamp without time zone NOT NULL
);


ALTER TABLE public.userstatus OWNER TO postgres;

--
-- Name: COLUMN userstatus.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN userstatus.status IS '0 - idle
1 - playing with computer
2 - playing with a local friend
3 - playing with remote friend';


--
-- Name: moveid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gamedetails ALTER COLUMN moveid SET DEFAULT nextval('gamedetails_moveid_seq'::regclass);


--
-- Name: gameid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gamesplayed ALTER COLUMN gameid SET DEFAULT nextval('gamesplayed_gameid_seq'::regclass);


--
-- Name: userid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN userid SET DEFAULT nextval('users_userid_seq'::regclass);


--
-- Name: gamedetails_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gamedetails
    ADD CONSTRAINT gamedetails_pk PRIMARY KEY (moveid);


--
-- Name: gamesplayed_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gamesplayed
    ADD CONSTRAINT gamesplayed_pk PRIMARY KEY (gameid);


--
-- Name: users_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pk PRIMARY KEY (userid);


--
-- Name: users_unq; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_unq UNIQUE (email);


--
-- Name: userstatus_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY userstatus
    ADD CONSTRAINT userstatus_pk PRIMARY KEY (userid);


--
-- Name: gamedetails_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY gamedetails
    ADD CONSTRAINT gamedetails_fk FOREIGN KEY (gameid) REFERENCES gamesplayed(gameid) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: userstatus_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY userstatus
    ADD CONSTRAINT userstatus_fk FOREIGN KEY (userid) REFERENCES users(userid) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

