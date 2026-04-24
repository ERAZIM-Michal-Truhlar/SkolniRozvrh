<?php
header('Content-Type: application/json; charset=utf-8');

$days = [
    ['id' => 'monday', 'label' => 'Pondeli'],
    ['id' => 'tuesday', 'label' => 'Utery'],
    ['id' => 'wednesday', 'label' => 'Streda'],
    ['id' => 'thursday', 'label' => 'Ctvrtek'],
    ['id' => 'friday', 'label' => 'Patek'],
];

$slots = [
    ['id' => '08', 'label' => '8:00'],
    ['id' => '09', 'label' => '9:00'],
    ['id' => '10', 'label' => '10:00'],
    ['id' => '11', 'label' => '11:00'],
    ['id' => '12', 'label' => '12:00'],
    ['id' => '13', 'label' => '13:00'],
    ['id' => '14', 'label' => '14:00'],
];

$categories = [
    'language' => [
        'label' => 'Jazykove',
        'color' => '#8b5cf6',
        'background' => '#f4ecff',
    ],
    'math' => [
        'label' => 'Matematicke',
        'color' => '#22c55e',
        'background' => '#eaf9ef',
    ],
    'science' => [
        'label' => 'Prirodovedne',
        'color' => '#fb7185',
        'background' => '#fff0f3',
    ],
    'history' => [
        'label' => 'Spolecenskovedni',
        'color' => '#fb923c',
        'background' => '#fff4e8',
    ],
    'it' => [
        'label' => 'Informatika',
        'color' => '#3b82f6',
        'background' => '#edf4ff',
    ],
    'sport' => [
        'label' => 'Telesna vychova',
        'color' => '#14b8a6',
        'background' => '#ebfbf9',
    ],
];

$lessons = [
    ['id' => 'mon-08', 'day' => 'monday', 'slot' => '08', 'time' => '8:00 - 8:45', 'subject' => 'Matematika', 'teacher' => 'Novak', 'room' => 'Ucebna B12', 'category' => 'math'],
    ['id' => 'mon-09', 'day' => 'monday', 'slot' => '09', 'time' => '9:00 - 9:45', 'subject' => 'Anglictina', 'teacher' => 'Svobodova', 'room' => 'Ucebna A08', 'category' => 'language'],
    ['id' => 'mon-10', 'day' => 'monday', 'slot' => '10', 'time' => '10:00 - 10:45', 'subject' => 'Dejepis', 'teacher' => 'Havel', 'room' => 'Ucebna B03', 'category' => 'history'],
    ['id' => 'mon-11', 'day' => 'monday', 'slot' => '11', 'time' => '11:00 - 11:45', 'subject' => 'Chemie', 'teacher' => 'Pokorna', 'room' => 'Ucebna C15', 'category' => 'science'],
    ['id' => 'mon-12', 'day' => 'monday', 'slot' => '12', 'time' => '12:00 - 12:45', 'type' => 'break'],
    ['id' => 'mon-13', 'day' => 'monday', 'slot' => '13', 'time' => '13:00 - 13:45', 'subject' => 'Telocvik', 'teacher' => 'Malecek', 'room' => 'Telocvicna', 'category' => 'sport'],
    ['id' => 'mon-14', 'day' => 'monday', 'slot' => '14', 'time' => '14:00 - 14:45', 'subject' => 'Informatika', 'teacher' => 'Kral', 'room' => 'Ucebna IT2', 'category' => 'it'],

    ['id' => 'tue-08', 'day' => 'tuesday', 'slot' => '08', 'time' => '8:00 - 8:45', 'subject' => 'Cestina', 'teacher' => 'Kovarova', 'room' => 'Ucebna A05', 'category' => 'language'],
    ['id' => 'tue-09', 'day' => 'tuesday', 'slot' => '09', 'time' => '9:00 - 9:45', 'subject' => 'Fyzika', 'teacher' => 'Dvorak', 'room' => 'Ucebna C21', 'category' => 'science'],
    ['id' => 'tue-10', 'day' => 'tuesday', 'slot' => '10', 'time' => '10:00 - 10:45', 'subject' => 'Matematika', 'teacher' => 'Novak', 'room' => 'Ucebna B12', 'category' => 'math'],
    ['id' => 'tue-11', 'day' => 'tuesday', 'slot' => '11', 'time' => '11:00 - 11:45', 'subject' => 'Anglictina', 'teacher' => 'Svobodova', 'room' => 'Ucebna A08', 'category' => 'language'],
    ['id' => 'tue-12', 'day' => 'tuesday', 'slot' => '12', 'time' => '12:00 - 12:45', 'type' => 'break'],
    ['id' => 'tue-13', 'day' => 'tuesday', 'slot' => '13', 'time' => '13:00 - 13:45', 'subject' => 'Dejepis', 'teacher' => 'Havel', 'room' => 'Ucebna B03', 'category' => 'history'],
    ['id' => 'tue-14', 'day' => 'tuesday', 'slot' => '14', 'time' => '14:00 - 14:45', 'subject' => 'Telocvik', 'teacher' => 'Malecek', 'room' => 'Telocvicna', 'category' => 'sport'],

    ['id' => 'wed-08', 'day' => 'wednesday', 'slot' => '08', 'time' => '8:00 - 8:45', 'subject' => 'Matematika', 'teacher' => 'Novak', 'room' => 'Ucebna B12', 'category' => 'math'],
    ['id' => 'wed-09', 'day' => 'wednesday', 'slot' => '09', 'time' => '9:00 - 9:45', 'subject' => 'Informatika', 'teacher' => 'Kral', 'room' => 'Ucebna IT2', 'category' => 'it'],
    ['id' => 'wed-10', 'day' => 'wednesday', 'slot' => '10', 'time' => '10:00 - 10:45', 'subject' => 'Cestina', 'teacher' => 'Kovarova', 'room' => 'Ucebna A05', 'category' => 'language'],
    ['id' => 'wed-11', 'day' => 'wednesday', 'slot' => '11', 'time' => '11:00 - 11:45', 'subject' => 'Chemie', 'teacher' => 'Pokorna', 'room' => 'Ucebna C15', 'category' => 'science'],
    ['id' => 'wed-12', 'day' => 'wednesday', 'slot' => '12', 'time' => '12:00 - 12:45', 'type' => 'break'],
    ['id' => 'wed-13', 'day' => 'wednesday', 'slot' => '13', 'time' => '13:00 - 13:45', 'subject' => 'Telocvik', 'teacher' => 'Malecek', 'room' => 'Telocvicna', 'category' => 'sport'],
    ['id' => 'wed-14', 'day' => 'wednesday', 'slot' => '14', 'time' => '14:00 - 14:45', 'subject' => 'Dejepis', 'teacher' => 'Havel', 'room' => 'Ucebna B03', 'category' => 'history'],

    ['id' => 'thu-08', 'day' => 'thursday', 'slot' => '08', 'time' => '8:00 - 8:45', 'subject' => 'Anglictina', 'teacher' => 'Svobodova', 'room' => 'Ucebna A08', 'category' => 'language'],
    ['id' => 'thu-09', 'day' => 'thursday', 'slot' => '09', 'time' => '9:00 - 9:45', 'subject' => 'Fyzika', 'teacher' => 'Dvorak', 'room' => 'Ucebna C21', 'category' => 'science'],
    ['id' => 'thu-10', 'day' => 'thursday', 'slot' => '10', 'time' => '10:00 - 10:45', 'subject' => 'Matematika', 'teacher' => 'Novak', 'room' => 'Ucebna B12', 'category' => 'math'],
    ['id' => 'thu-11', 'day' => 'thursday', 'slot' => '11', 'time' => '11:00 - 11:45', 'subject' => 'Cestina', 'teacher' => 'Kovarova', 'room' => 'Ucebna A05', 'category' => 'language'],
    ['id' => 'thu-12', 'day' => 'thursday', 'slot' => '12', 'time' => '12:00 - 12:45', 'type' => 'break'],
    ['id' => 'thu-13', 'day' => 'thursday', 'slot' => '13', 'time' => '13:00 - 13:45', 'subject' => 'Informatika', 'teacher' => 'Kral', 'room' => 'Ucebna IT2', 'category' => 'it'],
    ['id' => 'thu-14', 'day' => 'thursday', 'slot' => '14', 'time' => '14:00 - 14:45', 'subject' => 'Chemie', 'teacher' => 'Pokorna', 'room' => 'Ucebna C15', 'category' => 'science'],

    ['id' => 'fri-08', 'day' => 'friday', 'slot' => '08', 'time' => '8:00 - 8:45', 'subject' => 'Cestina', 'teacher' => 'Kovarova', 'room' => 'Ucebna A05', 'category' => 'language'],
    ['id' => 'fri-09', 'day' => 'friday', 'slot' => '09', 'time' => '9:00 - 9:45', 'subject' => 'Dejepis', 'teacher' => 'Havel', 'room' => 'Ucebna B03', 'category' => 'history'],
    ['id' => 'fri-10', 'day' => 'friday', 'slot' => '10', 'time' => '10:00 - 10:45', 'subject' => 'Informatika', 'teacher' => 'Kral', 'room' => 'Ucebna IT2', 'category' => 'it'],
    ['id' => 'fri-11', 'day' => 'friday', 'slot' => '11', 'time' => '11:00 - 11:45', 'subject' => 'Matematika', 'teacher' => 'Novak', 'room' => 'Ucebna B12', 'category' => 'math'],
    ['id' => 'fri-12', 'day' => 'friday', 'slot' => '12', 'time' => '12:00 - 12:45', 'type' => 'break'],
    ['id' => 'fri-13', 'day' => 'friday', 'slot' => '13', 'time' => '13:00 - 13:45', 'subject' => 'Fyzika', 'teacher' => 'Dvorak', 'room' => 'Ucebna C21', 'category' => 'science'],
    ['id' => 'fri-14', 'day' => 'friday', 'slot' => '14', 'time' => '14:00 - 14:45', 'subject' => 'Telocvik', 'teacher' => 'Malecek', 'room' => 'Telocvicna', 'category' => 'sport'],
];

$today = [
    ['time' => '8:00 - 8:45', 'subject' => 'Matematika', 'room' => 'B12'],
    ['time' => '9:00 - 9:45', 'subject' => 'Anglictina', 'room' => 'A08'],
    ['time' => '10:00 - 10:45', 'subject' => 'Dejepis', 'room' => 'B03'],
    ['time' => '11:00 - 11:45', 'subject' => 'Chemie', 'room' => 'C15'],
    ['time' => '13:00 - 13:45', 'subject' => 'Telocvik', 'room' => 'Telocvicna'],
];

$changes = [
    ['date' => 'Zitra, 20. 5.', 'text' => 'Fyzika je presunuta do ucebny C22 v 9:00.'],
    ['date' => 'Patek, 23. 5.', 'text' => 'Informatiku povede zastupujici ucitel Kriz.'],
    ['date' => 'Pondeli, 26. 5.', 'text' => 'Dejepis je zrusen kvuli skolnimu vyletu.'],
];

echo json_encode([
    'days' => $days,
    'slots' => $slots,
    'categories' => $categories,
    'lessons' => $lessons,
    'today' => $today,
    'changes' => $changes,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
