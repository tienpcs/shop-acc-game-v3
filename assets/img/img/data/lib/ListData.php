<?php
/**
 * 
 * This software is distributed under the GNU GPL v3.0 license.
 * @author Gemorroj
 * @copyright 2008-2012 http://wapinet.ru
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @link http://wapinet.ru/gmanager/
 * @version 0.8
 * 
 * PHP version >= 5.2.1
 * 
 */
require_once('data/inc/info.php');

//TODO: create method getHeader (creahe header for ListData)
class ListData
{
    /**
     * @var int $getListCountPages
     * @access public
     */
    public static $getListCountPages = 0;


    /**
     * getListArray
     * 
     * @param string $current
     * @param string $itype
     * @param string $down
     * @param string $addArchive
     * @return array
     */
    private static function _getListArray ($current = '', $itype = '', $down = '', $addArchive = '')
    {
        $type   = $isize = $uid = $gid = $chmod = $name = $time = '';
        $page   = $page0 = $page1 = $page2 = array();
        $i      = 0;

        $t      = (Config::get('Editor', 'target') ? ' target="_blank"' : '');
        $add    = ($addArchive ? '&go=1&add_archive=' . Helper_View::getRawurl($addArchive) : '');

       if ($itype == 'time') {
            $key = & $time;
        } elseif ($itype == 'type') {
            $key = & $type;
        } elseif ($itype == 'size') {
            $key = & $isize;
        } elseif ($itype == 'chmod') {
            $key = & $chmod;
        } elseif ($itype == 'uid') {
            $key = & $uid;
        } elseif ($itype == 'gid') {
            $key = & $gid;
        } else {
            $key = & $name;
        }


        $obj = Gmanager::getInstance();
        foreach ($obj->iterator($current) as $file) {
            $i++;
            $pname = $pdown = $ptype = $psize = $pchange = $pdel = $pchmod = $pdate = $puid = $uid = $pgid = $gid = $name = $size = $isize = $chmod = '';

            /*
            if (mb_substr($file, -1) == '/') {
                $file = mb_substr($file, 0, mb_strlen($file) - 1);
            }
            */

            if ($current != '.') {
                $file = $current . $file;
            }

            $basename = Helper_System::basename($file);
            $r_file = Helper_View::getRawurl($file);
            $stat = $obj->stat($file);
            $time = $stat['mtime'];
            //$uid  = $stat['owner'];
            //$gid  = $stat['group'];


            if ($obj->is_link($file)) {
                $type = 'LINK';
                $tmp = $obj->readlink($file);
                $r_file = Helper_View::getRawurl($tmp[1]);
                $r_link = Helper_View::getRawurl($file);
                $is_dir = $obj->is_dir($tmp[1]);

                if (Config::get('Display', 'name')) {
                    $name = htmlspecialchars(Helper_View::strLink($tmp[0] . ' (' . $tmp[1] . ($is_dir ? '/' : '') . ')', true), ENT_NOQUOTES);

                    if ($is_dir) {
                        $pname = '<a href="index.php?c=' . $r_file . '/' . $add . '">' . $name . '</a> ';
                    } else {
                        $pname = '<a href="edit.php?' . $r_file . '">' . $name. '</a> ';
					}
                }
                 if (Config::get('Display', 'chmod')) {
                    $chmod = $obj->lookChmod($file);
                    $pchmod = ' [<a href="change.php?go=chmod&c=' . $r_link . '">' . $chmod . '</a>] ';
                }
                $page0[$key . '_' . $i][$i] = '<input name="check[]" type="checkbox" value="' . $r_link . '"/>' . $pname . $pdown . $ptype . $psize . $pchange . $pdel . $pchmod . $pdate. $puid . $pgid;
            } elseif ($obj->is_dir($file)) {
                $type = 'DIR';
                if (Config::get('Display', 'name')) {
                    if (Config::get('Gmanager', 'realName') == Config::REALNAME_FULL) {
                        $realpath = $obj->realpath($file);
                        $name = $realpath ? str_replace('\\', '/', $realpath) : $file;
                    } elseif (Config::get('Gmanager', 'realName') == Config::REALNAME_RELATIVE_HIDE) {
                        $name = $basename;
                    } else {
                        $name = $file;
                    }
                    $name = htmlspecialchars(Helper_View::strLink($name, true), ENT_NOQUOTES);
                    $pname = '<img src="data/vtr/icon/dir.png" alt="Thư mục"/>   <a href="index.php?c=' . $r_file . '/' . $add . '">' . $name . '/</a>';
                }
                
                if (Config::get('Display', 'size')) {
                    if (Config::get('Gmanager', 'dirSize')) {
                        $isize = $obj->size($file, true);
                        $size = Helper_View::formatSize($isize);
                    } else {
                        $isize = $size = Language::get('unknown');
                    }
                        $psize = ' ';
                }
               
                if (Config::get('Display', 'chmod')) {
                    $chmod = $obj->lookChmod($file);
                    $pchmod = '[<a href="change.php?go=chmod&c=' . $r_file . '">' . $chmod . '</a>] ';
                }
				$thumuc = str_replace($name,'',$r_file);
				$tuychon = ' <a href="tuychon.php?f='.$name.'&d='.$thumuc.'">[+]</a>';
               $page1[$key . '_' . $i][$i] = '<input name="check[]" type="checkbox" value="' . $r_file . '"/>' . $pname . $psize . $pchmod.$tuychon;
            } else {
                $type = htmlspecialchars(Helper_System::getType($basename), ENT_NOQUOTES);
                $archive = Helper_Archive::isArchive($type);

                if (Config::get('Display', 'name')) {
                    if (Config::get('Gmanager', 'realName') == Config::REALNAME_FULL) {
                        $realpath = $obj->realpath($file);
                        $name = $realpath ? str_replace('\\', '/', $realpath) : $file;
                    } elseif (Config::get('Gmanager', 'realName') == Config::REALNAME_RELATIVE_HIDE) {
                        $name = $basename;
                    } else {
                        $name = $file;
                    }
                    $name = htmlspecialchars(Helper_View::strLink($name, true), ENT_NOQUOTES);

                    if ($archive) {
                        $pname = '<a href="index.php?' . $r_file . '">' . $name . '</a><br/>
						<a  href="change.php?go=1&c=' . $r_file . '&mega_full_extract=1">[' . Language::get('extract_archive') . ']</a> ';
                    } else {
                        if ($type == 'SQL') {
                            $pname = '<a href="edit.php?' . $r_file . '"' . $t . '>' . $name . '</a><br/>
							<a href="change.php?go=sql_tables&c=' . $r_file . '">' . Language::get('tables') . '</a><br/>
							<a class="submit" href="change.php?go=sql_installer&c=' . $r_file . '">' . Language::get('create_sql_installer') . '
							</a> ';
                        } else {
                     if($_COOKIE['edit'] == 'd'){      
						$pname = '<a href="edit.php?' . $r_file . '"' . $t . '>' . $name . '</a> ';
						}elseif($_COOKIE['edit'] == 's'){
						$thumucx = str_replace($name,'',$r_file);
						$pname = '<a href="tools.php?act=f&f=' . $name . '&ft=edit&d=' . $thumucx . '"' . $t . '>' . $name . '</a> ';						
						}else{
						$pname = '<a href="suavb.php?f=' . $r_file . '"' . $t . '>' . $name . '</a> ';						
						}
                        }
                    }
                }
                
                if (Config::get('Display', 'size')) {
                    $isize = $stat['size'];
                    $size = Helper_View::formatSize($stat['size']);
                    $psize = '(' . $size . ') ';
                }
                if (Config::get('Display', 'chmod')) {
                    $chmod = $obj->lookChmod($file);
			@natcasesort($b);
                    $pchmod = '[<a href="change.php?go=chmod&c=' . $r_file . '">' . $chmod . '</a>] ';
                }
				$thumuc = str_replace($name,'',$r_file);
				$tuychon = ' <a href="tuychon.php?f='.$name.'&d='.$thumuc.'">[+]</a>';
				if(!file_exists('data/vtr/icon/'.$type.'.png')){ $type = 'unkn';}
                $page2[$key . '_' . $i][$i] = '<input name="check[]" type="checkbox" value="' . $r_file . '"/><img src="data/vtr/icon/'.$type.'.png" alt=""/> '. $pname . $psize . $pchmod.$tuychon;
            }
        }


        $p = array_merge($page0, $page1, $page2);

        $a = array_keys($page0);
        $b = array_keys($page1);
        $c = array_keys($page2);
        unset($page0, $page1, $page2);

        natcasesort($a);
        natcasesort($c);
        if ($down) {
            $a = array_reverse($a, false);
            $b = array_reverse($b, false);
            $c = array_reverse($c, false);
        }

        foreach (array_merge($a, $b, $c) as $var) {
            foreach ($p[$var] as $f) {
                $page[] = $f;
            }
        }
        unset($p, $a, $b, $c);

        return $page;
    }


    /**
     * getListSearchArray
     *
     * @param string $where    where
     * @param string $pattern  regexp pattern
     * @param bool   $inText   in text
     * @param int    $limit    max file size
     * @param bool   $archive  in gz archives
     * @param string $t target
     * @return array
     */
    private static function _getListSearchArray ($where = '', $pattern = '', $inText = false, $limit = 8388608, $archive = false, $t = '')
    {
        static $count = 0;
        static $page  = array();

        $where = str_replace('//', '/', $where . '/');

        $obj = Gmanager::getInstance();
        foreach ($obj->iterator($where) as $f) {
            if ($obj->is_dir($where . $f)) {
                self::_getListSearchArray($where . $f . '/', $pattern, $inText, $limit, $archive, $t);
                continue;
            }

            $type = htmlspecialchars(Helper_System::getType(Helper_System::basename($f)), ENT_NOQUOTES);
            $arch = Helper_Archive::isArchive($type);
            $stat = $obj->stat($where . $f);

            $pname = $pdown = $ptype = $psize = $pchange = $pdel = $pchmod = $pdate = $puid = $pgid = $pn = $in = null;

            if ($inText) {
                if ($stat['size'] > $limit || ($arch && !$archive) || ($arch && $archive && $type != Archive::FORMAT_GZ)) {
                    continue;
                }

                $in = preg_match_all($pattern, ($type == Archive::FORMAT_GZ) ? $obj->getGzContent($where . $f) : $obj->file_get_contents($where . $f), $match);
                unset($match);
                if ($in) {
                    $in = ' (' . $in . ')';
                } else {
                    continue;
                }
            } else {
                $in = preg_match_all($pattern, $f, $match);
                unset($match);
                if (!$in) {
                    continue;
                }
            }

            $count++;

            //$h_file = htmlspecialchars($c . $f, ENT_COMPAT);
            $r_file = Helper_View::getRawurl($where . $f);

            if (Config::get('Display', 'name')) {
                $name = htmlspecialchars(Helper_View::strLink($where . $f, true), ENT_NOQUOTES);
                if ($arch) {
                    $pname = '<a href="index.php?' . $r_file . '">' . $name . '</a>' . $in . '';
                } else {
                    $pname = '<a href="edit.php?' . $r_file . '"' . $t . '>' . $name . '</a>' . $in . '';
               }
            }
           if (Config::get('Display', 'size')) {
                $psize = '' . Helper_View::formatSize($stat['size']) . '';
            }
            if (Config::get('Display', 'chmod')) {
                $pchmod = '<a href="change.php?go=chmod&c=' . $r_file . '">' . $obj->lookChmod($where . $f) . '</a>';
            }
            $page[$f] = '<input name="check[]" type="checkbox" value="' . $r_file . '"/>' . $pname . $psize . $pchmod . $pn;
        }
       

        //natcasesort($page);
        return $page;
    }


    /**
     * getListData
     * 
     * @param string $current
     * @param string $itype
     * @param string $down
     * @param int    $pg
     * @param string $addArchive
     * @return string
     */
    public static function getListData($current = '', $itype = '', $down = '', $pg = 1, $addArchive = '')
    {
        $html = '';
        $data = self::_getListArray($current, $itype, $down, $addArchive);

        if ($data) {
            self::$getListCountPages = ceil(sizeof($data) / Registry::get('limit'));
            $pg   = $pg < 1 ? 1 : $pg;
            $data = array_slice($data, ($pg * Registry::get('limit')) - Registry::get('limit'), Registry::get('limit'));

            $i    = 1;
            $line = false;

           if (Config::get('Display', 'n')) {
                foreach ($data as $var) {
                    $line = !$line;
                    if ($line) {
                        $html .= '
						<div class="list1">' . $var . '</div>
						';
                    } else {
                        $html .= '
						<div class="list2">' . $var . '</div>
						';
                    }
                }
            } else {
                foreach ($data as $var) {
                    $line = !$line;
                    if ($line) {
                        $html .= '<div class="list2">' . $var . '</div>';
                    } else {
                        $html .= '<div class="list2">' . $var . '</div>';
                    }
                }
            }
        }

        return $html;
    }

    /**
     * getListSearchData
     *
     * @param string $where    where
     * @param string $search   search string
     * @param bool   $inText   in text
     * @param bool   $caseLess register
     * @param bool   $regexp   regexp
     * @param int    $limit    max file size
     * @param bool   $archive  in gz archives
     * @return string
     */
    public static function getListSearchData($where = '', $search = '', $inText = false, $caseLess = false, $regexp = false, $limit = 8388608, $archive = false)
    {
        $html = '';

        $pattern = '/' . ($regexp ? str_replace('/', '\/', $search) : preg_quote($search, '/')) . '/u'; // always Unicode
        $pattern = $caseLess ? $pattern : $pattern . 'i';

        // testing regexp pattern
        if (preg_match_all($pattern, '', $match) === false) {
            return self::getListIncorrectSearchString();
        }

        $data = self::_getListSearchArray($where, $pattern, $inText, $limit, $archive, (Config::get('Editor', 'target') ? ' target="_blank"' : ''));

        if ($data) {
            $line = false;
            foreach ($data as $var) {
                $line = !$line;
                $html .= $line ? '<tr class="border">' . $var . '</tr>' : '<tr class="border2">' . $var . '</tr>';
            }
        }

        return $html;
    }


    /**
     * getListEmptyData
     * 
     * @return string
     */
    public static function getListEmptyData ()
    {
        return '<tr class="border"><th colspan="' . (array_sum(Config::getSection('Display')) + 1) . '">' . Language::get('dir_empty') . '</th></tr>';
    }


    /**
     * getListEmptySearchData
     * 
     * @return string
     */
    public static function getListEmptySearchData ()
    {
        return '<tr class="border"><th colspan="' . (array_sum(Config::getSection('Display')) + 1) . '">' . Language::get('empty_search') . '</th></tr>';
    }


    /**
     * getListIncorrectSearchString
     *
     * @return string
     */
    public static function getListIncorrectSearchString ()
    {
        return '<tr class="border"><th colspan="' . (array_sum(Config::getSection('Display')) + 1) . '">' . Language::get('regexp_error') . '</th></tr>';
    }


    /**
     * getListDenyData
     * 
     * @return string
     */
    public static function getListDenyData ()
    {
        return '<tr><td class="red" colspan="' . (array_sum(Config::getSection('Display')) + 1) . '">' . Language::get('permission_denided') . '</td></tr>';
    }
}

?>
