<?php

namespace App\Repository;


use App\Notice;

class NoticeRepository
{
    private $notice;

    public function __construct(notice $notice)
    {
        $this->notice = $notice;
    }

    public function all()
    {
        $notice= $this->notice->select('notices.*')
            ->orderBy('id','ASC')
            ->get();

        $galleries=$this->notice->all();
        return $notice;

    }
    public function findById($id)
    {
        $notice = $this->notice->find($id);
        return $notice;
    }
    public function status()
    {
        $notice = $this->notice->where('status','=','active')
            ->orderBy('id','asc')
            ->get();
        return $notice;
    }



}