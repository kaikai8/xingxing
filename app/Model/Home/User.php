<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     *  与模型关联的数据表. 
     *
     *   @var string 
     */
    
    protected $table = 'user';

    //主键
    protected $primaryKey = 'uid';

    /**
     *  该模型是否被自动维护时间戳. 
     *
     *   @var bool 
     */
    
    public $timestamps = false;

    /**
     *  不可被批量赋值的属性. 
     *
     *   @var array 
     */
    
    protected $guarded = [];

    /**
     *  一对一 用户 用户信息 关联. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function muser()
    {
        return $this->hasOne('App\Model\Home\muser','uid','user_id');
    }

     /**
     *  一对多 用户 用户收货信息 关联. 
     *
     *   @return \Illuminate\Http\Response 
     */
    public function addr_message()
    {
        return $this->hasMany('App\Model\Home\addr_message','uid','user_id');
    }
}
