<?php
class Parameter
{
    public static $department = [
        'im' => ['資訊管理系(所)', '資'],
        'me' => ['機械工程系', '機'],
        'cme' => ['化工與材料工程系(所)', '化'],
        'rac' => ['冷凍空調與能源系(所)', '冷'],
        'cc' => ['文化創意事業系', '文'],
        'ae' => ['應用英語系', '英'],
        'csie' => ['資訊工程系(所)', '訊'],
        'ddm' => ['流通管理系', '流'],
        'la' => ['景觀系', '景'],
        'ba' => ['企業管理系(所)', '企'],
        'iem' => ['工業工程與管理系', '工'],
        'dlim' => ['休閒產業管理系', '休'],
        'ee' => ['電機工程系(所)', '電'],
        'dee' => ['電子工程系(所)', '子']
    ];

    public static $grade = [
        '1' => ['一年級', '一', '一　'],
        '2' => ['二年級', '二', '二　'],
        '3' => ['三年級', '三', '三　'],
        '4' => ['四年級', '四', '四　' ]
    ];

    public static $group = [
        'e' => '選',
        'a' => '甲',
        'b' => '乙',
        'c' => '丙',
        'd' => '丁'
    ];

    public static $semester = [
        '1' => ['第一學期', '上', '上　'],
        '2' => ['第二學期', '下', '下　']
    ];

    public static $shelf = [
        TRUE => ['上架中', 'btn-info'],
        FALSE => ['下架中', 'btn-danger']
    ];

    public static $status = [
        'cancel' => '訂單已取消',
        'submitted' => '待處理',
        'processing' => '處理中',
        'arrived' => '可取貨',
        'return' => '退書申請',
        'finished' => '完成'
    ];
        // 'shipping' => '進貨',
        // 'ordered' => '備貨中'
        // 'shopping' => '交易中',

    public static $system = [
        '1a' => ['日二技', '二'],
        '1b' => ['日四技', '四'],
        '1c' => ['日二專', '專二'],
        '1d' => ['日研', '研'],
        '2a' => ['夜二技(技專)', '職二'],
        '2b' => ['夜四技', '職四'],
        '2c' => ['夜二專', '職'],
        '3a' => ['進修學院', '院二'],
        '3b' => ['進專', '專二、雙軌']
    ];

    public static $type = [
        'required' => '必修',
        'optional' => '選修'
    ];

    public static function before($arg_name, $before = ['' => ['All', 'All', 'All'] , '1'=>[] ])
    {
        $A = array_merge($before, self::${$arg_name});
        unset($A['0']);
        return $A;
    }

    public static function after($arg_name, $after)
    {
        return array_merge(self::${$arg_name}, $after);
    }
}
