<?php

namespace App\Model\Admin;

use App\Model\CommonModel;
use DB;

class AdminsModel extends CommonModel{
	protected $table = 'book_admin_user';
	protected $primaryKey = 'admin_id';		// 主键id

}