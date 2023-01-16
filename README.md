# Zaliczenie B
Zaliczenie 2 z projektowania aplikacji rozproszonych

## Uruchamianie

Aby uruchomić projekt należy:
1. Uruchomić program XAMPP
2. Uruchomić usługę Apache i MySQL
3. Pobrać pliki i dodać do folderu htdocs programu XAMPP (najczęściej to jest C:\xampp\htdocs)
4. Wpisać w pasku adresu w przeglądarce: localhost/nazwa-folderu
5. W razie problemów kontaktować się ze mną na maila: rafi.kosowski2000@gmail.com  

## Zawartość plików 
Plik dogs.php zawiera klienta serwisu typu REST \
Plik converter.php zawiera klienta serwisu typu SOAP \
Plik style.css zawiera styl dla stron \
Plik index.php przekierowuje do strony converter.php 


## Serwis SOAP

Do mojego projektu wybrałem serwis, który konwertuje jednostki temperatury. \
Link: https://www.w3schools.com/xml/tempconvert.asmx\
WSDL: https://www.w3schools.com/xml/tempconvert.asmx?wsdl

### Wybrane metody 
CelsiusToFahrenheit \
FahrenheitToCelsius

### Test metod 
#### CelsiusToFahrenheit
![image](https://user-images.githubusercontent.com/47899050/212658256-b9d9f8c4-e652-475a-bd8c-4d4126cff15b.png)

#### FahrenheitToCelsius
![image](https://user-images.githubusercontent.com/47899050/212658716-14484734-f150-4644-84a1-8b27e28be5d7.png)


### Porównanie implementacji z Postmanem 
Ja w swojej aplikacji napisanej w PHP użyłem formularza. W pole tekstowe wprowadzamy temperaturę. Po naciśnięciu przycisku jest wysyłane zapytanie do serwera. Serwer wysyła zapytanie do serwisu SOAP. Potem odpowiedź z serwisu SOAP jest przesyłana na serwer, a z serwera do klienta.\
W Postmanie zapytanie jest kierowane bezpośrednio do serwisu SOAP. 
Moja aplikacja posiada oprawę graficzną, dzięki czemu użytkownik nie edytuje XML'a a wypełnia prosty formularz.


## Serwis REST API

Do mojego projektu wybrałem serwis, który posiada informacje o psach oraz ich zdjęcia. \
Link: https://dog.ceo/dog-api
Dokumentacja: https://dog.ceo/dog-api/documentation

### Wybrane metody 
LIST ALL BREEDS: https://dog.ceo/api/breeds/list/all
RANDOM IMAGE FROM A BREED COLLECTION: https://dog.ceo/api/breed/hound/images/random

### Test metod 
#### LIST ALL BREEDS:
![image](https://user-images.githubusercontent.com/47899050/212665015-3056261e-6acf-4a4e-b248-11d87789daf5.png)


#### RANDOM IMAGE FROM A BREED COLLECTION
![image](https://user-images.githubusercontent.com/47899050/212665150-7719f250-f41c-4fdc-8413-fef83b45aad3.png)



### Porównanie implementacji z Postmanem 
Ja w swojej aplikacji napisanej w PHP użyłem formularza. Pole z wyborem rasy zrobiłem jako lista rozwijalna, dane są pobierane z serwisu REST API. Po naciśnięciu przycisku jest wyświetlane zdjęcie, które jest wylosowane przez serwis REST API.\
Postman jest mniej elastyczny w tej kwestii. Wyświetla on tylko linki do stron ze zdjęciami.

## Podsumowanie

### Wygląd strony converter.php
![image](https://user-images.githubusercontent.com/47899050/212671484-c2092be3-671a-428a-b8e5-886903eff301.png)

### Wygląd strony dogs.php
![image](https://user-images.githubusercontent.com/47899050/212671566-e10899eb-ec8a-4bc3-ac10-d2d2cc0ceffc.png)




