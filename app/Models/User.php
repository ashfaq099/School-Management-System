<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
static public function getSingle($id)
{
    return self::find($id);
}

static public function getTotalUser($user_type)
{
return self::select('users.id')
    ->where('user_type', '=',$user_type)
    ->where('is_delete', '=',0)
        ->count();

}

static public function getAdmin()
{
    return self::select('users.*')
    ->where('user_type', '=',1)
    ->where('is_delete', '=',0)
        ->orderBy('id','desc')
        ->get();
}

static public function getStudent()
{
  $return=self::select('users.*','class.name as class_name')
    ->join('class','class.id','=','users.class_id','left')
    ->where('users.user_type', '=',3)
    ->where('users.is_delete', '=',0);
    if(!empty(Request::get('name')))
        {
            $return=$return->where('users.name','like','%'.Request::get('name').'%');
        }
         if(!empty(Request::get('class')))
        {
            $return=$return->where('class.name','like','%'.Request::get('class').'%');
        }

        if (!empty(Request::get('status'))) {
    $status = (Request::get('status') == 100) ? 0 : 1;
    $return = $return->where('users.status', '=', $status);
}

if (!empty(Request::get('blood_group'))) {
    $return = $return->where('users.blood_group', 'like', '%' . Request::get('blood_group') . '%');
}



if (!empty(Request::get('gender'))) {
    $return = $return->where('users.gender', '=', Request::get('gender'));
}


       $return=$return->orderBy('users.id','desc')
        ->paginate(40);
        return $return;
}
static public function getEmailSingle($email)
{
    return User::where('email','=',$email)->first();
}
static public function getTokenSingle($remember_token)
{
    return User::where('remember_token','=',$remember_token)->first();
}
public function getProfile()
{
    if(!empty($this->profile_pic)&&file_exists('upload/profile/'.$this->profile_pic))
    {

        return url('upload/profile/'.$this->profile_pic);
    }
    else
    {
        return "";
    }
}
static public function getTeacher()
{
  $return=self::select('users.*')
    ->where('users.user_type', '=',2)
    ->where('users.is_delete', '=',0);
    if(!empty(Request::get('name')))
        {
            $return=$return->where('users.name','like','%'.Request::get('name').'%');
        }
         if(!empty(Request::get('class')))
        {
            $return=$return->where('class.name','like','%'.Request::get('class').'%');
        }

        if (!empty(Request::get('status'))) {
    $status = (Request::get('status') == 100) ? 0 : 1;
    $return = $return->where('users.status', '=', $status);
}

if (!empty(Request::get('blood_group'))) {
    $return = $return->where('users.blood_group', 'like', '%' . Request::get('blood_group') . '%');
}



if (!empty(Request::get('gender'))) {
    $return = $return->where('users.gender', '=', Request::get('gender'));
}


       $return=$return->orderBy('users.id','desc')
        ->paginate(40);
        return $return;
}

static public function getTeacherClass()
{
  $return=self::select('users.*')
    ->where('users.user_type', '=',2)
    ->where('users.is_delete', '=',0);
    $return=$return->orderBy('users.id','desc')
     ->get();
     return $return;
}


static public function getStudentClass($class_id)
{
  return self::select('users.id','users.name','users.last_name')
    ->where('users.user_type', '=',3)
    ->where('users.is_delete', '=',0)
    ->where('users.class_id', '=',$class_id)
     ->orderBy('users.id','desc')
     ->get();
   
   
}
static public function getTeacherStudent($teacher_id)
{
  $return=self::select('users.*','class.name as class_name')
    ->join('class','class.id','=','users.class_id')
    ->join('assign_class_teacher','assign_class_teacher.class_id','=','class.id')
    ->where('assign_class_teacher.teacher_id','=',$teacher_id)
    ->where('users.user_type', '=',3)
    ->where('users.is_delete', '=',0)
    ->where('assign_class_teacher.status', '=',0)
    ->where('assign_class_teacher.is_delete', '=',0);
     $return=$return->orderBy('users.id','desc')
       ->groupBy('users.id')
        ->paginate(40);
        return $return;
}

}