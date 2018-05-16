create table `bag` (
  id integer primary key not null,
  user_id integer not null,
  made_on datetime not null,
  foreign key(user_id) references user(id)
)
