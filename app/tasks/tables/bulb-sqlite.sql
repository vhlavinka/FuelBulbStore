create table `bulb` (
  id integer primary key not null,
  name varchar(255) unique not null,
  type_id integer not null,
  image_id integer not null,
  price real not null,
  description text not null,
  in_stock integer not null,
  foreign key(image_id) references `image`(id),
  foreign key(type_id) references `type`(id)
)
