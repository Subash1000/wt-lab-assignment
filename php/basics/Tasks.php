<?php
class Task
{
    public $name;
    public $isComplete;
    public function setName($name):void
    {
        $this->name=$name;
    }
    public function getName($name):string
    {
        $this->name=$name;
    }
    public function markAsComplete()
    {
        $this->isComplete=true;
    }
}
$task =new Task();
$task->setName ("Go to the market");
//die("die")
var_dump($task);
echo"</pre>";
// echo $task ->getName();