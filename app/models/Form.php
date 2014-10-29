<?php
/**
 * @author paul
 */
namespace xpreso\models;

use Carbon\Carbon;

class Form extends \Eloquent
{
    protected $table = 'forms';
    
    protected $primaryKey = 'formId';
    
    protected $fillable = [ 'formName', 'state'];
    
    public static $formSates = [
        'draft' =>1,
        'public'=>2,
        'hidden'=>3,
        'deleted'=>4,
    ];
    
    public static $validationRules = [
        'formName' => 'required|alpha_num|min:5|max:99|unique:forms,formName',
        'state'    => 'required|integer',
    ];
    
    public static function getAllNewest($minTimestamp)
    {
        $minTimestamp = intval($minTimestamp);
        
        return self::where('created_at', '>=', Carbon::createFromTimestamp($minTimestamp))->get();
    }
    
}
