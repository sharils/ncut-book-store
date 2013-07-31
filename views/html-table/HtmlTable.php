<?php
class HtmlTable
{
	private $col;
	private $dataProvider;
	private $isTh;
	private $row;
	private $rowGroup;
	private static function toRowGroupTag($group) {		
    	if ($group === 0) {
    		return "thead";
    	} elseif ($group === 1) {
      		return "tfoot";
    	} else {
    		return "tbody";
    	}
	}
	public function __construct ($row, $col, $is_th, $row_group, $data_provider)
	{
        $this->row = $row;
        $this->col = $col;
        $this->isTh = $is_th;
        $this->rowGroup = $row_group;
        $this->dataProvider = $data_provider;
	}
	private function getCellTag($row, $col) {
    	$is_th = $this->isTh;
	    return $is_th($row, $col) ? "th" : "td";		
	}
	private function getCellHtml($row, $col) {
    	$tag = $this->getCellTag($row, $col);
    	$data = $this->getData($row, $col);
    	return "<$tag>$data</$tag>";  		
	}
	private function getData($row, $col) {
		$data_provider = $this->dataProvider;
		return $data_provider($row, $col);
	}
	private function getRowGroup($row) {
    	$row_group = $this->rowGroup;
        return $row_group($row);
	}
    public function __toString()
    {
    	$group = "";
    	$groups = array();
        for ($row = 0; $row < $this->row; $row++) {
        	$row_html = "";
			$cells_html = "";
            for ($col = 0; $col < $this->col; $col++) {
            	$cells_html .= $this->getCellHtml($row, $col);
            }
       		$row_html .= "<tr>$cells_html</tr>";
        	$group = $this->getRowGroup($row);
            if (!isset($groups[$group])) {
            	$groups[$group] = "";
            }
            $groups[$group] .= $row_html;
        }

    	$groups_html = "";
        foreach ($groups as $group => $rows_html) {
        	$tag = self::toRowGroupTag($group);
        	$groups_html .= "<$tag>$rows_html</$tag>";
        }

    	$html = "<table>$groups_html</table>";
        return $html;
    }
} 