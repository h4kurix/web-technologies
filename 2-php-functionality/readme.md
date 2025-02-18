## Запуск
1. Убедитесь, что расширение **GD** включено в PHP:
    - Откройте файл `php.ini` и раскомментируйте строку:
    ```ini
    ;extension=gd
    ```
2. Запустите сервер в папке скрипта:
    
    ```sh
    php -S localhost:8000
    ```
    
3. Перейдите в браузере по адресу:
    ```sh
    http://localhost:8000/demotivator.php
    http://localhost:8000/piramida.php
    http://localhost:8000/graycat.php
    ```