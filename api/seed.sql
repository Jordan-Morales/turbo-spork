CREATE TABLE launches (id SERIAL, likes INT, flight_number INT, mission_name VARCHAR(64), site_name_long VARCHAR(128), launch_date_local VARCHAR(32), notes VARCHAR(256));


INSERT INTO launches (
likes, flight_number, notes
) VALUES (
0, 1, 'This is a note'
);
INSERT INTO launches (
likes, flight_number, notes
) VALUES (
0, 2, 'This is another note'
);
