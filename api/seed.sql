CREATE TABLE launches (id SERIAL, likes INT, flight_number INT, notes VARCHAR(256));


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
