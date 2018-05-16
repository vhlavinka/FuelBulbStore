create table `user` (
  id integer primary key not null,
  name varchar(255) unique not null,
  email varchar(255) not null,
  password char(64) not null,
  is_admin bool not null
)
