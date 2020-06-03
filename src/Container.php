<?php

namespace SimpleDI;

use ArrayObject;

/**
*
* Container to create objects with
* dependency injection concept.
* 
* @author Raphael da Silva
* @copyright 2017
*
*/
class Container extends ArrayObject
{

	public function offsetSet($name, $callable)
	{

		if(!is_callable($callable)){
			throw new \InvalidArgumentException('The value must be a callable.');
		}

		parent::offsetSet($name, $callable);

	}

	private function getClosure($name)
	{

		if(parent::offsetExists($name)){
			return parent::offsetGet($name);
		}

		throw new \RuntimeException(sprintf('%s not found on container.', $name));

	}

	public function offsetGet($name)
	{

		$closure = $this->getClosure($name);
		$object  = $closure($this);

		return $object;

	}

	public function get($name){

		return $this[$name];

	}

	public function raw($name)
	{

		return $this->getClosure($name);

	}

}