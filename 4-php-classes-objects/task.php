<?php
// 1. Класс NotePad
class NotePad
{
    protected $phone; // protected вместо private для доступа в наследниках
    public $name;
    public $surname;
    const TEXT_SIZE = 20;

    public function note_show()
    {
        echo "Phone: " . $this->phone . "\n";
        echo "Name: " . $this->name . "\n";
        echo "Surname: " . $this->surname . "\n";
        echo "TEXT_SIZE: " . self::TEXT_SIZE . "\n";
    }

    // 3. Добавьлен конструктор 
    public function __construct($phone, $name, $surname)
    {
        $this->phone = $phone;
        $this->name = $name;
        $this->surname = $surname;
    }

    // 4. Добавлен метод __clone
    public function __clone()
    {
        $this->phone = null;
        $this->name = null;
        $this->surname = null;
    }
}

// 5. Класс NoteChild
class NoteChild extends NotePad
{
    public function note_show()
    {
        echo "Class: " . __CLASS__ . "\n";
        echo "Вызов родительского метода note_show ...\n";
        parent::note_show();
    }

    // 7. Добавлен метод cut_note
    public function cut_note()
    {
        $this->phone = substr($this->phone, 0, self::TEXT_SIZE);
        $this->name = substr($this->name, 0, self::TEXT_SIZE);
        $this->surname = substr($this->surname, 0, self::TEXT_SIZE);
    }
}



// 2. Создание $note1 и вывод
$note1 = new NotePad('', '', '');
echo "=== note1 ===\n";
$note1->note_show();
echo "TEXT_SIZE: " . NotePad::TEXT_SIZE . "\n\n";

// 3. Создание $note2 и вывод
$note2 = new NotePad('123456789', 'John', 'Doe');
echo "=== note2 ===\n";
$note2->note_show();
echo "\n";

// 4. Клонирование $note2_copy
$note2_copy = clone $note2;
echo "=== note2_copy ===\n";
$note2_copy->note_show();  // Все свойства null
echo "\n";

// 6. Создание $child1 и копии
$child1 = new NoteChild('5555555', 'Alice', 'Smith');
echo "=== child1 ===\n";
$child1->note_show();
echo "\n";

$child1_copy = clone $child1;
echo "=== child1_copy ===\n";
$child1_copy->note_show();
echo "\n";

// 7. Обрезка
$child2 = new NoteChild(
    '123456789012345678901234567890',
    'Очень длинное имя для обрезки',
    'Очень длинная фамилия для обрезки'
);
$child2->cut_note();
echo "=== child2 (after cut_note) ===\n";
$child2->note_show();

?>