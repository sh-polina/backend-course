<?php

interface AnimalInterface
{
    public function hunt();

    public function colorShift();

    public function fly();
}

class Fox implements AnimalInterface, Movable
{
    use FileToArray;
    use NotFoundLog;

    public function isAnimalType()
    {
        $arrayFile = $this->getArray();
        foreach ($arrayFile as $item) {
            if ($item["type"] == get_class($this)){
                return $item["name"];
            }
        }

        $this->log(get_class($this));
        return "";
    }

    public function colorShift()
    {
        // TODO: Implement colorShift() method.
    }

    public function fly()
    {
        // TODO: Implement fly() method.
    }

    public function hunt()
    {
        // TODO: Implement hunt() method.
    }

    public function hide()
    {
        // TODO: Implement hide() method.
    }

}

class Elephant implements AnimalInterface, Movable, Eatable
{
    use FileToArray;
    use NotFoundLog;

    public function isAnimalType()
    {
        $arrayFile = $this->getArray();
        foreach ($arrayFile as $item) {
            if ($item["type"] == get_class($this)){
                return $item["name"];
            }
        }

        $this->log(get_class($this));
        return "";
    }

    public function colorShift()
    {
        // TODO: Implement colorShift() method.
    }

    public function fly()
    {
        // TODO: Implement fly() method.
    }

    public function hunt()
    {
        // TODO: Implement hunt() method.
    }

    public function hide()
    {
        // TODO: Implement hide() method.
    }

    public function collect()
    {
        // TODO: Implement collect() method.
    }
}

class Pigeon implements AnimalInterface
{
    use FileToArray;
    use NotFoundLog;

    public function isAnimalType()
    {
        $arrayFile = $this->getArray();
        foreach ($arrayFile as $item) {
            if ($item["type"] == get_class($this)){
                return $item["name"];
            }
        }

        $this->log(get_class($this));
        return "";
    }

    public function colorShift()
    {
        // TODO: Implement colorShift() method.
    }

    public function fly()
    {
        // TODO: Implement fly() method.
    }

    public function hunt()
    {
        // TODO: Implement hunt() method.
    }
}

interface Movable
{
    public function hide();
}

interface Eatable
{
    public function collect();
}

trait FileToArray
{
    public function getArray(): array
    {
        $file = file_get_contents("data/Animals.txt");

        return json_decode($file, true);
    }
}

trait NotFoundLog
{
    public function log(string $animal)
    {
        file_put_contents('data/notFound.txt', $animal, FILE_APPEND);
    }
}

$fox = new Fox();
$foxName = $fox->isAnimalType();
echo $foxName ? "Животное по ключу " . $foxName . " есть в файле" : '';
echo "<br/>";
$elephant = new Elephant();
$elephantName = $elephant->isAnimalType();
echo $elephantName ? "Животное по ключу " . $elephantName . " есть в файле" : '';
echo "<br/>";
$pigeon = new Pigeon();
$pigeonName = $pigeon->isAnimalType();
echo $pigeonName ? "Животное по ключу " . $pigeonName . " есть в файле" : '';