<?php
class TempTracker{
    private $tempList = [];
    private $max = null;
    private $min = null;
    private $sum =null;
    private $count = 0;
    //add temp to list
    public function setTemp($temperature){
        //temperature must be an integer or float!
        if(!is_int($temperature) && !is_float($temperature) ) return 0;
            // throw new Exception('temperature must be an integer or float!');

        $this->tempList[] = $temperature;
        return 1;
    }
     //Get List
    public function getList(){
        return $this->tempList;
    }
    //Get Max
    public function getMax(){
        return $this->max;
    }
    // Get min
    public function getMin(){
        return $this->min;
    }  
    // Get mean
    public function getMean(){
        return $this->count === 0 ? null : $this->sum / $this->count;
    }

    // insert new temperature
    public function insert($temperature){
        if(!$this->setTemp($temperature)) return;
        if ($this->count === 0) {
            $this->sum = $this->max = $this->min = $temperature;
            $this->count = 1;
          } else {
            $this->min = min($this->min, $temperature);
            $this->max = max($this->max, $temperature);
            $this->sum += $temperature;
            $this->count++;
          }
    }
}

?>