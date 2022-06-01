# Port.hu musor lista

- A program futtatásához szükséges importálni a port_tv.sql file-t az adatbázisba.
- Az ".env.local" file-t át kell nevezni ".env"-re, ezután paraméterezzük az adatbázis csatlakozáshoz szükséges egyéni adatokkal.
- A program automatikusan feltölti az adatbázisba a kiválasztott napi csatornák és műsorok adatait. (Ezt a megoldást választottam így késöbbi csatornák is elérhetővé válnak, és naponta változik a kiválasztható napok száma a port.hu szerint)
