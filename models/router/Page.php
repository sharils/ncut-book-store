<?php
class Page
{
    private static $page = 0;
    private static $total = 0;
    public static function getLimit($list)
    {
      $arr = [];
      $page = (!isset($_GET['p'])) ? 1 : $_GET['p'];
      $total = sizeof($list);
      self::$page = $page;
      self::$total = $total;

      $min = ($page - 1) * 10;
      $max = ($page * 10) - 1;
      for ($i = $min ; $i <= $max ; $i++)
      {
          if ($i <= ($total-1)) {
            $arr[] = $list[$i];
          }
      }
      return $arr;
    }

    public static function getPage()
    {
        $page = self::$page;
        $total = self::$total;
        $count_page = ($total/10);
        $max = is_int($count_page) ? $count_page : intval($count_page)+1;
        $url = self::getUrl();
        $after = ($page == $max) ? $page : $page+1;
        $before = ($page === '1') ? $page : $page-1;
        ?>
        <ul class="pagination">
          <li><a href="<?= Router::toUrl($url . $before) ?>">&laquo;</a></li>
          <?php for($i = 1 ; $i <= $max ; $i++): ?>
            <?php $active = ($i == $page) ? 'active' : ''?>
            <li class="<?=$active?>"><a href="<?= Router::toUrl($url . $i) ?>"><?=$i?></a></li>
          <?php endfor; ?>
          <li><a href="<?= Router::toUrl($url . $after) ?>">&raquo;</a></li>
        </ul>
        <?php
    }

    private static function getUrl()
    {
      $get = $_GET;
      $str = '';
      $map = explode('/', $_SERVER['REQUEST_URI']);
      $str =  $map[2] . '/' . Router::resource() .'?';
      foreach ($get as $k => $v) {
        if ($k !== 'p') {
          $str .= $k .'=' . $v . '&';
        }
      }
      $str .= 'p=';
      return $str;
    }
}
