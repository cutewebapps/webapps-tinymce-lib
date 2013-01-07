<?php

/*-------------------------------------------------------------------
|
| ЭТОТ ФАЙЛ НЕ АКТИВЕН. Переименуйте его в config.php (а существующий config.php удалите).
|
-------------------------------------------------------------------*/

/*-------------------------------------------------------------------
| Плагин загрузки изображений для TinyMCE
| http://justboil.me/tinymce-images-plugin/ru/
| 
| ВАЖНО! Если папка с редактором TinyMCE не защищена HTTP-авторизацией, то настоятельно рекомендуем 
| открыть файл is_allowed.php и завязать функцию is_allowed с вашей системой 
| авторизации (та, что используется для доступа к редактору). Это защитит скрипт загрузки изображений
| от несанкционированного доступа в случае, если кто-то угадает его адрес.
|
| ДАЛЕЕ, НАЧАЛО КОНФИГУРАЦИИ:
| 
-------------------------------------------------------------------*/


/*-------------------------------------------------------------------
|
| Путь к папке с изображениями относительно имени домена. БЕЗ СЛЕША НА КОНЦЕ! 
| Пример: если изображение доступно по адресу http://www.example.com/images/somefolder/image.jpg, то укажите здесь:
| 
| $config['img_path'] = '/images/somefolder';
| 
-------------------------------------------------------------------*/

	
	$config['img_path'] = '/cdn/upload';


/*-------------------------------------------------------------------
| 
| Разрешенные для загрузки типы файлов. Только файлы изображений. 
| Загрузчик вставляет в редактор код <img src="имя_загруженного_файла" />
| 
| $config['allowed_types'] = 'gif|jpg|png';
| 
-------------------------------------------------------------------*/

	
	$config['allowed_types'] = 'gif|jpg|png';


/*-------------------------------------------------------------------
| 
| Максимальный размер загружаемого файла в килобайтах. Не может быть выше ограничения установленного в php.ini.
| Укажите 0 для использования ограничения установленного в php.ini:
| 
| $config['max_size'] = 0;
| 
-------------------------------------------------------------------*/

	
	$config['max_size'] = 0;


/*-------------------------------------------------------------------
| 
| Максимальная ширина загружаемого изображения в пикселях. Укажите `0`, если максимум отсутствует:
| 
| $config['max_width'] = 0;
| 
-------------------------------------------------------------------*/

	
	$config['max_width'] = 0;


/*-------------------------------------------------------------------
| 
| Максимальная высота загружаемого изображения в пикселях. Укажите `0`, если максимум отсутствует:
| 
| $config['max_height'] = 0;
| 
-------------------------------------------------------------------*/

	
	$config['max_height'] = 0;


/*-------------------------------------------------------------------
| 
| Разрешить скрипту уменьшить изображение до максимальных величин ширины и высоты, в случае их превышения.
| Если `TRUE`, то изображение будет уменьшено, если `FALSE`, то будет выведено сообщение о том, что изображение больше максимально возможного.
| 
| $config['allow_resize'] = TRUE;
| 
-------------------------------------------------------------------*/

	
	$config['allow_resize'] = TRUE;


/*-------------------------------------------------------------------
| 
| Шифровать, ли имя файла. Если `TRUE`, то имена загружаемых файлов преобразуются в случайный набор букв
| и цифр (нечто вроде 7fdd57742f0f7b02288feb62570c7813.jpg)
| Если `FALSE`, то сохраняются оригинальные имена файлов
| 
| $config['encrypt_name'] = TRUE;
| 
-------------------------------------------------------------------*/

	
	$config['encrypt_name'] = FALSE;


/*-------------------------------------------------------------------
| 
| Если файл с таким же именем, как загружаемый в данный момент существует, скрипт добавляет
| к имени файла цифры. Эту функцию можно отключить, в таком случае уже существующий на сервере файл будет
| перезаписан новым.
| `TRUE` - перезаписывать файлы
| `FALSE` - добавлять к имени файла цифры
| 
-------------------------------------------------------------------*/


	$config['overwrite'] = FALSE;
	
	
/*-------------------------------------------------------------------
| 
| Папка для загрузки файлов на сервере. Обычно менять не требуется.
| 
-------------------------------------------------------------------*/

	
	$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . $config['img_path'];
	

/*-------------------------------------------------------------------
| 
| КОНЕЦ КОНФИГУРАЦИИ
| 
-------------------------------------------------------------------*/
