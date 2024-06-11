create table users (
    userid   serial constraint users_pk primary key,
    email    varchar not null,
    password varchar not null,
    name     varchar not null,
    surname  varchar not null,
    location varchar
);

alter table users
    owner to docker;

create table races (
    raceid      serial constraint races_pk primary key,
    title       varchar not null,
    location    varchar  not null,
    date        varchar not null,
    price       double precision not null,
    description text,
    imageurl    text not null,
    distance    varchar
);

alter table races
    owner to docker;

create table user_race_registration (
    userid   integer not null,
    raceid   integer not null,
    finished varchar(1)
);

alter table user_race_registration
    owner to docker;

create table admins (
    adminid   integer not null constraint admins_pk primary key,
    userid    integer not null,
    privilige varchar
);

alter table admins
    owner to docker;

create table race_results (
    raceid integer not null,
    userid integer not null,
    time   varchar not null,
    place  integer not null
);

alter table race_results
    owner to docker;

