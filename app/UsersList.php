<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersList extends Model
{
    use ModelTrait;
    protected $fillable = [
        'employer_name',
        'employer_ip',
        'employer_department',
        'employer_post',
        'employer_email',
        'employer_phone',
    ];

    protected $department = [
        1 => 'Отдел кадров',
        'Отдел тестирования',
        'Отдел разработки',
        'Транспортный отдел',
        'Финансово-бухгалтерский отдел',
        'Отдел маркентинга',
        'Хозяйственный отдел',
        'Юрисконсульт',
    ];

    /**
     * @return array
     */
    public function getDepartment()
    {
        if(!empty($this->employer_department))
        return $this->department[$this->employer_department];
    }


}
