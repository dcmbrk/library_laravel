<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
protected $table = 'book_user'; // chỉ định tên bảng vì không theo chuẩn số nhiều

protected $fillable = ['book_id', 'user_id', 'status'];

public function book()
{
return $this->belongsTo(Book::class);
}

public function user()
{
return $this->belongsTo(User::class);
}
}