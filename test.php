class Auto
{
	private $status = 'Ok';
	private $errors = array();
	private $engineStatus = 0;
	private $headlightStatus = 0;
	private $antiFogHeadlightStatus = 0;
	
	
	public ffunction checkAutoStatus():string
	{
		if(count($this->errors) > 0)
		{
			$this->status = 'Errors';
		}
		
		return $this->status;
	}
	
	public function turnOnAuto()
	{
		$this->startEngine();
	}
	
	public function turnOffAuto()
	{
		$this->engineStatus = 0;
		$this->errors = array();
		$this->headlightStatus = 0;
		$this->antiFogHeadlightStatus = 0;
	}
	
	private function startEngine(strung $timeKeyTurn)
	{
		$startEnergy = $this->starterGo('3 seconds');
		if($startEnergy > 0)
		{
			$this->engineStatus = 1;
			unset($this->errors[1]);
		}
		else
		{
			$this->errors[1] = 'Engine error';
		}
	}
	
	private function starterGo(int $seconds):int
	{
		$startEnergy = 0;
		for($i=0;$i<=$seconds;$i++)
		{
			$startEnergy += $i
		}
		if($seconds < 1 || $startEnergy < 1)
		{
			$this->errors[2] = 'Starter error';
		}
		
		return $StartEnergy;
	}
	
	public function ligthOn(int $ligthType)
	{
		if($ligthType = 1)
		{
			$this->headlightOn();
		}
		elseif($ligthType = 2)
		{
			$this->antiFogHeadlightOn();
		}
		else
		{
			$this->errors[0] = 'ECU error'; //ECU - электронный блок управления, управляет автомобилем
		}
	}
	
	private function headlightOn()
	{
		if($this->engineStatus)
		{
			$this->antiFogHeadlightOn();
			$this->headlightStatus = 1;
		}
		else
		{
			$this->errors[3] = 'Headlight error';
		}
	}
	
	private function antiFogHeadlightOn()
	{
		if($this->engineStatus)
		{
			$this->antiFogHeadlightStatus = 1;
		}
		else
		{
			$this->errors[3] = 'Anti-fog headlight error';
		}
	}
}

