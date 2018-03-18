<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;
class Incident extends Model
{
  public function category()
  {
    return $this->belongsTo('App\Category');
  }
  public function getSeverityFullAttribute()
  {
    switch ($this->severity) {
      case 'M':
        return 'Menor';
      case 'N':
        return 'Normal';
      default:
        return 'Alta';
    }
  }
  public function getTitleShortAttribute()
  {
    return mb_strimwidth($this->title, 0, 20, '...');
  }

}
