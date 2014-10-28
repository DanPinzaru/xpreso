<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    protected function sanitize($value)
    {
        return filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}
