<?php
// Перезапишем переменные для удобства
$filePath  = $_FILES['upload']['tmp_name'];
$errorCode = $_FILES['upload']['error'];
// Проверим на ошибки
//if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {
    // Массив с названиями ошибок
 //   $errorMessages = [
 //       UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
 //       UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
 //       UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
 //       UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
 //       UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
 //       UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
 //       UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
 //   ];
    // Зададим неизвестную ошибку
 //   $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
 //   $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
    // Выведем название ошибки
  //  die($outputMessage);
//}
// Создадим ресурс FileInfo, проверяющая MIME-тип файла
$fi = finfo_open(FILEINFO_MIME_TYPE);
// Получим MIME-тип
$mime = (string) finfo_file($fi, $filePath);
// Закроем ресурс
finfo_close($fi);
// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');
// Результат функции запишем в переменную
$image = getimagesize($filePath);
// Зададим ограничения для картинок
$limitBytes  = 1024 * 1024 * 20;
$limitWidth  = 3500;
$limitHeight = 3500;
// Проверим нужные параметры
if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
if ($image[1] > $limitHeight)          die('Высота изображения не должна превышать 3500 точек.');
if ($image[0] > $limitWidth)           die('Ширина изображения не должна превышать 3500 точек.');
// Сгенерируем новое имя файла на основе MD5-хеша
$name = md5_file($filePath);
// Сгенерируем расширение файла на основе типа картинки
$extension = image_type_to_extension($image[2]);
// Сократим .jpeg до .jpg
$format = str_replace('jpeg', 'jpg', $extension);
// Переместим картинку с новым именем и расширением в папку /files
if (!move_uploaded_file($filePath, __DIR__ . '/files/' . $name.$format)) {
    die('При записи изображения на диск произошла ошибка.');
};
$image = $name.$format;
?>
