create table `item` (
  id integer auto_increment primary key not null,
  bulb_id integer not null,
  bag_id integer not null,
  amount integer not null,
  price real not null,
  foreign key(bulb_id) references bulb(id),
  foreign key(bag_id) references bag(id),
  unique(bulb_id,bag_id)
)
