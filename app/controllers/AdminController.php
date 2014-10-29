<?php
/**
 * @author paul
 */
class AdminController extends BaseController
{
    public function showIndex()
	{
		return View::make('admin.layout');
	}
}
