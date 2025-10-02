<?php
// app/Models/ContactMessage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['locale','name','email','phone','subject','message','status','ip','user_agent'];
}
